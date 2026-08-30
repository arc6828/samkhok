# คู่มือการติดตั้งและ Deploy เว็บไซต์สามโคกบน Ubuntu Server (Nginx + PHP-FPM)

**ระบบ:** สามโคก - แพลตฟอร์มภูมิปัญญาท้องถิ่นริมสองฝั่งเจ้าพระยา  
**ระบบปฏิบัติการที่รองรับ:** Ubuntu 20.04 / 22.04 / 24.04 LTS  
**เว็บเซิร์ฟเวอร์:** Nginx + PHP-FPM (PHP 7.4 / 8.0 / 8.1 / 8.2 / 8.3)  

---

## 📌 1. ข้อกำหนดขั้นต่ำและ Packages ที่ต้องใช้ (Prerequisites)

ระบบต้องการ PHP ร่วมกับ Extension ต่อไปนี้สำหรับการอ่านและแกะ XML/JSON จาก Medium:
* **`php-fpm`** (FastCGI Process Manager สำหรับ Nginx)
* **`php-xml`** (จำเป็นสำหรับ `SimpleXMLElement` สกัด Medium RSS Feed)
* **`php-mbstring`** (จำเป็นสำหรับ `mb_substr` จัดการข้อความภาษาไทย)
* **`php-curl`** (สำหรับการเชื่อมต่อเครือข่าย)
* **`php-json`** (สำหรับการแปลงข้อมูล JSON)

---

## 🛠️ 2. ขั้นตอนการติดตั้งบน Ubuntu Server

### ขั้นตอนที่ 2.1: อัปเดตระบบและติดตั้ง Packages ที่จำเป็น
เปิด Terminal บน Ubuntu Server แล้วรันคำสั่ง:

```bash
sudo apt update && sudo apt upgrade -y
sudo apt install nginx php-fpm php-xml php-mbstring php-curl php-json git unzip -y
```

*(หมายเหตุ: สามารถตรวจสอบเวอร์ชัน PHP-FPM ได้ด้วยคำสั่ง `php -v` หรือ `ls /var/run/php/`)*

---

### ขั้นตอนที่ 2.2: Clone หรืออัปโหลดซอร์สโค้ดไปยังเซิร์ฟเวอร์
สร้างและคัดลอกไฟล์โปรเจกต์ไปยังไดเรกทอรี `/var/www/samkhok`:

```bash
# คัดลอกโปรเจกต์มาไว้ที่ /var/www/samkhok
cd /var/www
sudo git clone https://github.com/arc6828/samkhok.git samkhok

# หรือหากมีไฟล์อยู่อยู่แล้ว ให้ตั้งชื่อไดเรกทอรีว่า /var/www/samkhok
```

---

### ขั้นตอนที่ 2.3: ตั้งค่า Permissions สำหรับดิสก์และ Cache (สำคัญมาก)
ระบบจำเป็นต้องมีสิทธิ์เขียนไฟล์ในโฟลเดอร์ `cache/` เพื่อบันทึกข้อมูล JSON จาก Medium:

```bash
# กำหนดสิทธิ์เจ้าของไฟล์ให้ Nginx User (www-data)
sudo chown -R www-data:www-data /var/www/samkhok
sudo chmod -R 755 /var/www/samkhok

# สร้างและเปิดสิทธิ์เขียนเต็มรูปแบบให้โฟลเดอร์ cache
sudo mkdir -p /var/www/samkhok/cache
sudo chown -R www-data:www-data /var/www/samkhok/cache
sudo chmod -R 775 /var/www/samkhok/cache
```

---

## 🌐 3. การตั้งค่า Nginx Virtual Host

สร้างไฟล์ตั้งค่า Nginx ใหม่ใน `/etc/nginx/sites-available/samkhok`:

```bash
sudo nano /etc/nginx/sites-available/samkhok
```

ใส่ข้อความคอนฟิกต่อไปนี้ลงในไฟล์ (ปรับเปลี่ยน `samkhok.org` เป็นโดเมนหรือ IP ของคุณ):

```nginx
server {
    listen 80;
    server_name samkhok.org www.samkhok.org;
    root /var/www/samkhok;

    index index.php index.html;
    charset utf-8;

    # Security Headers
    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-XSS-Protection "1; mode=block";
    add_header X-Content-Type-Options "nosniff";

    # Handle Pretty URLs / Clean routing
    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    # Block access to hidden files (.git, .env)
    location ~ /\. {
        deny all;
    }

    # PHP-FPM Handler
    location ~ \.php$ {
        include snippets/fastcgi-php.conf;
        
        # ปรับเส้นทาง socket ให้ตรงกับเวอร์ชัน PHP บนเซิร์ฟเวอร์ของคุณ (เช่น php8.1-fpm.sock)
        fastcgi_pass unix:/var/run/php/php-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        include fastcgi_params;
    }

    # Enable browser caching for static assets
    location ~* \.(jpg|jpeg|png|gif|ico|css|js|svg|webp)$ {
        expires 30d;
        add_header Cache-Control "public, no-transform";
    }
}
```

### เปิดใช้งานเว็บไซต์และ Reload Nginx:

```bash
# สร้าง Symlink ไปยัง sites-enabled
sudo ln -s /etc/nginx/sites-available/samkhok /etc/nginx/sites-enabled/

# ลบ default site ของ Nginx (ถ้ามี)
sudo rm -f /etc/nginx/sites-enabled/default

# ตรวจสอบความถูกต้องของ Nginx Config
sudo nginx -t

# หากขึ้น successful ให้รีโหลด Nginx
sudo systemctl reload nginx
```

---

## 🔒 4. การติดตั้ง SSL Certificate ฟรี (HTTPS) ด้วย Let's Encrypt

เพื่อให้เว็บไซต์ปลอดภัยเป็น `https://` ให้รันคำสั่ง Certbot:

```bash
sudo apt install certbot python3-certbot-nginx -y
sudo certbot --nginx -d samkhok.org -d www.samkhok.org
```

ระบบ Certbot จะทำการตั้งค่า SSL ให้กับ Nginx และเปิดการต่ออายุอัตโนมัติ (Auto-renew) ให้อัตโนมัติ

---

## 🧪 5. การตรวจสอบและแก้ไขปัญหาที่อาจพบ (Troubleshooting)

### ❓ 1. บทความหน้าแรกไม่แสดง หรือขึ้นช่องว่าง
* **สาเหตุ:** ขาดการติดตั้ง `php-xml` ทำให้ไม่สามารถอ่าน XML จาก Medium RSS ได้
* **วิธีแก้:**
  ```bash
  sudo apt install php-xml -y
  sudo systemctl restart php-fpm
  ```

### ❓ 2. เกิดข้อผิดพลาด Permission Denied ในโฟลเดอร์ `cache/`
* **สาเหตุ:** `www-data` ไม่มีสิทธิ์เขียนไฟล์ JSON แคช
* **วิธีแก้:**
  ```bash
  sudo chown -R www-data:www-data /var/www/samkhok/cache
  sudo chmod -R 775 /var/www/samkhok/cache
  ```

### ❓ 3. ตรวจสอบ Error Logs ของ Nginx และ PHP
หากมีปัญหาหน้าเว็บสีขาวหรือ 500 Internal Server Error ให้ตรวจสอบ Log ด้วยคำสั่ง:
```bash
# ดู Log ข้อผิดพลาดของ Nginx
sudo tail -f /var/log/nginx/error.log

# ดู Log ข้อผิดพลาดของ PHP-FPM
sudo tail -f /var/log/php*-fpm.log
```

---

*เอกสารฉบับนี้พร้อมใช้งานสำหรับการ Deploy โปรเจกต์สามโคกบน Ubuntu Server ร่วมกับ Nginx + PHP-FPM*

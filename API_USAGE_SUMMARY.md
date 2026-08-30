# สรุปการเรียกใช้งาน API `ckartisan.com/api/medium/feed`

**โครงการ:** เว็บไซต์สามโคก - ภูมิปัญญาท้องถิ่นริมสองฝั่งเจ้าพระยา ([samkhok.org](https://www.samkhok.org))  
**วันที่สรุป:** 31 สิงหาคม 2569  

---

## 📌 ภาพรวม

จากการตรวจสอบซอร์สโค้ดของระบบ พบว่ามีการเรียกใช้งาน API จาก **`https://ckartisan.com/api/medium/feed/...`** รวมทั้งสิ้น **3 ไฟล์** แบ่งเป็นการเรียกฝั่ง **Backend (PHP Server-side)** จำนวน 2 ไฟล์ และฝั่ง **Frontend (Client-side JavaScript)** จำนวน 1 ไฟล์

---

## 📂 รายละเอียดการเรียกใช้งานแยกตามไฟล์

### 1. 📄 [`index.php`](file:///d:/php-vanila/samkhok/index.php#L11-L17) (Backend PHP)
* **รูปแบบการเรียก:** ฝั่ง Server ผ่านคำสั่ง `file_get_contents()` + `json_decode()`
* **ตำแหน่งบรรทัด:** บรรทัดที่ 11 - 17
* **จุดประสงค์:** ดึงข้อมูลบทความในหน้าแรกมาจัดกลุ่มตามหมวดหมู่ต่างๆ แสดงผลแบบ Carousel, Highlight และ List
* **Endpoints ที่เรียกใช้งาน:**
  1. `https://ckartisan.com/api/medium/feed/samkhok` (บทความล่าสุด)
  2. `https://ckartisan.com/api/medium/feed/samkhok/tagged/travel` (หมวดหมู่ท่องเที่ยว)
  3. `https://ckartisan.com/api/medium/feed/samkhok/tagged/culture` (หมวดหมู่วัฒนธรรม)
  4. `https://ckartisan.com/api/medium/feed/samkhok/tagged/thinking` (หมวดหมู่ความเชื่อ/ความคิด)
  5. `https://ckartisan.com/api/medium/feed/samkhok/tagged/samkhok` (บทความพิเศษ)
  6. `https://ckartisan.com/api/medium/feed/samkhok/tagged/vip` (หมวดหมู่บุคคลสำคัญ)
  7. `https://ckartisan.com/api/medium/feed/samkhok/tagged/general` (หมวดหมู่การพัฒนาแพลตฟอร์ม)

---

### 2. 📄 [`category.php`](file:///d:/php-vanila/samkhok/category.php#L20-L40) (Backend PHP)
* **รูปแบบการเรียก:** ฝั่ง Server ผ่านคำสั่ง `file_get_contents()` + `json_decode()`
* **ตำแหน่งบรรทัด:** บรรทัดที่ 20 - 40
* **จุดประสงค์:** ดึงข้อมูลบทความตามหมวดหมู่ที่ผู้ใช้เลือกผ่าน URL Parameter (`category.php?q=...`)
* **Endpoints ที่เรียกใช้งาน (ขึ้นอยู่กับค่า `$_GET['q']`):**
  * `q=ท่องเที่ยว` ➔ `.../feed/samkhok/tagged/travel`
  * `q=วัฒนธรรม` ➔ `.../feed/samkhok/tagged/culture`
  * `q=ความเชื่อ` หรือ `q=ความคิด` ➔ `.../feed/samkhok/tagged/thinking`
  * `q=สามโคก` ➔ `.../feed/samkhok/tagged/samkhok`
  * `q=บุคคลสำคัญ` ➔ `.../feed/samkhok/tagged/vip`
  * `q=การพัฒนาแพลตฟอร์ม` ➔ `.../feed/samkhok/tagged/general`
  * Default (หมวดหมู่อื่นๆ/ทั้งหมด) ➔ `.../feed/samkhok`

---

### 3. 📄 [`theme/footer.php`](file:///d:/php-vanila/samkhok/theme/footer.php#L84) (Frontend JavaScript)
* **รูปแบบการเรียก:** ฝั่ง Browser Client ผ่าน JavaScript `fetch()` API
* **ตำแหน่งบรรทัด:** บรรทัดที่ 84
* **จุดประสงค์:** ดึงข้อมูลบทความล่าสุดบนเบราว์เซอร์ผู้ใช้ นำเอาข้อความ `title` และ `contentEncoded` มาประมวลผลทำระบบค้นหาอัตโนมัติ (Search Autocomplete) ในช่องค้นหาบน Navbar
* **Code Snippet:**
  ```javascript
  fetch("https://ckartisan.com/api/medium/feed/samkhok")
      .then((data) => (data.json()))
      .then((data) => {
          // ประมวลผลบทความและเตรียมข้อมูลสำหรับ Autocomplete Searchbox
      });
  ```

---

## 📊 ตารางสรุปการเรียกใช้ API ทั้งหมด

| ลำดับ | ไฟล์ | ส่วนประมวลผล | วิธีการดึงข้อมูล | Endpoint ที่เรียกใช้งาน | วัตถุประสงค์ |
|---|---|---|---|---|---|
| 1 | [`index.php`](file:///d:/php-vanila/samkhok/index.php#L11-L17) | Backend (PHP) | `file_get_contents()` | 7 Endpoints (แยกตาม Tag) | แสดงบทความในหน้าแรก |
| 2 | [`category.php`](file:///d:/php-vanila/samkhok/category.php#L20-L40) | Backend (PHP) | `file_get_contents()` | Dynamic ตามค่า `$_GET['q']` | แสดงบทความตามหมวดหมู่ |
| 3 | [`theme/footer.php`](file:///d:/php-vanila/samkhok/theme/footer.php#L84) | Frontend (JS) | `fetch()` | `.../feed/samkhok` | ทำระบบ Search Autocomplete |

---

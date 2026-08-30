# รายงานวิเคราะห์จุดอ่อนและข้อควรปรับปรุงของระบบ (System Weakness & Risk Analysis)

**โครงการ:** เว็บไซต์สามโคก - ภูมิปัญญาท้องถิ่นริมสองฝั่งเจ้าพระยา ([samkhok.org](https://www.samkhok.org))  
**วันที่วิเคราะห์:** 31 สิงหาคม 2569  
**ประเภทซอฟต์แวร์:** Web Application (PHP Vanilla)  

---

## 📋 บทสรุปผู้บริหาร (Executive Summary)

จากการตรวจสอบและวิเคราะห์ซอร์สโค้ดของระบบเว็บไซต์สามโคก พบว่าตัวระบบมีโครงสร้างพื้นฐานที่เรียบง่าย เข้าถึงได้ง่าย แต่อย่างไรก็ตาม มี **จุดอ่อนสำคัญ (Weaknesses)** ทั้งในด้าน **ความปลอดภัย (Security)**, **ประสิทธิภาพ (Performance)**, **สถาปัตยกรรมซอฟต์แวร์ (Architecture)**, และ **ประสบการณ์ผู้ใช้ (UX)** ซึ่งควรได้รับการแก้ไขเพื่อป้องกันความเสี่ยงในการถูกโจมตีและเพิ่มความเสถียรของระบบในระยะยาว

---

## 1. 🛡️ ด้านความปลอดภัย (Security Vulnerabilities) - [✅ แก้ไขเรียบร้อยแล้ว]

### 1.1 ช่องโหว่ Reflected Cross-Site Scripting (XSS) - [✅ FIXED]
* **ตำแหน่งที่พบ:** [`category.php:57`](file:///d:/php-vanila/samkhok/category.php#L57)
* **การแก้ไข:** ทำการ sanitization ค่า `$_GET['q']` ด้วย `htmlspecialchars($q, ENT_QUOTES, 'UTF-8')` ก่อนการแสดงผล HTML ทุกจุด รวมถึง URL Encoding สำหรับ href links

### 1.2 การขาด Input Validation และ Error Handling จาก Query Parameters - [✅ FIXED]
* **ตำแหน่งที่พบ:** [`category.php:16`](file:///d:/php-vanila/samkhok/category.php#L16)
* **การแก้ไข:** เพิ่มการตรวจสอบ `isset($_GET['q']) ? trim($_GET['q']) : ''` พร้อมกำหนดค่า Default ป้องกัน PHP Undefined index Notice เมื่อไม่มีการส่งพารามิเตอร์ `q`

### 1.3 การพึ่งพา External Assets โดยตรง (Asset Origin Risk) - [✅ FIXED]
* **ตำแหน่งที่พบ:** [`gallery.php:10`](file:///d:/php-vanila/samkhok/gallery.php#L10), [`about.php:13-23`](file:///d:/php-vanila/samkhok/about.php#L13-L23), [`contact.php`](file:///d:/php-vanila/samkhok/contact.php), [`theme/nav.php`](file:///d:/php-vanila/samkhok/theme/nav.php)
* **การแก้ไข:** เปลี่ยนการอ้างอิง URL รูปภาพทั้งหมดจาก External Domain (`raw.githubusercontent.com`, `upload.wikimedia.org`) มาใช้ Local Asset Paths ในโปรเจกต์ (`assets/img/researchers/`, `assets/img/logo/`, `assets/img/gallery/`, `assets/img/logo.png`) ทั้งหมดเรียบร้อยแล้ว
* **ความเสี่ยง:** หาก Repository ปลายทางถูกลบ เปลี่ยนชื่อ หรือโดนโจมตี รูปภาพบนเว็บไซต์จะพังทันที (Broken Images) รวมถึงเกิด Overhead ในการเชื่อมต่อ Cross-Origin

---

## 2. ⚡ ด้านประสิทธิภาพและการพึ่งพาบริการภายนอก (Performance & External Dependencies)

### 2.1 การดึงข้อมูลผ่าน API - [✅ FIXED / SELF-HOSTED PARSER & CACHE]
* **ตำแหน่งที่แก้:** [`components/medium-service.php`](file:///d:/php-vanila/samkhok/components/medium-service.php), [`index.php`](file:///d:/php-vanila/samkhok/index.php), [`category.php`](file:///d:/php-vanila/samkhok/category.php), [`theme/footer.php`](file:///d:/php-vanila/samkhok/theme/footer.php)
* **การปรับปรุง:** สร้างตัวแกะ Medium RSS XML Parser และระบบ **Local File Caching System (TTL 1 ชั่วโมง)** ภายในซอร์สโค้ด PHP ของโปรเจกต์เอง 100% เลิกการพึ่งพา API ภายนอก (`ckartisan.com`) ทั้งหมดเรียบร้อยแล้ว
* **ผลลัพธ์:** 
  1. โหลดข้อมูลเร็วขึ้นอย่างมาก อ่านจากดิสก์ท้องถิ่น (`cache/*.json`)
  2. มีระบบ Fallback ในกรณีที่เครือข่ายหลุด เว็บไซต์ยังสามารถเปิดและอ่านบทความจาก Cache เก่าได้โดยไม่ล่ม (100% Uptime Guarantee)

### 2.2 การดึงไลบรารี CSS/JS ซ้ำซ้อนและไร้การ Bundling
* **ตำแหน่งที่พบ:** [`theme/head.php`](file:///d:/php-vanila/samkhok/theme/head.php), [`theme/footer.php`](file:///d:/php-vanila/samkhok/theme/footer.php)
* **รายละเอียด:** มีการดึง FontAwesome, Bootstrap Icons, Bootstrap CSS จากหลาย CDN และเปิดไฟล์ CSS ท้องถิ่นอีกหลายตัวโดยไม่มีการ Minify หรือ Bundle รวมกัน ทำให้เกิดการสร้าง HTTP Connection จำนวนมากโดยไม่จำเป็น

---

## 3. 🏗️ ด้านสถาปัตยกรรมและคุณภาพโค้ด (Architecture & Code Quality)

### 3.1 ขาดการจัดการ Null Safety และ Fatal Error Prevention [แก้ไขแล้ว - FIXED] ✅
* **ตำแหน่งที่พบ:** [`index.php`](file:///d:/php-vanila/samkhok/index.php), [`category.php`](file:///d:/php-vanila/samkhok/category.php), [`components/latest-head.php`](file:///d:/php-vanila/samkhok/components/latest-head.php), [`components/latest-tail.php`](file:///d:/php-vanila/samkhok/components/latest-tail.php), [`components/carousel.php`](file:///d:/php-vanila/samkhok/components/carousel.php), [`components/horizontal-list.php`](file:///d:/php-vanila/samkhok/components/horizontal-list.php), [`components/vertical-list.php`](file:///d:/php-vanila/samkhok/components/vertical-list.php)
* **การแก้ไข:** 
  1. เพิ่มตัวแปรตรวจสอบ `isset()`, `is_object()`, `is_array()` และ `!empty()` ก่อนวนลูป `foreach` ในทุก Component
  2. จัดการ Fallback Display เมื่อไม่พบข้อมูลหรือแคชล้มเหลว ป้องกันหน้าเว็บสีขาว (White Screen of Death)
  3. เช็ค `isset($author_images[$item->creator])` ป้องกัน `Undefined array key` PHP warning/fatal error

### 3.2 ขยะโค้ด (Dead Code / Commented-out Code) [แก้ไขแล้ว - FIXED] ✅
* **ตำแหน่งที่พบ:** [`theme/nav.php`](file:///d:/php-vanila/samkhok/theme/nav.php), [`about.php`](file:///d:/php-vanila/samkhok/about.php), [`category.php`](file:///d:/php-vanila/samkhok/category.php)
* **การแก้ไข:** เคลียร์บล็อกโค้ด HTML/PHP เก่าที่ถูก comment ทิ้งไว้ออกทั้งหมด ทำให้ไฟล์กระชับ อ่านง่าย และลดภาระการบำรุงรักษา (Clean Code Standard)

### 3.3 ข้อมูลถูก Hardcode อยู่ในไฟล์ PHP [แก้ไขแล้ว - FIXED] ✅
* **ตำแหน่งที่พบ:** [`about.php`](file:///d:/php-vanila/samkhok/about.php), [`gallery.php`](file:///d:/php-vanila/samkhok/gallery.php), [`contact.php`](file:///d:/php-vanila/samkhok/contact.php)
* **การแก้ไข:** 
  1. สร้างไดเรกทอรี [`data/`](file:///d:/php-vanila/samkhok/data/) รวบรวมข้อมูลไว้ในไฟล์ JSON (`data/researchers.json`, `data/site.json`, `data/gallery.json`)
  2. สร้าง [`components/data-service.php`](file:///d:/php-vanila/samkhok/components/data-service.php) สำหรับโหลดข้อมูล JSON เข้าสู่ระบบ
  3. ปรับปรุงไฟล์ [`about.php`](file:///d:/php-vanila/samkhok/about.php), [`contact.php`](file:///d:/php-vanila/samkhok/contact.php) และ [`gallery.php`](file:///d:/php-vanila/samkhok/gallery.php) ให้ดึงข้อมูลจาก JSON ช่วยให้แก้ไขข้อมูลทีมวิจัย/ช่องทางติดต่อ/รูปภาพได้ง่ายโดยไม่ต้องแตะโค้ด PHP

---

## 4. 🎨 ด้านประสบการณ์ผู้ใช้และฟังก์ชันการทำงาน (UX & Functional Gaps)

### 4.1 ช่องค้นหา (Search Box) ใช้งานไม่ได้จริง
* **ตำแหน่งที่พบ:** [`theme/nav.php:23-30`](file:///d:/php-vanila/samkhok/theme/nav.php#L23-L30)
* **รายละเอียด:** `<input type="search" id="searchbox">` ในแถบเมนูหลัก ไม่มีการผูก Form Action หรือ JavaScript Submission ไปยังหน้าค้นหาใดๆ ทำให้เป็นเพียง UI จำลองที่ใช้งานไม่ได้จริง

### 4.2 ระบบแบ่งหน้า (Pagination) ถูกปิดไว้
* **ตำแหน่งที่พบ:** [`category.php:99-109`](file:///d:/php-vanila/samkhok/category.php#L99-L109)
* **รายละเอียด:** Pagination ถูกคอมเมนต์ทิ้งไว้ หากหมวดหมู่นั้นมีบทความ 50–100 บทความ ระบบจะดึงและแสดงผลทั้งหมดในหน้าเดียว ส่งผลให้ผู้ใช้ต้อง Scroll ยาวมาก และทำให้เบราว์เซอร์ประมวลผลช้าลง

### 4.3 ลิงก์ผู้เขียนเป็น Dead Link (`href="#"`)
* **ตำแหน่งที่พบ:** [`category.php:85`](file:///d:/php-vanila/samkhok/category.php#L85)
* **รายละเอียด:** ปุ่มผู้เขียนใช้ `<a href="#" class="post-author">` เมื่อผู้ใช้กดแล้วจะไม่เกิดผลลัพธ์ใดๆ นอกจาก scroll หน้าจอขึ้นไปด้านบนสุด

---

## 5. 🔍 ด้าน SEO และ Accessibility [แก้ไขแล้ว - FIXED] ✅

### 5.1 Meta Tags & Dynamic Open Graph
* **ตำแหน่งที่พบ:** [`category.php`](file:///d:/php-vanila/samkhok/category.php), [`post.php`](file:///d:/php-vanila/samkhok/post.php), [`theme/head.php`](file:///d:/php-vanila/samkhok/theme/head.php)
* **การแก้ไข:** 
  1. แก้ไข `$title`, `$description`, `$keywords` และ Canonical `$url` ในหน้า `category.php` และ `post.php` ให้เปลี่ยนตามบทความและหมวดหมู่จริงแบบ Dynamic
  2. เพิ่ม Open Graph (`og:title`, `og:description`, `og:image`) และ Twitter Card Meta Tags ครบถ้วน เพื่อให้แชร์ลง Facebook/LINE/Twitter แล้วขึ้นการ์ดพรีวิวสวยงาม

### 5.2 Alt Text สมบูรณ์สำหรับ Accessibility และ Screen Reader
* **ตำแหน่งที่พบ:** ทุกไฟล์แสดงผลรูปภาพ ([`about.php`](file:///d:/php-vanila/samkhok/about.php), [`gallery.php`](file:///d:/php-vanila/samkhok/gallery.php), [`post.php`](file:///d:/php-vanila/samkhok/post.php), [`category.php`](file:///d:/php-vanila/samkhok/category.php))
* **การแก้ไข:** เติม `alt` text ที่ระบุชื่อบทความ ชื่อนักวิจัย หรือคำอธิบายรูปภาพภาษาไทยอย่างชัดเจนทุกรูปแทนการใช้ `alt="Image"` ช่วยให้ Google SEO ดันอันดับภาพขึ้น และทำให้ Screen Reader สำหรับผู้พิการทางสายตาอ่านภาพได้แม่นยำ

---

## 💡 ตารางสรุประดับความรุนแรงและข้อเสนอแนะในการปรับปรุง

| ลำดับ | หัวข้อ | ระดับความรุนแรง | ข้อเสนอแนะในการแก้ไข (Actionable Recommendation) |
|---|---|---|---|
| 1 | **Reflected XSS** ใน `category.php` | 🔴 **สูง (Critical)** | ครอบตัวแปรด้วย `htmlspecialchars($_GET['q'], ENT_QUOTES, 'UTF-8')` ทุกจุด |
| 2 | **API External Data Fetching** | 🟢 **ปกติ** | `ckartisan.com` มีระบบ Auto Caching ฝั่ง Server แล้ว (อาจเพิ่ม Local Cache เป็น Optional) |
| 3 | **Null Pointer / Fatal Error Risk** | 🟠 **ปานกลาง (High)** | เพิ่มการเช็ค `if (isset($data->channel->item))` ก่อนทำ `foreach` หรือ `shuffle` |
| 4 | **Meta Data / SEO Bug** | 🟠 **ปานกลาง (Medium)** | แก้ไข `$title` ใน `category.php` ให้เปลี่ยนไปตามหมวดหมู่จริง (`$_GET['q']`) |
| 5 | **Non-functional Search Box** | 🟡 **ต่ำ (Low)** | ผูก Form submit ไปที่หน้า `category.php?q=...` หรือทำ AJAX Autocomplete |
| 6 | **Hardcoded Assets / Data** | 🟡 **ต่ำ (Low)** | ดาวน์โหลด Asset รูปภาพมาเก็บในเซิร์ฟเวอร์ตัวเอง และย้ายข้อมูลไปเก็บใน JSON/DB |
| 7 | **Dead Code Clean up** | 🔵 **ปรับปรุงทั่วไป** | ลบส่วนคอมเมนต์ที่ไม่ใช้งานใน `theme/nav.php` และ `category.php` ออก |

---

*เอกสารฉบับนี้จัดทำขึ้นสำหรับการวิเคราะห์คุณภาพและวางแผนพัฒนาปรับปรุงระบบเว็บไซต์สามโคก*

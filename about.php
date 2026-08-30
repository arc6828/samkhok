<?php
// META DATA
$title = "สามโคก - เกี่ยวกับโครงการ";
$author = "ทีมวิจัยคณะวิทยาศาสตร์และเทคโนโลยี มหาวิทยาลัยราชภัฏวไลยอลงกรณ์ ในพระบรมราชูปถัมภ์";
$description = "อำเภอสามโคก จังหวัดปทุมธานี เป็นเมื่องที่มีประวัติศาสตร์ยาวนานตั้งแต่สมัยอยุธยาเป็นราชธานี ตั้งอยู่ริมสองฝั่งของแม่น้ำเจ้าพระยา มีภูมิปัญญา วัตนธรรม ประเพณีท้องถิ่นท้องถิ่นที่เป็นเอกลัษณ์ อีกทั้งยังเต็มไปด้วยสถานที่โบราณสถานและสถานที่ท่องเที่ยวต่างๆ สำหรับการพักผ่อนหย่อนใจ";
$keywords = "สามโคก, ปทุมธานี, แม่น้ำเจ้าพระยา, โบราณ, ท่องเที่ยว, ภูมิปัญญา, ประเพณี, วัตนธรรม";
$url = "https://www.samkhok.org/about.php";
$image = "https://miro.medium.com/max/1400/1*v_-qDdjsr35MepgtUPOdvg.webp";
require_once __DIR__ . '/components/data-service.php';
$profiles = get_researchers_data();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("./theme/head.php"); ?>
    <link href="assets/autocomplete/autocomplete.css" rel="stylesheet">
</head>

<body data-aos-easing="slide" data-aos-duration="800" data-aos-delay="0" class="">

    <?php include("./theme/nav.php"); ?>

    <div class="content">
        <!--  trending  -->
        <div class="section pt-5 pb-0">
            <div class="container">
                <div class="row justify-content-center mb-5">
                    <div class="col-lg-7 text-center">
                        <h2 class="heading">เกี่ยวกับโครงการ</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">

                        <div class="text-center">
                            <img class="img-thumbnail" src="https://miro.medium.com/v2/resize:fit:720/format:webp/1*v_-qDdjsr35MepgtUPOdvg.png" alt="โครงการพัฒนาแฟลตฟอร์มการจัดการเรียนรู้สามโคก" />
                        </div>
                        <div class="mt-5" style="font-size: 20px; font-weight: 300;">
                            <p class="">
                                โครงการพัฒนาแฟลตฟอร์มการจัดการเรียนรู้สาหรับสถานศึกษาวิวัฒน์ชุมชนในเขตพื้นที่อำเภอสามโคก จังหวัดปทุมธานี มีแนวคิดจากพระบรมราโชบายด้านการศึกษาของสมเด็จพระเจ้าอยู่หัวรัชกาลที่ 10 ในเรื่องของการศึกษาต้องมุ่งสร้างพื้นฐานให้แก่ผู้เรียน 4 ด้าน ได้แก่ มีทัศนคติที่ถูกต้องต่อบ้านเมือง มีพื้นฐานชีวิตที่มั่นคง มีคุณธรรม มีงานทำมีอาชีพ และเป็นพลเมืองที่ดี โดยในงานวิจัยนี้ได้ศึกษาบริบทและสภาพปัญหาการจัดการเรียนรู้ของกลุ่มโรงเรียนในพื้นที่ โดยพัฒนากลุ่มผู้สอนให้มีทักษะในการประยุกต์ใช้เทคโนโลยีสารสนเทศและการสื่อสารไปพัฒนาชุดสื่อการเรียนรู้และสามารถถ่ายถอดองค์ความรู้ ยกระดับความสามารถของผู้สอนและบุคลากรทางการศึกษา ในการใช้เทคโนโลยีสารสนเทศและการสื่อสารเพื่อการศึกษา พัฒนาผู้สอนและบุคลากรทางการศึกษา ให้มีความรู้ความสามารถในการพัฒนาและประยุกต์ใช้เทคโนโลยีสารสนเทศและการสื่อสาร เพื่อเป็นกำลังสาคัญในการขับเคลื่อนการเรียนการสอนและการเรียนรู้ของผู้เรียน ให้มีความคิดสร้างสรรค์ มีธรรมาภิบาล คุณธรรม จริยธรรม วิจารณญาณ และรู้เท่าทัน เป็นประโยชน์ต่อการยกระดับการพัฒนาคุณภาพการศึกษาของประเทศต่อไป มาใช้ในการเรียนการสอนของนักเรียนให้เหมาะสมกับสภาพ ประยุกต์ใช้เทคโนโลยีสารสนเทศเข้ามาพัฒนาแอพพลิเคชันเพื่อรวบรวม เผยแพร่ และจัดการองค์ความรู้เกี่ยวกับชุมชนสามโคก โดยรวบรวมศาสตร์ชุมชนในด้านต่างๆ และทำการเผยแพร่และแลกเปลี่ยนองค์ความรู้ต่างๆ เพื่อให้เป็นพื้นที่สาหรับการเรียนรู้ตลอดชีวิตภายในชุมชน และสามารถประยุกต์ใช้ความรู้ไปพัฒนาตนเองและส่งเสริมให้เป็นสังคมแห่งการเรียนรู้ตลอดไป
                            </p>
                            <p class="">
                                นอกจากนี้การรวบรวมองค์ความรู้ทั้งศาสตร์ชุมชนดั้งเดิมและผลิตภัณฑ์ต่างๆ ที่ได้จากการรวบรวมในงานวิจัยนี้ได้ถ่ายทอดผ่านการสร้างแหล่งเรียนรู้ในชุมชนที่ยั่งยืนเพื่อให้เกิดการแลกเปลี่ยนองค์ความรู้ในด้านต่างๆ เพื่ออนุรักษ์ส่งเสริมวัฒนธรรมและภูมิปัญญาพื้นบ้านของคนในชุมชน
                            </p>
                            <p class="">
                                โครงการพัฒนาแฟลตฟอร์มการจัดการเรียนรู้สาหรับสถานศึกษาวิวัฒน์ชุมชนในเขตพื้นที่อำเภอสามโคก จังหวัดปทุมธานี เป็นโครงการที่ได้รับทุนสนับสนุนจากกองทุนส่งเสริมวิทยาศาสตร์ วิจัยและนวัตกรรม (กองทุน ววน.) : งบประมาณด้านวิจัยและนวัตกรรม ประเภท Fundamental Fund ประจำปีงบประมาณ 2565
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>        
        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <h2>ทีมวิจัยและพัฒนา</h2>
                    </div>
                </div>
                <div class="row mt-4 gy-4 ">
                    <?php foreach ($profiles as $item) { ?>
                        <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                            <div class="card profile-card shadow-sm border-soft h-100">
                                <img src="<?= $item->image ?>" class="card-img-top" alt="<?= htmlspecialchars($item->name, ENT_QUOTES, 'UTF-8') ?>" style="height: 400px; object-fit:cover;">
                                <div class="card-body">
                                    <h6 class="card-title" style="color:black;"><?= $item->name ?></h6>
                                    <div class="card-subtitle text-gray prompt small mb-2"><?= $item->position ?></div>
                                    <p class="card-text my-2"><?= str_replace(" ","<br/>",$item->organization) ?></p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="container">
                <div class="row justify-content-center mb-4">
                    <div class="col-lg-10 text-center">
                        <span class=" badge badge-secondary badge-pill badge-lg mb-4 ">กิจกรรมของเรา</span>
                        <h2>
                            กิจกรรมของเราที่ทำร่วมกับชาวบ้านในอำเภอสามโคก
                        </h2>
                    </div>
                </div>

                <div class="row">
                    <?php
                    $gallery_path = "assets/img/gallery/";
                    $activity_images = ['9.JPG', 'DSC09022.JPG', 'IMG_20230108_172354.jpg', 'IMG_4096.JPG', 'IMG_4345.jpeg', 'IMG_4948.JPG'];
                    foreach ($activity_images as $img) {
                        $img_url = htmlspecialchars($gallery_path . $img, ENT_QUOTES, 'UTF-8');
                    ?>
                        <div class="col-12 col-md-6 col-lg-4 d-flex mb-4">
                            <!-- Card -->
                            <a class="card rounded bg-image animate-up-3 w-100 shadow-sm" href="<?= $img_url ?>" target="_blank" rel="noopener noreferrer">
                                <!-- Body -->
                                <div class="card-body p-0 z-2 text-white">
                                    <img src="<?= $img_url ?>" class="card-img-top" alt="กิจกรรมของเราในอำเภอสามโคก" style="height: 220px; object-fit: cover;">
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                </div>
                <div class="col text-center mt-lg-6">
                    <a href="gallery.php" class="btn btn-secondary animate-hover">
                        <span class="">
                            ดูกิจกรรมทั้งหมดของเรา
                            <i class=" fas fa-arrow-right animate-right-3 ml-2 "></i>
                        </span>
                    </a>
                </div>
            </div>
        </section>

    </div>

    <?php include("./theme/footer.php"); ?>

</body>

</html>
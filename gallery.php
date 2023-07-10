<?php
// META DATA
$title = "สามโคก - คลังภาพกิจกรรม";
$author = "ทีมวิจัยคณะวิทยาศาสตร์และเทคโนโลยี มหาวิทยาลัยราชภัฏวไลยอลงกรณ์ ในพระบรมราชูปถัมภ์";
$description = "อำเภอสามโคก จังหวัดปทุมธานี เป็นเมื่องที่มีประวัติศาสตร์ยาวนานตั้งแต่สมัยอยุธยาเป็นราชธานี ตั้งอยู่ริมสองฝั่งของแม่น้ำเจ้าพระยา มีภูมิปัญญา วัตนธรรม ประเพณีท้องถิ่นท้องถิ่นที่เป็นเอกลัษณ์ อีกทั้งยังเต็มไปด้วยสถานที่โบราณสถานและสถานที่ท่องเที่ยวต่างๆ สำหรับการพักผ่อนหย่อนใจ";
$keywords = "สามโคก, ปทุมธานี, แม่น้ำเจ้าพระยา, โบราณ, ท่องเที่ยว, ภูมิปัญญา, ประเพณี, วัตนธรรม";
$url = "https://www.samkhok.org/gallery.php";
$image = "https://miro.medium.com/max/1400/1*v_-qDdjsr35MepgtUPOdvg.webp";

$images = ['9.JPG', 'DSC09022.JPG', 'IMG_20230108_172354.jpg', 'IMG_4096.JPG', 'IMG_4345.jpeg', 'IMG_4948.JPG', 'IMG_6400.JPG', 'IMG_6422.JPG', 'IMG_6580.JPG', 'IMG_6743.JPG', 'IMG_6784.JPG', 'IMG_7594.jpeg', 'IMG_7618.jpeg'];

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
                        <h2 class="heading">คลังภาพกิจกรรม</h2>
                    </div>
                </div>
                <div class="row">
                    <?php foreach($images as $item){ ?>
                    <div class="col-12 col-md-6 col-lg-4 d-flex">
                        <!-- Card -->
                        <a class=" p-4 " href="https://thungsongflood.org/img/ground/LINE_ALBUM_Nakhon Sri _day 1_160222_220914_1.jpg" target="_blank">
                            <!-- Body -->
                            <div class="">
                                <img src="https://thungsongflood.org/img/ground/LINE_ALBUM_Nakhon Sri _day 1_160222_220914_1.jpg" class="img-thumbnail" alt="Related news image 1" height="200">
                            </div>
                        </a>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>

    </div>

    <?php include("./theme/footer.php"); ?>

</body>

</html>
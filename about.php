<?php
// META DATA
$title = "สามโคก - เกี่ยวกับโครงการ";
$author = "ทีมวิจัยคณะวิทยาศาสตร์และเทคโนโลยี มหาวิทยาลัยราชภัฏวไลยอลงกรณ์ ในพระบรมราชูปถัมภ์";
$description = "อำเภอสามโคก จังหวัดปทุมธานี เป็นเมื่องที่มีประวัติศาสตร์ยาวนานตั้งแต่สมัยอยุธยาเป็นราชธานี ตั้งอยู่ริมสองฝั่งของแม่น้ำเจ้าพระยา มีภูมิปัญญา วัตนธรรม ประเพณีท้องถิ่นท้องถิ่นที่เป็นเอกลัษณ์ อีกทั้งยังเต็มไปด้วยสถานที่โบราณสถานและสถานที่ท่องเที่ยวต่างๆ สำหรับการพักผ่อนหย่อนใจ";
$keywords = "สามโคก, ปทุมธานี, แม่น้ำเจ้าพระยา, โบราณ, ท่องเที่ยว, ภูมิปัญญา, ประเพณี, วัตนธรรม";
$url = "https://www.samkhok.org/about.php";
$image = "https://miro.medium.com/max/1400/1*v_-qDdjsr35MepgtUPOdvg.webp";

?>

<?php 
$profiles = [
    (object)[ "image" => "https://raw.githubusercontent.com/arc6828/samkhok/main/assets/img/researchers/wisrut.jpg" , "name" => "อาจารย์วิศรุต ขวัญคุ้ม" , "position" => "หัวหน้าโครงการวิจัย" , "organization" => "หลักสูตรวิทยาการคอมพิวเตอร์ คณะวิทยาศาสตร์และเทคโนโลยี มหาวิทยาลัยราชภัฏวไลยอลงกรณ์ ในพระบรมราชูปถัมภ์"  ],
    (object)[ "image" => "https://raw.githubusercontent.com/arc6828/samkhok/main/assets/img/researchers/ing_orn.jpg" , "name" => "ผู้ช่วยศาสตราจารย์อิงอร วงษ์ศรีรักษา" , "position" => "ผู้ช่วยโครงการวิจัย" , "organization" => "หลักสูตรเทคโนโลยีสารสนเทศ คณะวิทยาศาสตร์และเทคโนโลยี มหาวิทยาลัยราชภัฏวไลยอลงกรณ์ ในพระบรมราชูปถัมภ์"  ],
    (object)[ "image" => "https://raw.githubusercontent.com/arc6828/samkhok/main/assets/img/researchers/phairin.jpg" , "name" => "ผู้ช่วยศาสตราจารย์ไพรินทร์ มีศรี" , "position" => "ผู้ช่วยโครงการวิจัย" , "organization" => "หลักสูตรเทคโนโลยีสารสนเทศ คณะวิทยาศาสตร์และเทคโนโลยี มหาวิทยาลัยราชภัฏวไลยอลงกรณ์ ในพระบรมราชูปถัมภ์"  ],
    (object)[ "image" => "https://raw.githubusercontent.com/arc6828/samkhok/main/assets/img/researchers/kamolmas.jpg" , "name" => "ผู้ช่วยศาสตราจารย์กมลมาศ วงษ์ใหญ่" , "position" => "ผู้ช่วยโครงการวิจัย" , "organization" => "หลักสูตรเทคโนโลยีสารสนเทศ คณะวิทยาศาสตร์และเทคโนโลยี มหาวิทยาลัยราชภัฏวไลยอลงกรณ์ ในพระบรมราชูปถัมภ์"  ],
    (object)[ "image" => "https://raw.githubusercontent.com/arc6828/samkhok/main/assets/img/researchers/daorathar.jpg" , "name" => "ดร.ดาวรถา วีระพันธ์" , "position" => "ผู้ช่วยโครงการวิจัย" , "organization" => "หลักสูตรวิทยาการคอมพิวเตอร์ คณะวิทยาศาสตร์และเทคโนโลยี มหาวิทยาลัยราชภัฏวไลยอลงกรณ์ ในพระบรมราชูปถัมภ์"  ],
    (object)[ "image" => "https://raw.githubusercontent.com/arc6828/samkhok/main/assets/img/researchers/natradee.jpg" , "name" => "อาจารย์ณัฐรดี อนุพงค์" , "position" => "ผู้ช่วยโครงการวิจัย" , "organization" => "หลักสูตรวิทยาการคอมพิวเตอร์ คณะวิทยาศาสตร์และเทคโนโลยี มหาวิทยาลัยราชภัฏวไลยอลงกรณ์ ในพระบรมราชูปถัมภ์"  ],
    (object)[ "image" => "https://raw.githubusercontent.com/arc6828/samkhok/main/assets/img/researchers/chavalit.jpg" , "name" => "อาจารย์ชวลิต โควีระวงศ์" , "position" => "ผู้ช่วยโครงการวิจัย" , "organization" => "หลักสูตรวิทยาการคอมพิวเตอร์ คณะวิทยาศาสตร์และเทคโนโลยี มหาวิทยาลัยราชภัฏวไลยอลงกรณ์ ในพระบรมราชูปถัมภ์"  ],
    (object)[ "image" => "https://raw.githubusercontent.com/arc6828/samkhok/main/assets/img/researchers/pannarat.jpg" , "name" => "อาจารย์ปัณณรัตน์ วงศ์พัฒนานิภาส" , "position" => "ผู้ช่วยโครงการวิจัย" , "organization" => "หลักสูตรนวัตกรรมดิจิทัลและวิศวกรรมซอฟต์แวร์ คณะวิทยาศาสตร์และเทคโนโลยี มหาวิทยาลัยราชภัฏวไลยอลงกรณ์ ในพระบรมราชูปถัมภ์"  ],
];
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
                            <img class="img-thumbnail" src="https://miro.medium.com/v2/resize:fit:720/format:webp/1*v_-qDdjsr35MepgtUPOdvg.png" />
                        </div>
                        <div class="mt-5" style="font-size: 20px; font-weight: 300;">
                            <p class="">
                                โครงการพัฒนาแฟลตฟอร์มการจัดการเรียนรู้สาหรับสถานศึกษาวิวัฒน์ชุมชนในเขตพื้นที่อาเภอสามโคก จังหวัดปทุมธานี มีแนวคิดจากพระบรมราโชบายด้านการศึกษาของสมเด็จพระเจ้าอยู่หัวรัชกาลที่ 10 ในเรื่องของการศึกษาต้องมุ่งสร้างพื้นฐานให้แก่ผู้เรียน 4 ด้าน ได้แก่ มีทัศนคติที่ถูกต้องต่อบ้านเมือง มีพื้นฐานชีวิตที่มั่นคง มีคุณธรรม มีงานทามีอาชีพ และเป็นพลเมืองที่ดี โดยในงานวิจัยนี้ได้ศึกษาบริบทและสภาพปัญหาการจัดการเรียนรู้ของกลุ่มโรงเรียนในพื้นที่ โดยพัฒนากลุ่มผู้สอนให้มีทักษะในการประยุกต์ใช้เทคโนโลยีสารสนเทศและการสื่อสารไปพัฒนาชุดสื่อการเรียนรู้และสามารถถ่ายถอดองค์ความรู้ ยกระดับความสามารถของผู้สอนและบุคลากรทางการศึกษา ในการใช้เทคโนโลยีสารสนเทศและการสื่อสารเพื่อการศึกษา พัฒนาผู้สอนและบุคลากรทางการศึกษา ให้มีความรู้ความสามารถในการพัฒนาและประยุกต์ใช้เทคโนโลยีสารสนเทศและการสื่อสาร เพื่อเป็นกาลังสาคัญในการขับเคลื่อนการเรียนการสอนและการเรียนรู้ของผู้เรียน ให้มีความคิดสร้างสรรค์ มีธรรมาภิบาล คุณธรรม จริยธรรม วิจารณญาณ และรู้เท่าทัน เป็นประโยชน์ต่อการยกระดับการพัฒนาคุณภาพการศึกษาของประเทศต่อไป มาใช้ในการเรียนการสอนของนักเรียนให้เหมาะสมกับสภาพ ประยุกต์ใช้เทคโนโลยีสารสนเทศเข้ามาพัฒนาแอพพลิเคชันเพื่อรวบรวม เผยแพร่ และจัดการองค์ความรู้เกี่ยวกับชุมชนสามโคก โดยรวบรวมศาสตร์ชุมชนในด้านต่าง ๆ และทาการเผยแพร่และแลกเปลี่ยนองค์ความรู้ต่าง ๆ เพื่อให้เป็นพื้นที่สาหรับการเรียนรู้ตลอดชีวิตภายในชุมชน และสามารถประยุกต์ใช้ความรู้ไปพัฒนาตนเองและส่งเสริมให้เป็นสังคมแห่งการเรียนรู้ตลอดไป
                            </p>
                            <p class="">
                                นอกจากนี้การรวบรวมองค์ความรู้ทั้งศาสตร์ชุมชนดั้งเดิมและผลิตภัณฑ์ต่าง ๆ ที่ได้จากการรวบรวมในงานวิจัยนี้ได้ถ่ายทอดผ่านการสร้างแหล่งเรียนรู้ในชุมชนที่ยั่งยืนเพื่อให้เกิดการแลกเปลี่ยนองค์ความรู้ในด้านต่าง ๆ เพื่ออนุรักษ์ส่งเสริมวัฒนธรรมและภูมิปัญญาพื้นบ้านของคนในชุมชน
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
                <div class="row">
                    <?php foreach($profiles as $item){ ?>
                    <div class="col-md-6 col-lg-4">
                        <!-- Profile Card -->
                        <div class="profile-card ">
                            <div class="card shadow-sm border-soft">
                                <img src="<?=$item->image?>" class="card-img-top" alt="..." style="height : 600px; object-fit:cover;">

                                <div class="card-body">
                                    <h5 class="card-title"><?=$item->name?></h5>
                                    <h6 class="card-subtitle text-gray"><?=$item->position?></h6>
                                    <p class="card-text my-2"><?=$item->organization?></p>
                                    
                                </div>
                            </div>
                        </div>
                        <!-- End of Profile Card -->
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
                    <div class="col-12 col-md-6 col-lg-4 d-flex">
                        <!-- Card -->
                        <a class=" card mb-4 rounded bg-image animate-up-3 " href="https://thungsongflood.org/img/ground/LINE_ALBUM_Nakhon Sri _day 1_160222_220914_1.jpg" target="_blank">
                            <!-- Body -->
                            <div class="card-body z-2 my-auto text-white">
                                <img src="https://thungsongflood.org/img/ground/LINE_ALBUM_Nakhon Sri _day 1_160222_220914_1.jpg" class="card-img-top" alt="Related news image 1" height="200">
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 d-flex">
                        <!-- Card -->
                        <a class=" card mb-4 rounded bg-image animate-up-3 " href="https://thungsongflood.org/img/ground/LINE_ALBUM_Nakhon Sri _day 1_160222_220914_38.jpg" target="_blank">
                            <!-- Body -->
                            <div class="card-body z-2 my-auto text-white">
                                <img src="https://thungsongflood.org/img/ground/LINE_ALBUM_Nakhon Sri _day 1_160222_220914_38.jpg" class="card-img-top" alt="Related news image 1" height="200">
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 d-flex">
                        <!-- Card -->
                        <a class=" card mb-4 rounded bg-image animate-up-3 " href="https://thungsongflood.org/img/ground/LINE_ALBUM_Nakhon Sri _day 1_160222_220914_65.jpg" target="_blank">
                            <!-- Body -->
                            <div class="card-body z-2 my-auto text-white">
                                <img src="https://thungsongflood.org/img/ground/LINE_ALBUM_Nakhon Sri _day 1_160222_220914_65.jpg" class="card-img-top" alt="Related news image 1" height="200">
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 d-flex">
                        <!-- Card -->
                        <a class=" card mb-4 rounded bg-image animate-up-3 " href="https://thungsongflood.org/img/ground/LINE_ALBUM_Nakhon Sri _day 1_160222_220914_78.jpg" target="_blank">
                            <!-- Body -->
                            <div class="card-body z-2 my-auto text-white">
                                <img src="https://thungsongflood.org/img/ground/LINE_ALBUM_Nakhon Sri _day 1_160222_220914_78.jpg" class="card-img-top" alt="Related news image 1" height="200">
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 d-flex">
                        <!-- Card -->
                        <a class=" card mb-4 rounded bg-image animate-up-3 " href="https://thungsongflood.org/img/ground/LINE_ALBUM_Nakhon Sri _day 1_160222_220914_147.jpg" target="_blank">
                            <!-- Body -->
                            <div class="card-body z-2 my-auto text-white">
                                <img src="https://thungsongflood.org/img/ground/LINE_ALBUM_Nakhon Sri _day 1_160222_220914_147.jpg" class="card-img-top" alt="Related news image 1" height="200">
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 d-flex">
                        <!-- Card -->
                        <a class=" card mb-4 rounded bg-image animate-up-3 " href="https://thungsongflood.org/img/ground/LINE_ALBUM_Nakhon Sri _day 1_160222_220914_137.jpg" target="_blank">
                            <!-- Body -->
                            <div class="card-body z-2 my-auto text-white">
                                <img src="https://thungsongflood.org/img/ground/LINE_ALBUM_Nakhon Sri _day 1_160222_220914_137.jpg" class="card-img-top" alt="Related news image 1" height="200">
                            </div>
                        </a>
                    </div>

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
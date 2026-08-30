<?php
// META DATA
$title = "สามโคก - ดินแดนแห่งภูมิปัญญาท้องถิ่นริมสองฝั่งเจ้าพระยา";
$author = "ทีมวิจัยคณะวิทยาศาสตร์และเทคโนโลยี มหาวิทยาลัยราชภัฏวไลยอลงกรณ์ ในพระบรมราชูปถัมภ์";
$description = "อำเภอสามโคก จังหวัดปทุมธานี เป็นเมื่องที่มีประวัติศาสตร์ยาวนานตั้งแต่สมัยอยุธยาเป็นราชธานี ตั้งอยู่ริมสองฝั่งของแม่น้ำเจ้าพระยา มีภูมิปัญญา วัตนธรรม ประเพณีท้องถิ่นท้องถิ่นที่เป็นเอกลัษณ์ อีกทั้งยังเต็มไปด้วยสถานที่โบราณสถานและสถานที่ท่องเที่ยวต่างๆ สำหรับการพักผ่อนหย่อนใจ";
$keywords = "สามโคก, ปทุมธานี, แม่น้ำเจ้าพระยา, โบราณ, ท่องเที่ยว, ภูมิปัญญา, ประเพณี, วัตนธรรม";
$url = "https://www.samkhok.org";
$image = "https://miro.medium.com/max/1400/1*v_-qDdjsr35MepgtUPOdvg.webp";

require_once __DIR__ . '/components/medium-service.php';

// DATA
$latest = get_samkhok_medium_feed();
$travel = get_samkhok_medium_feed("travel");
$culture = get_samkhok_medium_feed("culture");
$thinking = get_samkhok_medium_feed("thinking");
$samkhok = get_samkhok_medium_feed("samkhok");
$vip = get_samkhok_medium_feed("vip");
$general = get_samkhok_medium_feed("general");



function pick_to_front($collection)
{
    usort($collection, function ($a, $b) {
        if (str_contains($a->title, 'ภูมิปัญญาท้องถิ่นที่น่าสนใจของ')) {
            return -1;
        } else {
            return 1;
        }
        // return ($a < $b) ? -1 : 1;
    });
    return $collection;
}
?>

<?php include("./components/author-images.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("./theme/head.php"); ?>
    <link href="assets/autocomplete/autocomplete.css" rel="stylesheet">
</head>

<body data-aos-easing="slide" data-aos-duration="800" data-aos-delay="0" class="">

    <?php include("./theme/nav.php"); ?>

    <div class="">
        <?php
        // $list_title = "บทความพิเศษ";
        $data = $samkhok;
        shuffle($data->channel->item);
        ?>
        <?php include("./components/carousel.php"); ?>
    </div>
    <div class="content">
        <?php
        // $list_title = "บทความพิเศษ";
        $data = $latest;
        ?>
        <?php include("./components/latest-head.php"); ?>
        <?php include("./components/latest-tail.php"); ?>

        <!--  Executive articles  -->
        <div class="section">
            <?php
            $list_title = "บทความพิเศษ";
            $data = $samkhok;
            ?>
            <?php include("./components/horizontal-list.php"); ?>
        </div>
        <!--  sport  -->
        <div class="section">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-2 g-5">

                    <div class="col">
                        <?php
                        $list_title = "ท่องเที่ยว";
                        $data = $travel;
                        ?>
                        <?php include("./components/vertical-list.php"); ?>
                    </div>
                    <div class="col">
                        <?php
                        $list_title = "วัฒนธรรม";
                        $data = $culture;
                        ?>
                        <?php include("./components/vertical-list.php"); ?>

                    </div>
                    <div class="col">
                        <?php
                        $list_title = "ความเชื่อ";
                        $data = $thinking;
                        ?>
                        <?php include("./components/vertical-list.php"); ?>
                    </div>
                    <div class="col">
                        <?php
                        $list_title = "บุคคลสำคัญ";
                        $data = $vip;
                        ?>
                        <?php include("./components/vertical-list.php"); ?>
                    </div>
                    <div class="col">
                        <?php
                        $list_title = "การพัฒนาแพลตฟอร์ม";
                        $data = $general;
                        ?>
                        <?php include("./components/vertical-list.php"); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include("./theme/footer.php"); ?>

</body>

</html>
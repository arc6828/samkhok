<?php
// META DATA
$title = "สามโคก - ติดต่อเรา";
$author = "ทีมวิจัยคณะวิทยาศาสตร์และเทคโนโลยี มหาวิทยาลัยราชภัฏวไลยอลงกรณ์ ในพระบรมราชูปถัมภ์";
$description = "อำเภอสามโคก จังหวัดปทุมธานี เป็นเมื่องที่มีประวัติศาสตร์ยาวนานตั้งแต่สมัยอยุธยาเป็นราชธานี ตั้งอยู่ริมสองฝั่งของแม่น้ำเจ้าพระยา มีภูมิปัญญา วัตนธรรม ประเพณีท้องถิ่นท้องถิ่นที่เป็นเอกลัษณ์ อีกทั้งยังเต็มไปด้วยสถานที่โบราณสถานและสถานที่ท่องเที่ยวต่างๆ สำหรับการพักผ่อนหย่อนใจ";
$keywords = "สามโคก, ปทุมธานี, แม่น้ำเจ้าพระยา, โบราณ, ท่องเที่ยว, ภูมิปัญญา, ประเพณี, วัตนธรรม";
$url = "https://www.samkhok.org/contact.php";
$image = "https://miro.medium.com/max/1400/1*v_-qDdjsr35MepgtUPOdvg.webp";

?>

<?php include("./components/author-images.php"); ?>

<?php
$data = [];
switch ($_GET['q']) {
    case "ท่องเที่ยว":
        $data = json_decode(file_get_contents("https://ckartisan.com/api/medium/feed/samkhok/tagged/travel"));
        break;
    case "วัฒนธรรม":
        $data = json_decode(file_get_contents("https://ckartisan.com/api/medium/feed/samkhok/tagged/culture"));
        break;
    case "ความเชื่อ":
    case "ความคิด":
        $data = json_decode(file_get_contents("https://ckartisan.com/api/medium/feed/samkhok/tagged/thinking"));
        break;
    case "สามโคก":
        $data = json_decode(file_get_contents("https://ckartisan.com/api/medium/feed/samkhok/tagged/samkhok"));
        break;
    case "บุคคลสำคัญ":
        $data = json_decode(file_get_contents("https://ckartisan.com/api/medium/feed/samkhok/tagged/vip"));
        break;
    case "การพัฒนาแพลตฟอร์ม":
        $data = json_decode(file_get_contents("https://ckartisan.com/api/medium/feed/samkhok/tagged/general"));
        break;
    default:
        $data = json_decode(file_get_contents("https://ckartisan.com/api/medium/feed/samkhok"));
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("./theme/head.php"); ?>
    <link href="assets/autocomplete/autocomplete.css" rel="stylesheet">
</head>

<body data-aos-easing="slide" data-aos-duration="800" data-aos-delay="0" class="">

    <?php include("./theme/nav.php"); ?>

    <div class="section pt-5 pb-0">
        <div class="container">
            <div class="row mb-5 justify-content-center">
                <div class="col-lg-9">
                    <span class="fw-normal text-uppercase d-block mb-1">หมวดหมู่บทความ</span>
                    <h2 class="heading">'<?= $_GET['q'] ?>'</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <?php foreach ($data->channel->item as $index => $item) { ?>
                    <div class="col-lg-9">
                        <div class="post-entry d-md-flex small-horizontal mb-5">
                            <div class="me-md-5 thumbnail mb-3 mb-md-0">
                                <img src="<?= $item->image_url ?>" alt="Image" class="img-fluid">
                            </div>
                            <div class="content">
                                <div class="post-meta mb-3">
                                    <?php if (isset($item->category)) { ?>
                                        <?php if (is_array($item->category)) { ?>
                                            <?php foreach (preg_grep("/[^A-z]+/", $item->category) as $i => $c) { ?>
                                                <a href="category.php?q=<?= $c ?>" class="category"><?= $c ?></a> |
                                            <?php } ?>
                                        <?php } else { ?>
                                            <a href="category.php?q=<?= $item->category ?>" class="category"><?= $item->category ?></a>
                                        <?php } ?>
                                    <?php } ?>
                                    —
                                    <span class="date"><?= $item->pubDate ?></span>
                                </div>
                                <h2 class="heading">
                                    <a href="<?= $item->link ?>" target="_blank"><?= $item->title ?></a>
                                </h2>
                                <p><?= mb_substr($item->first_paragraph, 0, 140) ?> ...</p>
                                <a href="#" class="post-author d-flex align-items-center">
                                    <div class="author-pic">
                                        <img src="<?= $author_images[$item->creator] ?>" alt="<?= $item->creator ?>" data-pagespeed-url-hash="1813383360" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                    </div>
                                    <div class="text">
                                        <strong><?= $item->creator ?></strong>
                                        <span>Writer</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <!-- <div class="row align-items-center justify-content-center py-5">
                <div class="col-lg-6 text-center">
                    <div class="custom-pagination">
                        <a href="#">1</a>
                        <a href="#" class="active">2</a>
                        <a href="#">3</a>
                        <a href="#">4</a>
                        <a href="#">5</a>
                    </div>
                </div>
            </div> -->
        </div>
    </div>

    <?php include("./theme/footer.php"); ?>    

</body>

</html>
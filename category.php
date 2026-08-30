<?php
// INPUT SANITIZATION & VALIDATION
$q = isset($_GET['q']) ? trim($_GET['q']) : '';
$safe_q = htmlspecialchars($q, ENT_QUOTES, 'UTF-8');

// META DATA
$title = $q !== '' ? "สามโคก - หมวดหมู่: " . $safe_q : "สามโคก - หมวดหมู่บทความทั้งหมด";
$author = "ทีมวิจัยคณะวิทยาศาสตร์และเทคโนโลยี มหาวิทยาลัยราชภัฏวไลยอลงกรณ์ ในพระบรมราชูปถัมภ์";
$description = "อำเภอสามโคก จังหวัดปทุมธานี เป็นเมืองที่มีประวัติศาสตร์ยาวนานตั้งแต่สมัยอยุธยาเป็นราชธานี ตั้งอยู่ริมสองฝั่งของแม่น้ำเจ้าพระยา มีภูมิปัญญา วัฒนธรรม ประเพณีท้องถิ่นที่เป็นเอกลักษณ์";
$keywords = "สามโคก, ปทุมธานี, แม่น้ำเจ้าพระยา, โบราณ, ท่องเที่ยว, ภูมิปัญญา, ประเพณี, วัฒนธรรม";
$url = "https://www.samkhok.org/category.php" . ($q !== '' ? "?q=" . urlencode($q) : "");
$image = "https://miro.medium.com/max/1400/1*v_-qDdjsr35MepgtUPOdvg.webp";

require_once __DIR__ . '/components/author-images.php';
require_once __DIR__ . '/components/medium-service.php';

$category_keywords = [];
switch ($q) {
    case "ท่องเที่ยว":
        $category_keywords = ["ท่องเที่ยว", "travel", "วัด", "ตลาด", "เที่ยว"];
        break;
    case "วัฒนธรรม":
        $category_keywords = ["วัฒนธรรม", "culture", "ประเพณี", "รำพา", "หางหงส์", "ข้าวแช่", "วิถีชีวิต"];
        break;
    case "ความเชื่อ":
    case "ความคิด":
        $category_keywords = ["ความเชื่อ", "ความคิด", "thinking", "จุดลูกหนู", "ศรัทธา", "พิธี"];
        break;
    case "สามโคก":
    case "บทความพิเศษ":
        $category_keywords = ["สามโคก", "samkhok", "บทความพิเศษ"];
        break;
    case "บุคคลสำคัญ":
        $category_keywords = ["บุคคลสำคัญ", "vip", "ผู้ใหญ่", "นายเดชา", "วิสาหกิจ"];
        break;
    case "การพัฒนาแพลตฟอร์ม":
        $category_keywords = ["การพัฒนาแพลตฟอร์ม", "general", "แพลตฟอร์ม"];
        break;
    default:
        $category_keywords = !empty($q) ? [$q] : [];
        break;
}

$all_feed = get_samkhok_medium_feed();
$raw_items = (isset($all_feed->channel->item) && is_array($all_feed->channel->item)) ? $all_feed->channel->item : [];

$items = [];
if (!empty($q)) {
    foreach ($raw_items as $item) {
        $matched = false;
        
        // 1. Match category tags
        if (isset($item->category)) {
            $item_cats = is_array($item->category) ? $item->category : [$item->category];
            foreach ($item_cats as $cat) {
                $clean_cat = mb_strtolower(trim((string)$cat));
                foreach ($category_keywords as $kw) {
                    $clean_kw = mb_strtolower(trim($kw));
                    if ($clean_cat === $clean_kw || str_contains($clean_cat, $clean_kw)) {
                        $matched = true;
                        break 2;
                    }
                }
            }
        }
        
        // 2. Match title or content summary
        if (!$matched) {
            $title = mb_strtolower($item->title ?? '');
            $paragraph = mb_strtolower($item->first_paragraph ?? '');
            foreach ($category_keywords as $kw) {
                $clean_kw = mb_strtolower(trim($kw));
                if ($clean_kw !== '' && (str_contains($title, $clean_kw) || str_contains($paragraph, $clean_kw))) {
                    $matched = true;
                    break;
                }
            }
        }

        if ($matched) {
            $items[] = $item;
        }
    }
} else {
    $items = $raw_items;
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
                    <h2 class="heading"><?= $q !== '' ? "'" . $safe_q . "'" : "ทั้งหมด" ?></h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <?php if (!empty($items)) { ?>
                    <?php foreach ($items as $index => $item) { 
                        $item_title = htmlspecialchars($item->title ?? '', ENT_QUOTES, 'UTF-8');
                        $item_link = get_post_url($item);
                        $item_image = htmlspecialchars($item->image_url ?? '', ENT_QUOTES, 'UTF-8');
                        $item_creator = htmlspecialchars($item->creator ?? '', ENT_QUOTES, 'UTF-8');
                        $item_pubDate = htmlspecialchars($item->pubDate ?? '', ENT_QUOTES, 'UTF-8');
                        $item_desc = htmlspecialchars(mb_substr($item->first_paragraph ?? '', 0, 140), ENT_QUOTES, 'UTF-8');
                        $author_img = isset($author_images[$item->creator]) ? htmlspecialchars($author_images[$item->creator], ENT_QUOTES, 'UTF-8') : 'assets/img/logo.png';
                    ?>
                        <div class="col-lg-9">
                            <div class="post-entry d-md-flex small-horizontal mb-5">
                                <div class="me-md-5 thumbnail mb-3 mb-md-0">
                                    <a href="<?= $item_link ?>">
                                        <img src="<?= $item_image ?>" alt="<?= $item_title ?>" class="img-fluid">
                                    </a>
                                </div>
                                <div class="content">
                                    <div class="post-meta mb-3">
                                        <?php if (isset($item->category)) { ?>
                                            <?php if (is_array($item->category)) { ?>
                                                <?php foreach (preg_grep("/[^A-z]+/", $item->category) as $i => $c) { 
                                                    $safe_c = htmlspecialchars($c, ENT_QUOTES, 'UTF-8');
                                                ?>
                                                    <a href="category.php?q=<?= urlencode($c) ?>" class="category"><?= $safe_c ?></a> |
                                                <?php } ?>
                                            <?php } else { 
                                                $safe_c = htmlspecialchars($item->category, ENT_QUOTES, 'UTF-8');
                                            ?>
                                                <a href="category.php?q=<?= urlencode($item->category) ?>" class="category"><?= $safe_c ?></a>
                                            <?php } ?>
                                        <?php } ?>
                                        —
                                        <span class="date"><?= $item_pubDate ?></span>
                                    </div>
                                    <h2 class="heading">
                                        <a href="<?= $item_link ?>"><?= $item_title ?></a>
                                    </h2>
                                    <p><?= $item_desc ?> ...</p>
                                    <a href="#" class="post-author d-flex align-items-center">
                                        <div class="author-pic">
                                            <img src="<?= $author_img ?>" alt="<?= $item_creator ?>" />
                                        </div>
                                        <div class="text">
                                            <strong><?= $item_creator ?></strong>
                                            <span>Writer</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                <?php } else { ?>
                    <div class="col-lg-9 text-center py-5">
                        <p class="text-muted">ไม่พบข้อมูลบทความในหมวดหมู่นี้</p>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <?php include("./theme/footer.php"); ?>    

</body>

</html>
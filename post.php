<?php
require_once __DIR__ . '/components/author-images.php';
require_once __DIR__ . '/components/medium-service.php';

$post_id = isset($_GET['id']) ? trim($_GET['id']) : '';
$article = get_samkhok_article_by_id($post_id);

if ($article) {
    $title = htmlspecialchars($article->title, ENT_QUOTES, 'UTF-8') . " - สามโคก";
    $author = htmlspecialchars($article->creator, ENT_QUOTES, 'UTF-8');
    $description = htmlspecialchars($article->first_paragraph, ENT_QUOTES, 'UTF-8');
    $keywords = "สามโคก, ปทุมธานี, ท่องเที่ยว, วัฒนธรรม, ภูมิปัญญา, " . implode(', ', $article->category ?? []);
    $url = "https://www.samkhok.org/post.php?id=" . urlencode($post_id);
    $image = htmlspecialchars($article->image_url, ENT_QUOTES, 'UTF-8');
} else {
    $title = "ไม่พบบทความ - สามโคก";
    $author = "ทีมวิจัย คณะวิทยาศาสตร์และเทคโนโลยี มหาวิทยาลัยราชภัฏวไลยอลงกรณ์ ในพระบรมราชูปถัมภ์";
    $description = "ไม่พบบทความที่ต้องการค้นหาบนแพลตฟอร์มสามโคก";
    $keywords = "สามโคก, ปทุมธานี";
    $url = "https://www.samkhok.org";
    $image = "assets/img/logo.png";
}

$latest_feed = get_samkhok_medium_feed();
$related_items = isset($latest_feed->channel->item) ? array_slice($latest_feed->channel->item, 0, 3) : [];
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <?php include("./theme/head.php"); ?>
    <link href="assets/autocomplete/autocomplete.css" rel="stylesheet">
    <style>
        .article-body {
            font-size: 1.15rem;
            line-height: 1.85;
            color: #2c3e50;
        }
        .article-body img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            margin: 1.5rem 0;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        }
        .article-body figure {
            margin: 2rem 0;
            text-align: center;
        }
        .article-body figcaption {
            font-size: 0.95rem;
            color: #6c757d;
            margin-top: 0.5rem;
            font-style: italic;
        }
        .article-body blockquote {
            border-left: 4px solid #0d6efd;
            padding-left: 1.25rem;
            margin: 1.5rem 0;
            font-style: italic;
            color: #495057;
            background: #f8f9fa;
            padding-top: 0.75rem;
            padding-bottom: 0.75rem;
            border-radius: 0 8px 8px 0;
        }
        .article-body h1, .article-body h2, .article-body h3 {
            margin-top: 2rem;
            margin-bottom: 1rem;
            font-weight: 700;
        }
        .article-hero-img {
            max-height: 500px;
            object-fit: cover;
            width: 100%;
            border-radius: 12px;
        }
    </style>
</head>

<body data-aos-easing="slide" data-aos-duration="800" data-aos-delay="0" class="">

    <?php include("./theme/nav.php"); ?>

    <div class="section pt-5 pb-5">
        <div class="container">
            <?php if ($article) { ?>
                <div class="row justify-content-center">
                    <div class="col-lg-9">
                        <!-- Breadcrumbs -->
                        <nav aria-label="breadcrumb" class="mb-4">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href=".">หน้าแรก</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?= htmlspecialchars($article->title, ENT_QUOTES, 'UTF-8') ?></li>
                            </ol>
                        </nav>

                        <!-- Post Header -->
                        <div class="post-header mb-4">
                            <div class="post-meta mb-3">
                                <?php if (!empty($article->category)) { ?>
                                    <?php foreach ($article->category as $c) { 
                                        $safe_cat = htmlspecialchars($c, ENT_QUOTES, 'UTF-8');
                                    ?>
                                        <a href="category.php?q=<?= urlencode($c) ?>" class="badge bg-primary text-decoration-none me-1"><?= $safe_cat ?></a>
                                    <?php } ?>
                                <?php } ?>
                                <span class="text-muted ms-2">&mdash; <?= htmlspecialchars($article->pubDate, ENT_QUOTES, 'UTF-8') ?></span>
                            </div>

                            <h1 class="heading display-5 fw-bold mb-4"><?= htmlspecialchars($article->title, ENT_QUOTES, 'UTF-8') ?></h1>

                            <!-- Author Card -->
                            <div class="d-flex align-items-center p-3 bg-light rounded-3 mb-4">
                                <?php
                                $author_img = isset($author_images[$article->creator]) ? htmlspecialchars($author_images[$article->creator], ENT_QUOTES, 'UTF-8') : 'assets/img/logo.png';
                                ?>
                                <img src="<?= $author_img ?>" class="rounded-circle me-3" width="50" height="50" style="object-fit:cover;" alt="<?= htmlspecialchars($article->creator, ENT_QUOTES, 'UTF-8') ?>">
                                <div>
                                    <strong class="d-block text-dark"><?= htmlspecialchars($article->creator, ENT_QUOTES, 'UTF-8') ?></strong>
                                    <small class="text-muted">ผู้เขียน / นักวิจัยโครงการสามโคก</small>
                                </div>
                            </div>
                        </div>

                        <!-- Featured Hero Image -->
                        <?php if (!empty($article->image_url)) { ?>
                            <div class="mb-5">
                                <img src="<?= htmlspecialchars($article->image_url, ENT_QUOTES, 'UTF-8') ?>" class="img-fluid article-hero-img shadow" alt="<?= htmlspecialchars($article->title, ENT_QUOTES, 'UTF-8') ?>">
                            </div>
                        <?php } ?>

                        <!-- Article Content Body -->
                        <div class="article-body">
                            <?= $article->contentEncoded ?>
                        </div>

                        <hr class="my-5">

                        <!-- Footer Original Link -->
                        <div class="d-flex justify-content-between align-items-center bg-light p-4 rounded-3 mb-5">
                            <div>
                                <h6 class="mb-1 fw-bold">บทความจากคลังปัญญาชุมชนสามโคก</h6>
                                <p class="mb-0 text-muted small">ตีพิมพ์และเผยแพร่ดั้งเดิมบน Medium Publication</p>
                            </div>
                            <a href="<?= htmlspecialchars($article->link, ENT_QUOTES, 'UTF-8') ?>" target="_blank" rel="noopener noreferrer" class="btn btn-outline-primary btn-sm">
                                อ่านบน Medium <i class="fas fa-external-link-alt ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Related Articles Section -->
                <?php if (!empty($related_items)) { ?>
                    <div class="row justify-content-center mt-5">
                        <div class="col-lg-9">
                            <h3 class="fw-bold mb-4">บทความที่น่าสนใจอื่นๆ</h3>
                            <div class="row g-4">
                                <?php foreach ($related_items as $rel) { 
                                    if ($rel->id === $article->id) continue;
                                    $rel_url = get_post_url($rel);
                                    $rel_title = htmlspecialchars($rel->title, ENT_QUOTES, 'UTF-8');
                                    $rel_image = htmlspecialchars($rel->image_url, ENT_QUOTES, 'UTF-8');
                                ?>
                                    <div class="col-md-4">
                                        <div class="card h-100 border-0 shadow-sm">
                                            <a href="<?= $rel_url ?>">
                                                <img src="<?= $rel_image ?>" class="card-img-top" style="height:160px; object-fit:cover;" alt="<?= $rel_title ?>">
                                            </a>
                                            <div class="card-body p-3">
                                                <h6 class="card-title fw-bold">
                                                    <a href="<?= $rel_url ?>" class="text-decoration-none text-dark"><?= mb_substr($rel_title, 0, 50) ?>...</a>
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            <?php } else { ?>
                <div class="row justify-content-center py-5">
                    <div class="col-lg-6 text-center">
                        <div class="p-5 bg-light rounded-3 shadow-sm">
                            <i class="bi bi-exclamation-triangle text-warning display-1 mb-3"></i>
                            <h3 class="fw-bold mb-3">ไม่พบบทความที่ต้องการ</h3>
                            <p class="text-muted mb-4">บทความนี้อาจถูกย้ายหรือไม่อยู่ในระบบแคชชั่วคราว</p>
                            <a href="." class="btn btn-primary"><i class="fas fa-home me-2"></i>กลับหน้าแรก</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <?php include("./theme/footer.php"); ?>

</body>

</html>

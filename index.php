<?php
// $jsonurl = "http://api.wipmania.com/json";
// $json = file_get_contents($jsonurl);
// var_dump(json_decode($json));

$data = json_decode(file_get_contents("https://ckartisan.com/api/medium/feed/samkhok"));
$laravel = json_decode(file_get_contents("https://ckartisan.com/api/medium/feed/samkhok"));
$ubuntu = json_decode(file_get_contents("https://ckartisan.com/api/medium/feed/samkhok"));
$git = json_decode(file_get_contents("https://ckartisan.com/api/medium/feed/samkhok"));

$author_images = [
    "_KaoDhana" => "https://miro.medium.com/fit/c/88/88/1*25ZIxGT-YFj7cZVib4dVKA@2x.jpeg",
    "Sitthi Sitthipol" => "https://miro.medium.com/fit/c/176/176/0*AviJaK_gmEBZzdKR",
];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("./theme/head.php"); ?>
</head>

<body data-aos-easing="slide" data-aos-duration="800" data-aos-delay="0" class="">

    <?php include("./theme/nav.php"); ?>

    <div class="content">
        <!--  trending  -->
        <div class="section pt-5 pb-0">
            <div class="container">
                <div class="row justify-content-center mb-5">
                    <div class="col-lg-7 text-center">
                        <h2 class="heading">Trending</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="posts-slide-wrap">
                            <div class="posts-slide" id="posts-slide">
                                <?php foreach ($data->channel->item as $item) { ?>
                                    <div class="item">
                                        <div class="post-entry d-lg-flex">
                                            <div class="me-lg-5 thumbnail mb-4 mb-lg-0">
                                                <a target="_blank" href="<?= $item->link ?>">
                                                    <img src="<?= $item->image_url ?>" alt="Image" class="img-fluid" data-pagespeed-url-hash="1105166545" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                </a>
                                            </div>
                                            <div class="content align-self-center">
                                                <div class="post-meta mb-3">
                                                    <?php if (isset($item->category)) { ?>
                                                        <?php if (is_array($item->category)) { ?>
                                                            <?php foreach ($item->category as $c) { ?>
                                                                <a href="#" class="category"><?= $c ?></a>
                                                            <?php } ?>
                                                        <?php } else { ?>
                                                            <a href="#" class="category"><?= $item->category ?></a>
                                                        <?php } ?>
                                                    <?php } ?>
                                                    &mdash;
                                                    <span class="date"><?= $item->pubDate ?></span>
                                                </div>
                                                <h2 class="heading">
                                                    <a target="_blank" href="<?= $item->link ?>"><?= $item->title ?></a>
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


                                    <?php break; ?>
                                    <!-- //  <hr />  -->
                                <?php } ?>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--  blog  -->
        <div class="section">
            <div class="container">
                <div class="row g-5">
                    <?php foreach ($data->channel->item as $index => $item) { ?>
                        <?php
                        if ($index == 0)  continue ; 
                        ?>
                        <div class="col-lg-4">
                            <div class="post-entry d-block small-post-entry-v">
                                <div class="thumbnail">
                                    <a target="_blank" href="<?= $item->link ?>">
                                        <img src="<?= $item->image_url ?>" alt="Image" class="img-fluid" />
                                    </a>
                                </div>
                                <div class="content">
                                    <div class="post-meta mb-1">
                                        <?php if (isset($item->category)) { ?>
                                            <?php if (is_array($item->category)) { ?>
                                                <?php foreach ($item->category as $c) { ?>
                                                    <a href="#" class="category"><?= $c ?></a>
                                                <?php } ?>
                                            <?php } else { ?>
                                                <a href="#" class="category"><?= $item->category ?></a>
                                            <?php } ?>
                                        <?php } ?>
                                        —
                                        <span class="date">July 2, 2020</span>
                                    </div>
                                    <h2 class="heading mb-3"><a target="_blank" href="<?= $item->link ?>"><?= $item->title ?></a></h2>
                                    <p><?= mb_substr($item->first_paragraph, 0, 140) ?> ...</p>
                                    <a href="#" class="post-author d-flex align-items-center">
                                        <div class="author-pic">
                                            <img src="<?= $author_images[$item->creator] ?>" alt="<?= $item->creator ?>" />
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
            </div>
        </div>
        <!--  most popular post  -->
        <div class="section">
            <div class="container">
                <div class="row justify-content-center mb-5">
                    <div class="col-lg-7 text-center">
                        <h2 class="heading">Most Popular Posts</h2>
                    </div>
                </div>
            </div>
            <div class="most-popular-slider-wrap px-3 px-md-0">
                <div id="most-popular-nav" aria-label="Carousel Navigation" tabindex="0">
                    <span class="prev" data-controls="prev" aria-controls="most-popular-center" tabindex="-1">Prev</span>
                    <span class="next" data-controls="next" aria-controls="most-popular-center" tabindex="-1">Next</span>
                </div>
                <div class="most-popular-slider" id="most-popular-center">
                    <?php foreach ($laravel->channel->item as $item) { ?>
                        <div class="item">
                            <div class="post-entry d-block small-post-entry-v">
                                <div class="thumbnail">
                                    <a target="_blank" href="<?= $item->link ?>">
                                        <img src="<?= $item->image_url ?>" alt="Image" class="img-fluid" />
                                    </a>
                                </div>
                                <div class="content">
                                    <div class="post-meta mb-1">
                                        <a href="#" class="category">Business</a>
                                        <a href="#" class="category">Travel</a>
                                        &mdash;
                                        <span class="date"><?= $item->pubDate ?></span>
                                    </div>
                                    <h2 class="heading mb-3">
                                        <a href="single.html"><?= $item->title ?></a>
                                    </h2>
                                    <p><?= mb_substr($item->first_paragraph, 0, 140) ?> ...</p>
                                    <a href="#" class="post-author d-flex align-items-center">
                                        <div class="author-pic">
                                            <img src="<?= $author_images[$item->creator] ?>" alt="<?= $item->creator ?>">
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
            </div>
        </div>
        <!--  sport  -->
        <div class="section">
            <div class="container">
                <div class="row g-5">
                    <div class="col-lg-6">
                        <div class="row mb-4">
                            <div class="col-12">
                                <h2 class="h4 fw-bold">Ubuntu</h2>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <?php foreach ($ubuntu->channel->item as $index => $item) { ?>
                                <div class="col-lg-12">
                                    <div class="post-entry d-md-flex xsmall-horizontal mb-5">
                                        <div class="me-md-3 thumbnail mb-3 mb-md-0">
                                            <img src="<?= $item->image_url ?>" alt="Image" class="img-fluid">
                                        </div>
                                        <div class="content">
                                            <div class="post-meta mb-1">
                                                <?php if (isset($item->category)) { ?>
                                                    <?php if (is_array($item->category)) { ?>
                                                        <?php foreach ($item->category as $c) { ?>
                                                            <a href="#" class="category"><?= $c ?></a>
                                                        <?php } ?>
                                                    <?php } else { ?>
                                                        <a href="#" class="category"><?= $item->category ?></a>
                                                    <?php } ?>
                                                <?php } ?>
                                                —
                                                <span class="date"><?= $item->pubDate ?></span>
                                            </div>
                                            <h2 class="heading">
                                                <a target="_blank" href="<?= $item->link ?>"><?= $item->title ?></a>
                                            </h2>
                                            <a href="#" class="post-author d-flex align-items-center">
                                                <div class="author-pic">
                                                    <img src="<?= $author_images[$item->creator] ?>" alt="<?= $item->creator ?>">
                                                </div>
                                                <div class="text">
                                                    <strong><?= $item->creator ?></strong>
                                                    <span>Writer</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                if ($index >= 3) {  break; } 
                                ?>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row mb-4">
                            <div class="col-12">
                                <h2 class="h4 fw-bold">Git</h2>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <?php foreach ($git->channel->item as $index => $item) { ?>
                                <div class="col-lg-12">
                                    <div class="post-entry d-md-flex xsmall-horizontal mb-5">
                                        <div class="me-md-3 thumbnail mb-3 mb-md-0">
                                            <img src="<?= $item->image_url ?>" alt="Image" class="img-fluid">
                                        </div>
                                        <div class="content">
                                            <div class="post-meta mb-1">
                                                <?php if (isset($item->category)) { ?>
                                                    <?php if (is_array($item->category)) { ?>
                                                        <?php foreach ($item->category as $c) { ?>
                                                            <a href="#" class="category"><?= $c ?></a>
                                                        <?php } ?>
                                                    <?php } else { ?>
                                                        <a href="#" class="category"><?= $item->category ?></a>
                                                    <?php } ?>
                                                <?php } ?>
                                                —
                                                <span class="date"><?= $item->pubDate ?></span>
                                            </div>
                                            <h2 class="heading">
                                                <a target="_blank" href="<?= $item->link ?>"><?= $item->title ?></a>
                                            </h2>
                                            <a href="#" class="post-author d-flex align-items-center">
                                                <div class="author-pic">
                                                    <img src="<?= $author_images[$item->creator] ?>" alt="<?= $item->creator ?>">
                                                </div>
                                                <div class="text">
                                                    <strong><?= $item->creator ?></strong>
                                                    <span>Writer</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                if ($index >= 2)  break; 
                                ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include("./theme/footer.php"); ?>
</body>

</html>
<?php
$list_title_safe = isset($list_title) ? htmlspecialchars($list_title, ENT_QUOTES, 'UTF-8') : 'บทความ';
$h_items = (isset($data) && is_object($data) && isset($data->channel->item) && is_array($data->channel->item)) ? $data->channel->item : [];
if (!empty($h_items)) {
?>
<div>
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-7 text-center">
                <h2 class="heading"><?= $list_title_safe ?></h2>
            </div>
        </div>
    </div>
    <div class="most-popular-slider-wrap px-3 px-md-0">
        <div id="most-popular-nav" aria-label="Carousel Navigation" tabindex="0">
            <span class="prev" data-controls="prev" aria-controls="most-popular-center" tabindex="-1">Prev</span>
            <span class="next" data-controls="next" aria-controls="most-popular-center" tabindex="-1">Next</span>
        </div>
        <div class="most-popular-slider" id="most-popular-center">
            <?php foreach ($h_items as $item) { 
                $post_link = get_post_url($item);
                $creator_name = isset($item->creator) ? htmlspecialchars($item->creator, ENT_QUOTES, 'UTF-8') : 'ทีมงานสามโคก';
                $author_img = (isset($item->creator) && isset($author_images[$item->creator])) ? htmlspecialchars($author_images[$item->creator], ENT_QUOTES, 'UTF-8') : 'assets/img/logo.png';
                $item_title = isset($item->title) ? htmlspecialchars($item->title, ENT_QUOTES, 'UTF-8') : '';
                $item_img = isset($item->image_url) ? htmlspecialchars($item->image_url, ENT_QUOTES, 'UTF-8') : 'assets/img/logo.png';
                $item_pubDate = isset($item->pubDate) ? htmlspecialchars($item->pubDate, ENT_QUOTES, 'UTF-8') : '';
                $item_paragraph = isset($item->first_paragraph) ? htmlspecialchars(mb_substr($item->first_paragraph, 0, 140), ENT_QUOTES, 'UTF-8') : '';
            ?>
                <div class="item">
                    <div class="post-entry d-block small-post-entry-v">
                        <div class="thumbnail">
                            <a href="<?= $post_link ?>">
                                <img loading="lazy" src="<?= $item_img ?>" alt="<?= $item_title ?>" class="img-fluid" style="width:100%; height: 250px; object-fit:cover;" />
                            </a>
                        </div>
                        <div class="content">
                            <div class="post-meta mb-1">
                                <?php if (isset($item->category)) { ?>
                                    <?php if (is_array($item->category)) { ?>
                                        <?php foreach (preg_grep("/[^A-z]+/", $item->category) as $c) { ?>
                                            <a href="category.php?q=<?= urlencode($c) ?>" class="category"><?= htmlspecialchars($c, ENT_QUOTES, 'UTF-8') ?></a> |
                                        <?php } ?>
                                    <?php } else { ?>
                                        <a href="category.php?q=<?= urlencode($item->category) ?>" class="category"><?= htmlspecialchars($item->category, ENT_QUOTES, 'UTF-8') ?></a>
                                    <?php } ?>
                                <?php } ?>
                                &mdash;
                                <span class="date"><?= $item_pubDate ?></span>
                            </div>
                            <h2 class="heading mb-3">
                                <a href="<?= $post_link ?>"><?= $item_title ?></a>
                            </h2>
                            <p><?= $item_paragraph ?> ...</p>
                            <a href="#" class="post-author d-flex align-items-center">
                                <div class="author-pic">
                                    <img loading="lazy" src="<?= $author_img ?>" alt="<?= $creator_name ?>">
                                </div>
                                <div class="text">
                                    <strong><?= $creator_name ?></strong>
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
<?php } ?>
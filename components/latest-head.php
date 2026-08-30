<div>
    <!--  Hilight  -->
    <div class="section pt-5 pb-0">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-7 text-center">
                    <h2 class="heading">บทความล่าสุด</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="posts-slide-wrap">
                        <div class="posts-slide" id="posts-slide">
                            <?php 
                            $items = (isset($data) && is_object($data) && isset($data->channel->item) && is_array($data->channel->item)) ? $data->channel->item : [];
                            if (!empty($items)) {
                                foreach ($items as $item) { 
                                    $post_link = get_post_url($item);
                                    $creator_name = isset($item->creator) ? htmlspecialchars($item->creator, ENT_QUOTES, 'UTF-8') : 'ทีมงานสามโคก';
                                    $author_img = (isset($item->creator) && isset($author_images[$item->creator])) ? htmlspecialchars($author_images[$item->creator], ENT_QUOTES, 'UTF-8') : 'assets/img/logo.png';
                                    $item_title = isset($item->title) ? htmlspecialchars($item->title, ENT_QUOTES, 'UTF-8') : '';
                                    $item_img = isset($item->image_url) ? htmlspecialchars($item->image_url, ENT_QUOTES, 'UTF-8') : 'assets/img/logo.png';
                                    $item_pubDate = isset($item->pubDate) ? htmlspecialchars($item->pubDate, ENT_QUOTES, 'UTF-8') : '';
                                    $item_paragraph = isset($item->first_paragraph) ? htmlspecialchars(mb_substr($item->first_paragraph, 0, 140), ENT_QUOTES, 'UTF-8') : '';
                            ?>
                                    <div class="item">
                                        <div class="post-entry d-lg-flex">
                                            <div class="me-lg-5 thumbnail mb-4 mb-lg-0">
                                                <a href="<?= $post_link ?>">
                                                    <img loading="lazy" src="<?= $item_img ?>" alt="<?= $item_title ?>" class="img-fluid" style="width:100%; object-fit:cover;" />
                                                </a>
                                            </div>
                                            <div class="content align-self-center">
                                                <div class="post-meta mb-3">
                                                    <?php if (isset($item->category)) { ?>
                                                        <?php if (is_array($item->category)) { ?>
                                                            <?php foreach (preg_grep("/[^A-z]+/", $item->category) as $i => $c) { ?>
                                                                <a href="category.php?q=<?= urlencode($c) ?>" class="category"><?= htmlspecialchars($c, ENT_QUOTES, 'UTF-8') ?></a> |
                                                            <?php } ?>
                                                        <?php } else { ?>
                                                            <a href="category.php?q=<?= urlencode($item->category) ?>" class="category"><?= htmlspecialchars($item->category, ENT_QUOTES, 'UTF-8') ?></a>
                                                        <?php } ?>
                                                    <?php } ?>
                                                    &mdash;
                                                    <span class="date"><?= $item_pubDate ?></span>
                                                </div>
                                                <h2 class="heading">
                                                    <a href="<?= $post_link ?>"><?= $item_title ?></a>
                                                </h2>
                                                <p><?= $item_paragraph ?> ...</p>
                                                <a href="#" class="post-author d-flex align-items-center">
                                                    <div class="author-pic">
                                                        <img loading="lazy" src="<?= $author_img ?>" alt="<?= $creator_name ?>" />
                                                    </div>
                                                    <div class="text">
                                                        <strong><?= $creator_name ?></strong>
                                                        <span>Writer</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php break; ?>
                            <?php 
                                } 
                            } else { 
                            ?>
                                <div class="text-center py-4 text-muted">ไม่พบข้อมูลบทความ</div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
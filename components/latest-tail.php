<div>
    <!--  Others  -->
    <div class="section">
        <div class="container">
            <div class="row g-5">
                <?php 
                $items = (isset($data) && is_object($data) && isset($data->channel->item) && is_array($data->channel->item)) ? $data->channel->item : [];
                if (!empty($items)) {
                    foreach ($items as $index => $item) { 
                        if ($index == 0) continue;
                        $post_link = get_post_url($item);
                        $creator_name = isset($item->creator) ? htmlspecialchars($item->creator, ENT_QUOTES, 'UTF-8') : 'ทีมงานสามโคก';
                        $author_img = (isset($item->creator) && isset($author_images[$item->creator])) ? htmlspecialchars($author_images[$item->creator], ENT_QUOTES, 'UTF-8') : 'assets/img/logo.png';
                        $item_title = isset($item->title) ? htmlspecialchars($item->title, ENT_QUOTES, 'UTF-8') : '';
                        $item_img = isset($item->image_url) ? htmlspecialchars($item->image_url, ENT_QUOTES, 'UTF-8') : 'assets/img/logo.png';
                        $item_pubDate = isset($item->pubDate) ? htmlspecialchars($item->pubDate, ENT_QUOTES, 'UTF-8') : '';
                        $item_paragraph = isset($item->first_paragraph) ? htmlspecialchars(mb_substr($item->first_paragraph, 0, 140), ENT_QUOTES, 'UTF-8') : '';
                ?>
                        <div class="col-lg-4">
                            <div class="post-entry d-block small-post-entry-v">
                                <div class="thumbnail">
                                    <a href="<?= $post_link ?>">
                                        <img loading="lazy" src="<?= $item_img ?>" alt="<?= $item_title ?>" class="img-fluid" style="width:100%; height: 200px; object-fit:cover;" />
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
                                        —
                                        <span class="date"><?= $item_pubDate ?></span>
                                    </div>
                                    <h2 class="heading mb-3"><a href="<?= $post_link ?>"><?= $item_title ?></a></h2>
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
                <?php 
                    } 
                } 
                ?>
            </div>
        </div>
    </div>
</div>
<div>
   
    <!--  Others  -->
    <div class="section">
        <div class="container">
            <div class="row g-5">
                <?php foreach ($data->channel->item as $index => $item) { ?>
                    <?php
                    if ($index == 0)  continue;
                    ?>
                    <div class="col-lg-4">
                        <div class="post-entry d-block small-post-entry-v">
                            <div class="thumbnail">
                                <a target="_blank" href="<?= $item->link ?>">
                                    <img loading="lazy" src="<?= $item->image_url ?>" alt="Image" class="img-fluid" style="width:100%; height: 200px; object-fit:cover;" />
                                </a>
                            </div>
                            <div class="content">
                                <div class="post-meta mb-1">
                                    <?php if (isset($item->category)) { ?>
                                        <?php if (is_array($item->category)) { ?>
                                            <?php foreach (preg_grep("/[^A-z]+/", $item->category) as $c) { ?>
                                                <a href="category.php?q=<?= $c ?>" class="category"><?= $c ?></a> |
                                            <?php } ?>
                                        <?php } else { ?>
                                            <a href="category.php?q=<?= $item->category ?>" class="category"><?= $item->category ?></a>
                                        <?php } ?>
                                    <?php } ?>
                                    —
                                    <span class="date"><?= $item->pubDate ?></span>
                                </div>
                                <h2 class="heading mb-3"><a target="_blank" href="<?= $item->link ?>"><?= $item->title ?></a></h2>
                                <p><?= mb_substr($item->first_paragraph, 0, 140) ?> ...</p>
                                <a href="#" class="post-author d-flex align-items-center">
                                    <div class="author-pic">
                                        <img loading="lazy" src="<?= $author_images[$item->creator] ?>" alt="<?= $item->creator ?>" />
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
</div>
<div>
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-7 text-center">
                <h2 class="heading"><?=$list_title?></h2>
            </div>
        </div>
    </div>
    <div class="most-popular-slider-wrap px-3 px-md-0">
        <div id="most-popular-nav" aria-label="Carousel Navigation" tabindex="0">
            <span class="prev" data-controls="prev" aria-controls="most-popular-center" tabindex="-1">Prev</span>
            <span class="next" data-controls="next" aria-controls="most-popular-center" tabindex="-1">Next</span>
        </div>
        <div class="most-popular-slider" id="most-popular-center">
            <?php foreach ($data->channel->item as $item) { ?>
                <div class="item">
                    <div class="post-entry d-block small-post-entry-v">
                        <div class="thumbnail">
                            <a target="_blank" href="<?= $item->link ?>">
                                <img loading="lazy" src="<?= $item->image_url ?>" alt="Image" class="img-fluid" style="width:100%; height: 250px; object-fit:cover;" />
                            </a>
                        </div>
                        <div class="content">
                            <div class="post-meta mb-1">
                                <!-- <a href="#" class="category">Business</a> -->
                                <!-- <a href="#" class="category">Travel</a> -->
                                <?php if (isset($item->category)) { ?>
                                    <?php if (is_array($item->category)) { ?>
                                        <?php foreach (preg_grep("/[^A-z]+/", $item->category) as $c) { ?>
                                            <a href="category.php?q=<?= $c ?>" class="category"><?= $c ?></a> |
                                        <?php } ?>
                                    <?php } else { ?>
                                        <a href="category.php?q=<?= $item->category ?>" class="category"><?= $item->category ?></a>
                                    <?php } ?>
                                <?php } ?>
                                &mdash;
                                <span class="date"><?= $item->pubDate ?></span>
                            </div>
                            <h2 class="heading mb-3">
                                <a href="single.html"><?= $item->title ?></a>
                            </h2>
                            <p><?= mb_substr($item->first_paragraph, 0, 140) ?> ...</p>
                            <a href="#" class="post-author d-flex align-items-center">
                                <div class="author-pic">
                                    <img loading="lazy" src="<?= $author_images[$item->creator] ?>" alt="<?= $item->creator ?>">
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
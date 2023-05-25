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
                            <?php foreach ($data->channel->item as $item) { ?>
                                <div class="item">
                                    <div class="post-entry d-lg-flex">
                                        <div class="me-lg-5 thumbnail mb-4 mb-lg-0">
                                            <a target="_blank" href="<?= $item->link ?>">
                                                <img loading="lazy" src="<?= $item->image_url ?>" alt="Image" class="img-fluid" style="width:100%;  object-fit:cover;" />
                                            </a>
                                        </div>
                                        <div class="content align-self-center">
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
                                                &mdash;
                                                <span class="date"><?= $item->pubDate ?></span>
                                            </div>
                                            <h2 class="heading">
                                                <a target="_blank" href="<?= $item->link ?>"><?= $item->title ?></a>
                                            </h2>
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


                                <?php break; ?>
                                <!-- //  <hr />  -->
                            <?php } ?>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
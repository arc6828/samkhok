<div>
    <div class="row mb-4">
        <div class="col-12">
            <h2 class="h4 fw-bold"><?=$list_title?></h2>
        </div>
    </div>
    <div class="row justify-content-center">
        <?php foreach ($data->channel->item as $index => $item) { ?>
            <div class="col-lg-12">
                <div class="post-entry d-md-flex xsmall-horizontal mb-5">
                    <div class="me-md-3 thumbnail mb-3 mb-md-0">
                        <img loading="lazy" src="<?= $item->image_url ?>" alt="Image" class="img-fluid">
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
                        <h2 class="heading">
                            <a target="_blank" href="<?= $item->link ?>"><?= $item->title ?></a>
                        </h2>
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
            <?php
            if ($index >= 3) {
                break;
            }
            ?>
        <?php } ?>
    </div>
</div>
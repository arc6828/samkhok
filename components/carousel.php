<?php
$carousel_items = (isset($data) && is_object($data) && isset($data->channel->item) && is_array($data->channel->item)) ? $data->channel->item : [];
if (!empty($carousel_items)) {
?>
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
    <div class="carousel-indicators">
        <?php foreach ($carousel_items as $index => $item) { ?>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?= $index ?>" class="<?= ($index == 0 ? "active" : "") ?>" aria-current="<?= ($index == 0 ? "true" : "false") ?>" aria-label="Slide <?= $index + 1 ?>"></button>
        <?php } ?>
    </div>
    <div class="carousel-inner">
        <?php foreach ($carousel_items as $index => $item) { 
            $post_link = get_post_url($item);
            $item_title = isset($item->title) ? htmlspecialchars($item->title, ENT_QUOTES, 'UTF-8') : '';
            $item_img = isset($item->image_url) ? htmlspecialchars($item->image_url, ENT_QUOTES, 'UTF-8') : 'assets/img/logo.png';
            $item_paragraph = isset($item->first_paragraph) ? htmlspecialchars(mb_substr($item->first_paragraph, 0, 100), ENT_QUOTES, 'UTF-8') : '';
        ?>
            <div class="carousel-item <?= ($index == 0 ? "active" : "") ?>">
                <a href="<?= $post_link ?>">
                    <img loading="lazy" src="<?= $item_img ?>" style="height: 500px; object-fit:cover;" class="d-block w-100" alt="<?= $item_title ?>">
                </a>
                <div class="carousel-caption d-xl-block d-lg-block d-md-block ">
                    <h3>
                        <a href="<?= $post_link ?>" class="text-white text-decoration-none">
                            <span style="background-color: black; opacity: 0.7; color: white; padding: 4px 8px; border-radius: 4px;">
                                <?= $item_title ?>
                            </span>
                        </a>
                    </h3>
                    <label style="background-color: black; opacity: 0.7; color: white; padding: 2px 6px; border-radius: 4px;"><?= $item_paragraph ?> ...</label>
                </div>
            </div>
        <?php } ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<?php } ?>
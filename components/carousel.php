<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
    <div class="carousel-indicators">
        <?php foreach ( $data->channel->item as $index => $item) { ?>
            <?php if ($index == 0) { ?>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide <?= $index + 1 ?>"></button>
            <?php } else { ?>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?= $index ?>" aria-label="Slide <?= $index + 1 ?>"></button>
            <?php } ?>
        <?php } ?>
    </div>
    <div class="carousel-inner">
        <?php foreach ($data->channel->item as $index => $item) { ?>
            <div class="carousel-item <?= ($index == 0 ? "active" : "") ?>">
                <a href="<?= $item->link ?>" target="_blank" >
                <img loading="lazy" src="<?= $item->image_url ?>" style="height : 500px; object-fit:cover;" class="d-block w-100" alt="...">
                </a>
                <div class="carousel-caption d-xl-block d-lg-block d-md-block ">
                    <h3>
                        <span style="background-color: black; opacity: 0.7; color : white;">
                            <?= $item->title ?>
                        </span>
                    </h3>
                    <label style="background-color: black; opacity: 0.7; color : white;"><?= mb_substr($item->first_paragraph, 0, 100) ?> ...</label>
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
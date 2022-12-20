<?php
// META DATA
$title = "สามโคก - ดินแดนแห่งภูมิปัญญาท้องถิ่นริมสองฝั่งเจ้าพระยา";
$author = "ทีมวิจัยคณะวิทยาศาสตร์และเทคโนโลยี มหาวิทยาลัยราชภัฏวไลยอลงกรณ์ ในพระบรมราชูปถัมภ์";
$description = "อำเภอสามโคก จังหวัดปทุมธานี เป็นเมื่องที่มีประวัติศาสตร์ยาวนานตั้งแต่สมัยอยุธยาเป็นราชธานี ตั้งอยู่ริมสองฝั่งของแม่น้ำเจ้าพระยา มีภูมิปัญญา วัตนธรรม ประเพณีท้องถิ่นท้องถิ่นที่เป็นเอกลัษณ์ อีกทั้งยังเต็มไปด้วยสถานที่โบราณสถานและสถานที่ท่องเที่ยวต่างๆ สำหรับการพักผ่อนหย่อนใจ";
$keywords = "สามโคก, ปทุมธานี, แม่น้ำเจ้าพระยา, โบราณ, ท่องเที่ยว, ภูมิปัญญา, ประเพณี, วัตนธรรม";
$url = "https://www.samkhok.org";
$image = "https://miro.medium.com/max/1400/1*v_-qDdjsr35MepgtUPOdvg.webp";

// DATA
$data = json_decode(file_get_contents("https://ckartisan.com/api/medium/feed/samkhok"));
$travel = json_decode(file_get_contents("https://ckartisan.com/api/medium/feed/samkhok/tagged/travel"));
$culture = json_decode(file_get_contents("https://ckartisan.com/api/medium/feed/samkhok/tagged/culture"));
$thinking = json_decode(file_get_contents("https://ckartisan.com/api/medium/feed/samkhok/tagged/thinking"));

$author_images = [
    "_KaoDhana" => "https://miro.medium.com/fit/c/88/88/1*25ZIxGT-YFj7cZVib4dVKA@2x.jpeg",
    "Sitthi Sitthipol" => "https://miro.medium.com/fit/c/176/176/0*AviJaK_gmEBZzdKR",
];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("./theme/head.php"); ?>
    <link href="assets/autocomplete/autocomplete.css" rel="stylesheet">
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
                        if ($index == 0)  continue;
                        ?>
                        <div class="col-lg-4">
                            <div class="post-entry d-block small-post-entry-v">
                                <div class="thumbnail">
                                    <a target="_blank" href="<?= $item->link ?>">
                                        <img src="<?= $item->image_url ?>" alt="Image" class="img-fluid" style="width:100%; height: 200px; object-fit:cover;" />
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
                                        <span class="date"><?= $item->pubDate ?></span>
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
                    <?php foreach ($travel->channel->item as $item) { ?>
                        <div class="item">
                            <div class="post-entry d-block small-post-entry-v">
                                <div class="thumbnail">
                                    <a target="_blank" href="<?= $item->link ?>">
                                        <img src="<?= $item->image_url ?>" alt="Image" class="img-fluid" style="width:100%; height: 250px; object-fit:cover;" />
                                    </a>
                                </div>
                                <div class="content">
                                    <div class="post-meta mb-1">
                                        <!-- <a href="#" class="category">Business</a> -->
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
                                <h2 class="h4 fw-bold">culture</h2>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <?php foreach ($culture->channel->item as $index => $item) { ?>
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
                                if ($index >= 3) {
                                    break;
                                }
                                ?>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row mb-4">
                            <div class="col-12">
                                <h2 class="h4 fw-bold">thinking</h2>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <?php foreach ($thinking->channel->item as $index => $item) { ?>
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
    <script src="./assets/autocomplete/autocomplete.js"></script>
    <script>
        function stripHtml(html) {
            let tmp = document.createElement("DIV");
            tmp.innerHTML = html;
            return tmp.textContent || tmp.innerText || "";
        }

        fetch("https://ckartisan.com/api/medium/feed/samkhok")
            .then((data) => (data.json()))
            .then((data) => {
                console.log(data);
                data = data.channel.item;
                data = data.map(function(item) {
                    return {
                        "title": item.title,
                        "content": stripHtml(item.contentEncoded).replace(/[^ก-๛0-9\s]+/g, "") ,
                        "link": item.link,
                    };
                });
                autocomplete(document.getElementById("searchbox"), data);
            })
        // let countries = ["Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Anguilla", "Antigua &amp; Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia &amp; Herzegovina", "Botswana", "Brazil", "British Virgin Islands", "Brunei", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central Arfrican Republic", "Chad", "Chile", "China", "Colombia", "Congo", "Cook Islands", "Costa Rica", "Cote D Ivoire", "Croatia", "Cuba", "Curacao", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands", "Faroe Islands", "Fiji", "Finland", "France", "French Polynesia", "French West Indies", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guam", "Guatemala", "Guernsey", "Guinea", "Guinea Bissau", "Guyana", "Haiti", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran", "Iraq", "Ireland", "Isle of Man", "Israel", "Italy", "Jamaica", "Japan", "Jersey", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Kosovo", "Kuwait", "Kyrgyzstan", "Laos", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Mauritania", "Mauritius", "Mexico", "Micronesia", "Moldova", "Monaco", "Mongolia", "Montenegro", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauro", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "North Korea", "Norway", "Oman", "Pakistan", "Palau", "Palestine", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russia", "Rwanda", "Saint Pierre &amp; Miquelon", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Serbia", "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Korea", "South Sudan", "Spain", "Sri Lanka", "St Kitts &amp; Nevis", "St Lucia", "St Vincent", "Sudan", "Suriname", "Swaziland", "Sweden", "Switzerland", "Syria", "Taiwan", "Tajikistan", "Tanzania", "Thailand", "Timor L'Este", "Togo", "Tonga", "Trinidad &amp; Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks &amp; Caicos", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States of America", "Uruguay", "Uzbekistan", "Vanuatu", "Vatican City", "Venezuela", "Vietnam", "Virgin Islands (US)", "Yemen", "Zambia", "Zimbabwe"];
        // autocomplete(document.getElementById("searchbox"), data);
    </script>
</body>

</html>
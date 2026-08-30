<?php
$safe_title = htmlspecialchars($title ?? 'สามโคก', ENT_QUOTES, 'UTF-8');
$safe_author = htmlspecialchars($author ?? '', ENT_QUOTES, 'UTF-8');
$safe_description = htmlspecialchars($description ?? '', ENT_QUOTES, 'UTF-8');
$keywords_str = is_array($keywords ?? '') ? implode(', ', $keywords) : ($keywords ?? '');
$safe_keywords = htmlspecialchars($keywords_str, ENT_QUOTES, 'UTF-8');
$safe_url = htmlspecialchars($url ?? '', ENT_QUOTES, 'UTF-8');
$safe_image = htmlspecialchars($image ?? '', ENT_QUOTES, 'UTF-8');
?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="title" content="<?= $safe_title ?>" />
<meta name="author" content="<?= $safe_author ?>" />
<meta name="description" content="<?= $safe_description ?>" />
<meta name="keywords" content="<?= $safe_keywords ?>" />
<link rel="canonical" href="<?= $safe_url ?>" />

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website" />
<meta property="og:url" content="<?= $safe_url ?>" />
<meta property="og:title" content="<?= $safe_title ?>" />
<meta property="og:description" content="<?= $safe_description ?>" />
<meta property="og:image" content="<?= $safe_image ?>" />

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image" />
<meta property="twitter:url" content="<?= $safe_url ?>" />
<meta property="twitter:title" content="<?= $safe_title ?>" />
<meta property="twitter:description" content="<?= $safe_description ?>" />
<meta property="twitter:image" content="<?= $safe_image ?>" />

<title><?= $safe_title ?></title>
<link href="https://upload.wikimedia.org/wikipedia/commons/thumb/8/82/Amphoe_1307.svg/250px-Amphoe_1307.svg.png" rel="icon">
<!--  <link rel="preconnect" href="https://fonts.gstatic.com/">  -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link href="assets/magdesign/css2.css" rel="stylesheet">
<link href="assets/magdesign/all.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" rel="stylesheet">
<!--  <script defer="" src="url('/magdesign/s.js')"></script>  -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

<link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">
<style>
    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    nav,
    .nav,
    .menu,
    button,
    .button,
    .btn,
    .price,
    ._heading,
    .wp-block-pullquote blockquote,
    blockquote,
    label,
    legend,
    .card-header,
    th,
    li,
    a:not(.logo),
    .prompt {
        font-family: "Prompt", "Open Sans script=all rev=1" !important;
        font-weight: 500 !important;
    }

    .border-soft {
        border-color: #F3F7FA !important;
    }

    .col-6 {
        flex: 0 0 auto;
        width: 50%;
    }

    @media (min-width: 576px) {
        .col-sm-6 {
            flex: 0 0 auto;
            width: 50%;
        }
    }

    @media (min-width: 992px) {
        .col-lg-3 {
            flex: 0 0 auto;
            width: 25%;
        }
    }

    .row-cols-1>* {
        flex: 0 0 auto;
        width: 100%;
    }

    @media (min-width: 992px) {
        .row-cols-lg-2>* {
            flex: 0 0 auto;
            width: 50%;
        }
    }

    .g-4,.gy-4 {
        --bs-gutter-y: 1.5rem;
    }
</style>
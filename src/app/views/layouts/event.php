<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="format-detection" content="telephone=no">

    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/slick.css">
    <link rel="stylesheet" href="/css/slick-theme.css">
</head>

<body>
<header>

</header>
<nav>
    <div class="menu">
        <?php new \app\widgets\menu\Menu([
            'tpl' => APP . '/view/widgets/menu/layouts/default.php',
            'attrs' => ['style' => ''],
        ]); ?>
    </div>
</nav>
<div class="content">
    <div class="main">
        <div class="list flex flex-wrap">
            <?= $content ?>
        </div>
        <div class="sidebar">

        </div>
    </div>
</div>
<footer>

</footer>


<script src="/js/jquery-3.3.1.min.js"></script>
<script src="/js/slick.min.js"></script>
<script src="/js/helper.js"></script>
</body>

</html>

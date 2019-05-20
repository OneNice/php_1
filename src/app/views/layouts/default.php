<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="format-detection" content="telephone=no">

    <link rel="stylesheet" href="/css/slick-theme.css">
    <link rel="stylesheet" href="/css/slick.css">
    <link rel="stylesheet" href="/css/jquery-ui.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/bootstrapValidator.min.css">
    <script src="/js/jquery-3.3.1.min.js"></script>
    <script src="/js/jquery-ui.min.js"></script>
    <script src="/js/slick.min.js"></script>
    <script src="/js/typeahead.bundle.js"></script>
    <script src="/js/validate.min.js"></script>
    <script src="/js/language/ru_RU.js"></script>

    <?= $this->getMeta() ?>
</head>

<body>
<script> var path = '<?= PATH ?>', userGlobal = '<?= isset($_SESSION['user']) ? 1 : 'false' ?>';</script>
<?php
if(isset($_SESSION['error'])){ ?>
    <div class="error_message"><?= $_SESSION['error'] ?></div>
   <?php unset($_SESSION['error']);
} else if(isset($_SESSION['success'])) { ?>
    <div class="success_message"><?= $_SESSION['success'] ?></div>
  <?php unset($_SESSION['success']);
}
?>
<header>
    <a href="/" ><img class="logo" src="/img/icons/tickets.png" alt=""></a>
    <div class="search">
        <form action="/search" method="get" autocomplete="off">
            <input placeholder="Как приру..." type="text" id="typeahead" class="typeahead" name="s">
            <button>Поиск</button>
        </form>
    </div>
    <?php if(!isset($_SESSION['user'])){ ?>
    <div class="account">
        <a href="/user/login" class="signin">Вход</a>
        <a href="/user/signup" class="signup">Регистрация</a>
    </div>
    <?php } else{ ?>
    <div class="account">
        <a href="/lk" class="signlk">ЛК</a>
        <a href="/user/logout" class="signout">Выход</a>
    </div>
    <?php }?>
</header>
<nav>
    <div class="menu">
        <?php new \app\widgets\menu\Menu([
                'tpl' => APP . '/view/widgets/menu/layouts/default.php',
                'attrs' => ['style' => ''],
        ]); ?>
    </div>
    <div class="menu_fixed">
        <?php new \app\widgets\menu\Menu([
            'tpl' => APP . '/view/widgets/menu/layouts/default.php',
            'attrs' => ['style' => ''],
        ]); ?>
    </div>
</nav>

     <?= $content ?>

<footer>
    © Ticket, 2019 | Заказ билетов онлайн
</footer>

<script src="/js/helper.js"></script>
</body>

</html>

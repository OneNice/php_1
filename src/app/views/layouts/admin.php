<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="/admin_assets/images/favicon.ico">

    <!-- Dropzone css -->
    <link href="/admin_assets/plugins/dropzone/dropzone.css" rel="stylesheet" type="text/css" />
    <link href="/admin_assets/plugins/jquery-toastr/jquery.toast.min.css" rel="stylesheet" />
    <!-- App css -->
    <link href="/admin_assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="/admin_assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="/admin_assets/css/metismenu.min.css" rel="stylesheet" type="text/css" />
    <link href="/admin_assets/css/style.css" rel="stylesheet" type="text/css" />

    <script src="/admin_assets/js/modernizr.min.js"></script>

    <?= $this->getMeta() ?>

    <!-- jQuery  -->
    <script src="/admin_assets/js/jquery.min.js"></script>
    <script src="/admin_assets/js/bootstrap.bundle.min.js"></script>
    <script src="/admin_assets/js/metisMenu.min.js"></script>
    <script src="/admin_assets/js/jquery.slimscroll.js"></script>
    <script src="/admin_assets/plugins/jquery-toastr/jquery.toast.min.js" type="text/javascript"></script>


    <link href="/admin_assets/css/bootstrap-datetimepicker-standalone.min.css" rel="stylesheet" />
    <link href="/admin_assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />

    <script src="/admin_assets/plugins/tooltipster/tooltipster.bundle.min.js"></script>
</head>


<body>

<!-- Begin page -->
<div id="wrapper">

    <!-- ========== Left Sidebar Start ========== -->
    <div class="left side-menu">

        <div class="slimscroll-menu" id="remove-scroll">

            <!--- Sidemenu -->
            <div id="sidebar-menu">

                <ul class="metismenu" id="side-menu">

                    <!--<li class="menu-title">Navigation</li>-->
                    <li class="menu-title">Главная</li>
                    <li>
                        <a href="/admin">
                            <i class="fi-air-play"></i><span class="badge badge-success float-right">Hot</span> <span> Главная </span>
                        </a>
                    </li>

                    <li class="menu-title">События</li>
                    <li>
                        <a href="javascript: void(0);"><i class="fi-menu "></i> <span> Категории </span> <span class="menu-arrow"></span></a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="/admin/cat"><span class="badge badge-success float-right"><?= \RedBeanPHP\R::count('category');?></span>Просмотреть</a></li>
                            <li><a href="/admin/cat/add">Добавить</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);"><i class=" icon-book-open "></i><span> Мероприятия </span><span class="menu-arrow"></span></a>

                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="/admin/event"><span class="badge badge-success float-right"><?= \RedBeanPHP\R::count('event');?></span>Просмотреть</a></li>
                            <li><a href="/admin/event/add">Добавить</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);"><i class=" icon-compass "></i><span> Места проведения </span><span class="menu-arrow"></span></a>

                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="/admin/place"><span class="badge badge-success float-right"><?= \RedBeanPHP\R::count('place');?></span>Просмотреть</a></li>
                            <li><a href="/admin/place/add">Добавить</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);"><i class=" icon-speedometer "></i><span> Время проведения </span><span class="menu-arrow"></span></a>

                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="/admin/time">Просмотреть</a></li>
                            <li><a href="/admin/time/add">Добавить</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);"><i class=" icon-pin "></i><span> Топ мероприятий </span><span class="menu-arrow"></span></a>

                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="/admin/top"><span class="badge badge-success float-right"><?= \RedBeanPHP\R::count('top');?></span>Просмотреть</a></li>
                            <li><a href="/admin/top/add">Добавить</a></li>
                        </ul>
                    </li>
                    <li class="menu-title">Пользователи</li>
                    <li>
                        <a href="javascript: void(0);"><i class="icon-people "></i><span> Пользователи </span><span class="menu-arrow"></span></a>

                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="/admin/user"><span class="badge badge-success float-right"><?= \RedBeanPHP\R::count('user');?></span>Все пользователи</a></li>
                            <li><a href="/admin/user/add">Добавить</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="/admin/ticket">
                            <i class=" icon-emotsmile "></i><span class="badge badge-success float-right"><?= \RedBeanPHP\R::count('orders');?></span><span> Билеты </span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/review">
                            <i class=" mdi mdi-account-card-details  "></i><span class="badge badge-success float-right"><?= \RedBeanPHP\R::count('votes');?></span>  <span> Отзывы </span>
                        </a>
                    </li>

                </ul>

            </div>
            <!-- Sidebar -->

            <div class="clearfix"></div>

        </div>
        <!-- Sidebar -left -->

    </div>
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->

    <div class="content-page">

        <!-- Top Bar Start -->
        <div class="topbar">

            <nav class="navbar-custom">

                <ul class="list-unstyled topbar-right-menu float-right mb-0">

                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" role="button"
                           aria-haspopup="false" aria-expanded="false">
                            <img src="/img/icons/avatar.png" alt="user" class="rounded-circle"> <span class="ml-1"><?= $_SESSION['user']['name'] ?> <i class="mdi mdi-chevron-down"></i> </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown">
                            <!-- item-->
                            <div class="dropdown-item noti-title">
                                <h6 class="text-overflow m-0">Привет!</h6>
                            </div>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fi-cog"></i> <span>Настройки</span>
                            </a>

                            <!-- item-->
                            <a href="/user/logout" class="dropdown-item notify-item">
                                <i class="fi-power"></i> <span>Выход</span>
                            </a>

                        </div>
                    </li>

                </ul>

                <ul class="list-inline menu-left mb-0">
                    <li class="float-left">
                        <button class="button-menu-mobile open-left disable-btn">
                            <i class="dripicons-menu"></i>
                        </button>
                    </li>
                    <li>
                        <div class="page-title-box">
                            <h4 class="page-title">Панель управления</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active">Добро пожаловать!</li>
                            </ol>
                        </div>
                    </li>

                </ul>

            </nav>

        </div>
        <!-- Top Bar End -->

    <?= $content ?>


    </div>


    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->


</div>
<?php if(isset($_SESSION['errors'])){ ?>
<script>
        $.toast({
            heading: 'Ох, что-то пошло не так',
            text: '<?= $_SESSION['errors'] ?>',
            position: 'top-right',
            loaderBg: '#a93532',
            icon: 'error',
            hideAfter: 3000,
            stack: 1
        });
</script>
<?php unset($_SESSION['errors']); } ?>

<?php if(isset($_SESSION['success'])){ ?>
<script>
        $.toast({
            heading: 'Ура!',
            text: '<?= $_SESSION['success'] ?>',
            position: 'top-right',
            loaderBg: '#08a97c',
            icon: 'success',
            hideAfter: 3000,
            stack: 1
        });
</script>
<?php unset($_SESSION['success']); } ?>
<!-- END wrapper -->


<!-- Flot chart -->
<script src="/admin_assets/plugins/flot-chart/jquery.flot.min.js"></script>
<script src="/admin_assets/plugins/flot-chart/jquery.flot.time.js"></script>
<script src="/admin_assets/plugins/flot-chart/jquery.flot.tooltip.min.js"></script>
<script src="/admin_assets/plugins/flot-chart/jquery.flot.resize.js"></script>
<script src="/admin_assets/plugins/flot-chart/jquery.flot.pie.js"></script>
<script src="/admin_assets/plugins/flot-chart/jquery.flot.crosshair.js"></script>
<script src="/admin_assets/plugins/flot-chart/curvedLines.js"></script>
<script src="/admin_assets/plugins/flot-chart/jquery.flot.axislabels.js"></script>


<!-- KNOB JS -->
<!--[if IE]>
<script type="text/javascript" src="/admin_assets/plugins/jquery-knob/excanvas.js"></script>
<![endif]-->
<script src="/admin_assets/plugins/jquery-knob/jquery.knob.js"></script>

<!-- Dashboard Init -->
<script src="/admin_assets/pages/jquery.dashboard.init.js"></script>

<!-- App js -->
<script src="/admin_assets/js/jquery.core.js"></script>
<script src="/admin_assets/js/jquery.app.js"></script>

</body>
</html>
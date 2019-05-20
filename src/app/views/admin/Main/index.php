    <!-- Start Page content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <h4 class="header-title mb-4">Обзор площадки</h4>

                        <div class="row">
                            <style>
                                .widget-chart-two{
                                    box-shadow: 5px 5px 10px 2px rgba(1,1,1,0.05);
                                }
                            </style>
                            <div class="col-sm-6 col-lg-6 col-xl-3">
                                <div class="card-box mb-0 widget-chart-two">
                                    <div class="float-right">
                                        <input data-plugin="knob" data-width="80" data-height="80" data-linecap=round
                                               data-fgColor="#0acf97" value="<?= $countUser ?>" data-max="<?= $countUser ?>" data-skin="tron" data-angleOffset="180"
                                               data-readOnly=true data-thickness=".1"/>
                                    </div>
                                    <div class="widget-chart-two-content">
                                        <p class="text-muted mb-0 mt-2">Количество пользователей</p>
                                        <h3 class=""><?= $countUser ?></h3>
                                    </div>

                                </div>
                            </div>

                            <div class="col-sm-6 col-lg-6 col-xl-3">
                                <div class="card-box mb-0 widget-chart-two">
                                    <div class="float-right">
                                        <input data-plugin="knob" data-width="80" data-height="80" data-linecap=round
                                               data-fgColor="#f9bc0b" value="<?= $count_event ?>" data-max="<?= $count_event_all ?>" data-skin="tron" data-angleOffset="180"
                                               data-readOnly=true data-thickness=".1"/>
                                    </div>
                                    <div class="widget-chart-two-content">
                                        <p class="text-muted mb-0 mt-2">Активные мероприятия</p>
                                        <h3 class=""><?= $count_event ?></h3>
                                    </div>

                                </div>
                            </div>

                            <div class="col-sm-6 col-lg-6 col-xl-3">
                                <div class="card-box mb-0 widget-chart-two">
                                    <div class="float-right">
                                        <input data-plugin="knob" data-width="80" data-height="80" data-linecap=round
                                               data-fgColor="#f1556c" value="<?= $count_event_all ?>" data-max="<?= $count_event_all ?>" data-skin="tron" data-angleOffset="180"
                                               data-readOnly=true data-thickness=".1"/>
                                    </div>
                                    <div class="widget-chart-two-content">
                                        <p class="text-muted mb-0 mt-2">Всего мероприятий</p>
                                        <h3 class=""><?= $count_event_all ?></h3>
                                    </div>

                                </div>
                            </div>

                            <div class="col-sm-6 col-lg-6 col-xl-3">
                                <div class="card-box mb-0 widget-chart-two">
                                    <div class="float-right">
                                        <input data-plugin="knob" data-width="80" data-height="80" data-linecap=round
                                               data-fgColor="#2d7bf4" value="<?= $sumTotal[0] ?>" data-max="<?= $sumTotal[0]*3 ?>" data-skin="tron" data-angleOffset="180"
                                               data-readOnly=true data-thickness=".1"/>
                                    </div>
                                    <div class="widget-chart-two-content">
                                        <p class="text-muted mb-0 mt-2">Выручка</p>
                                        <h3 class=""><?= $sumTotal[0] ?> руб.</h3>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <h4 class="header-title mb-4">Билеты</h4>

                        <div class="row">
                            <div class="col-sm-6 col-lg-6 col-xl-3">
                                <div class="card-box mb-0 widget-chart-two">
                                    <div class="float-right">
                                        <input data-plugin="knob" data-width="80" data-height="80" data-linecap=round
                                               data-fgColor="#0acf97" value="<?= $orders ?>" data-skin="tron" data-angleOffset="180"
                                               data-readOnly=true data-thickness=".1"/>
                                    </div>
                                    <div class="widget-chart-two-content">
                                        <p class="text-muted mb-0 mt-2">Общее кол-во билетов</p>
                                        <h3 class=""><?= $orders ?></h3>
                                    </div>

                                </div>
                            </div>

                            <div class="col-sm-6 col-lg-6 col-xl-3">
                                <div class="card-box mb-0 widget-chart-two">
                                    <div class="float-right">
                                        <input data-plugin="knob" data-width="80" data-height="80" data-linecap=round
                                               data-fgColor="#f9bc0b" value="<?= $ordersLastWeek ?>" data-max="<?= $orders ?>" data-skin="tron" data-angleOffset="180"
                                               data-readOnly=true data-thickness=".1"/>
                                    </div>
                                    <div class="widget-chart-two-content">
                                        <p class="text-muted mb-0 mt-2">Заказанные билеты за 7 дней</p>
                                        <h3 class=""><?= $ordersLastWeek ?></h3>
                                    </div>

                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-6 col-xl-3">
                                <div class="card-box mb-0 widget-chart-two">
                                    <div class="float-right">
                                        <input data-plugin="knob" data-width="80" data-height="80" data-linecap=round
                                               data-fgColor="#f1556c" value="<?= $ordersF ?>"  data-skin="tron" data-angleOffset="180"
                                               data-readOnly=true data-thickness=".1"/>
                                    </div>
                                    <div class="widget-chart-two-content">
                                        <p class="text-muted mb-0 mt-2">Отменённые билеты</p>
                                        <h3 class=""><?= $ordersF ?></h3>
                                    </div>

                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-6 col-xl-3">
                                <div class="card-box mb-0 widget-chart-two">
                                    <div class="float-right">
                                        <input data-plugin="knob" data-width="80" data-height="80" data-linecap=round
                                               data-fgColor="#f1556c" value="<?= $ordersLastWeekF ?>" data-max="<?= $ordersF ?>" data-skin="tron" data-angleOffset="180"
                                               data-readOnly=true data-thickness=".1"/>
                                    </div>
                                    <div class="widget-chart-two-content">
                                        <p class="text-muted mb-0 mt-2">Отменённые билеты за 7 дней</p>
                                        <h3 class=""><?= $ordersLastWeekF ?></h3>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                    </div>
                </div>
            </div>
            <!-- end row -->

        </div> <!-- container -->

    </div> <!-- content -->

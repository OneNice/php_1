<div class="content">
    <script src="/admin_assets/js/bootstrap.min.js"></script>
    <script src="/admin_assets/js/moment-with-locales.min.js"></script>
    <script src="/admin_assets/js/bootstrap-datetimepicker.min.js"></script>
    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <h4 class="m-t-0 header-title">Добавление времени</h4>
                <div class="row">
                    <div class="col-12">
                        <div class="p-20">
                            <form autocomplete="off"  class="form-horizontal" role="form" action="/admin/time/save" method="post">
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">ID</label>
                                    <div class="col-10">
                                        <input type="text" name="id" class="form-control" value="<?= $time->id ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Мероприятие</label>
                                    <div class="col-10">
                                        <select name="event_id" class="form-control">
                                            <option selected><?= $time->event_id ?></option>
                                            <?php foreach ($events as $event) { ?>
                                                <option><?= $event->id . ' - '. $event->title ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label" for="example-email">Место</label>
                                    <div class="col-10">
                                        <select name="place_id" class="form-control">
                                            <option selected><?= $time->place_id ?></option>
                                            <?php foreach ($places as $place) { ?>
                                                <option><?= $place->id . ' - '. $place->name ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label" for="example-email">Даты</label>
                                    <div class="col-10">
                                        <input name="date_array" class="form-control time_hide" readonly="" type="text" value="<?= $date_arr ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label" for="example-email">Выбрать дату</label>
                                    <div class="col-10">
                                        <input type="text" class="form-control" placeholder="yyyy:mm:dd" id="datepicker-multiple-date">
                                        <div class="box">
                                            <button class="clear_date btn btn-primary waves-light waves-effect">Очистить даты</button>
                                            <button class="add_date btn btn-primary waves-light waves-effect">Добавить дату</button>
                                        </div>
                                    </div>
                                </div>
                                <style>
                                    form .box{
                                        padding: 15px;
                                    }
                                    form .box input, form .box button{
                                        margin: 5px;
                                    }
                                </style>
                                <script>
                                    var date_array = [];
                                    $('#datepicker-multiple-date').datetimepicker({
                                        format:'YYYY-MM-DD HH:mm:00',
                                        icons: {
                                            time: "fa fa-clock-o",
                                            date: "fa fa-calendar",
                                            up: "fa fa-arrow-up",
                                            down: "fa fa-arrow-down"
                                        }
                                    });
                                    $('.add_date').on('click', function (e) {
                                        e.preventDefault();
                                        date_array.push($('#datepicker-multiple-date').val());
                                        $('.time_hide').val(JSON.stringify(date_array));
                                    });
                                    $('.clear_date').on('click', function (e) {
                                        e.preventDefault();
                                        date_array = [];
                                        $('.time_hide').val(JSON.stringify(date_array));
                                    });
                                </script>

                                <button class="btn btn-primary waves-light waves-effect" type="submit">Добавить</button>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- end row -->

            </div> <!-- end card-box -->
        </div><!-- end col -->
    </div>
    <!-- end row -->
</div>
<div class="content">
    <script src="/admin_assets/js/bootstrap.min.js"></script>
    <script src="/admin_assets/js/moment-with-locales.min.js"></script>
    <script src="/admin_assets/js/bootstrap-datetimepicker.min.js"></script>
    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <h4 class="m-t-0 header-title">Добавление мероприятия</h4>

                <div class="row">
                    <div class="col-12">
                        <div class="p-20">
                            <form autocomplete="off"  class="form-horizontal" role="form" action="/admin/event/save" method="post" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Категория</label>
                                    <div class="col-10">
                                        <select name="category_id" class="form-control">
                                            <option selected></option>
                                            <?php foreach ($categories as $cat) { ?>
                                                <option><?= $cat->id . ' - '. $cat->name ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Место проведения</label>
                                    <div class="col-10">
                                        <select name="place_id" class="form-control">
                                            <option selected></option>
                                            <?php foreach ($places as $place) { ?>
                                                <option><?= $place->id . ' - '. $place->name ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Заголовок</label>
                                    <div class="col-10">
                                        <input name="title" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label" for="example-email">alias</label>
                                    <div class="col-10">
                                        <input name="alias" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Описание</label>
                                    <div class="col-10">
                                        <input name="content" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Дата начала</label>
                                    <div class="col-10">
                                        <input name="date_start" id="m_date_s" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Цена, руб.</label>
                                    <div class="col-10">
                                        <input name="price"  type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Количество мест</label>
                                    <div class="col-10">
                                        <input name="num_of_seats" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Ключевые слова [seo]</label>
                                    <div class="col-10">
                                        <input name="meta_keywords" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Описание [seo]</label>
                                    <div class="col-10">
                                        <input name="meta_description" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Дополнительные поля</label>
                                    <div class="col-10">
                                        <input readonly name="additional_field" type="text" class="form-control params">
                                    </div>
                                    <div class="box">
                                        <input type="text" class="form-control par_key" placeholder="Название">
                                        <input type="text" class="form-control par_val" placeholder="Описание">
                                        <button class="clear_param btn btn-primary waves-light waves-effect">Очистить</button>
                                        <button class="add_param btn btn-primary waves-light waves-effect">Добавить параметр</button>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Статус</label>
                                    <div class="col-10">
                                        <div class="checkbox checkbox-purple">
                                            <input name="status" checked id="checkbox6a" type="checkbox">
                                            <label for="checkbox6a">
                                                Active
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label" for="example-email">Изображение</label>
                                    <div class="col-10">
                                        <input name="file" type="file" multiple />
                                    </div>
                                </div>

                                <button class="btn btn-primary waves-light waves-effect" type="submit">Добавить</button>
                            </form>
                            <style>
                                form .box{
                                    padding: 15px;
                                }
                                form .box input, form .box button{
                                    margin: 5px;
                                }
                            </style>
                            <script>
                                var params = {};
                                $('.clear_param').on('click', function (e) {
                                    e.preventDefault();
                                    params = {};
                                   $('.params').val('');
                                   $('.par_key').val('');
                                   $('.par_val').val('');
                                });
                                $('.add_param').on('click', function (e) {
                                    e.preventDefault();
                                    params[$('.par_key').val()] = $('.par_val').val();
                                    $('.params').val(JSON.stringify(params));
                                    $('.par_key').val('');
                                    $('.par_val').val('');
                                });

                                $('#m_date_s').datetimepicker({
                                    format:'YYYY-MM-DD HH:mm:00',
                                    icons: {
                                        time: "fa fa-clock-o",
                                        date: "fa fa-calendar",
                                        up: "fa fa-arrow-up",
                                        down: "fa fa-arrow-down"
                                    }
                                });
                            </script>
                        </div>
                    </div>

                </div>
                <!-- end row -->

            </div> <!-- end card-box -->
        </div><!-- end col -->
    </div>
    <!-- end row -->
</div>
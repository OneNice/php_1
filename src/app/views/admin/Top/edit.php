<div class="content">
    <!-- Dropzone js -->
    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <h4 class="m-t-0 header-title">Добавление места</h4>
                <div class="row">
                    <div class="col-12">
                        <div class="p-20">
                            <form autocomplete="off"  class="form-horizontal" role="form" action="/admin/top/save" method="post" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">ID</label>
                                    <div class="col-10">
                                        <input readonly="" name="id" type="text" class="form-control" value="<?= $top->id ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Мероприятие</label>
                                    <div class="col-10">
                                        <select name="event_id" class="form-control">
                                            <option selected><?= $top->event_id ?></option>
                                            <?php foreach ($events as $event) { ?>
                                                <option><?= $event->id . ' - '. $event->title ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label" for="example-email">Изображение</label>
                                    <div class="col-10">
                                        <input name="file" type="file" multiple />
                                        <img src="/img/upload/<?= $top->image ?>" alt="" style="width: 110px">
                                    </div>
                                </div>

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
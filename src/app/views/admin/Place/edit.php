<div class="content">
    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <h4 class="m-t-0 header-title">Редактирование места</h4>
                <div class="row">
                    <div class="col-12">
                        <div class="p-20">
                            <form autocomplete="off"  class="form-horizontal" role="form" action="/admin/place/save" method="post">
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">ID</label>
                                    <div class="col-10">
                                        <input readonly="" name="id" type="text" class="form-control" value="<?= $place->id ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Название</label>
                                    <div class="col-10">
                                        <input name="name" type="text" class="form-control" value="<?= $place->name ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label" for="example-email">Город</label>
                                    <div class="col-10">
                                        <input name="city" type="text" class="form-control" value="<?= $place->city ?>">
                                    </div>
                                </div>

                                <button class="btn btn-primary waves-light waves-effect" type="submit">Сохранить</button>
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
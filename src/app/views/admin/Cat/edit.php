<div class="content">
    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <h4 class="m-t-0 header-title">Редактирование категории</h4>
                <div class="row">
                    <div class="col-12">
                        <div class="p-20">
                            <form autocomplete="off"  class="form-horizontal" role="form" action="/admin/cat/save" method="post">
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">ID</label>
                                    <div class="col-10">
                                        <input readonly="" name="id" type="text" class="form-control" value="<?= $cat->id ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Название</label>
                                    <div class="col-10">
                                        <input name="name" type="text" class="form-control" value="<?= $cat->name ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label" for="example-email">Описание</label>
                                    <div class="col-10">
                                        <input name="about" type="text" class="form-control" value="<?= $cat->about ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">alias</label>
                                    <div class="col-10">
                                        <input name="alias" type="text" class="form-control" value="<?= $cat->alias ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Ключевые слова [seo]</label>
                                    <div class="col-10">
                                        <input name="meta_keywords" type="text" class="form-control" value="<?= $cat->meta_keywords ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Описание [seo]</label>
                                    <div class="col-10">
                                        <input name="meta_description" type="text" class="form-control" value="<?= $cat->meta_description ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Родительская категория</label>
                                    <div class="col-10">
                                        <select name="parent_id" class="form-control">
                                            <option selected><?= $cat->parent_id ?></option>
                                            <?php foreach ($parentcats as $cat) { ?>
                                                <option><?= $cat->id . ' - '. $cat->name ?></option>
                                            <?php } ?>
                                        </select>
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
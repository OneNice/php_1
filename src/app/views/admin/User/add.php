<div class="content">
    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <h4 class="m-t-0 header-title">Добавление пользователя</h4>
                <div class="row">
                    <div class="col-12">
                        <div class="p-20">
                            <form autocomplete="off"  class="form-horizontal" role="form" action="/admin/user/save" method="post">
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Имя</label>
                                    <div class="col-10">
                                        <input name="name" type="text" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label" for="example-email">Логин</label>
                                    <div class="col-10">
                                        <input name="login" type="text" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">email</label>
                                    <div class="col-10">
                                        <input name="email" type="text" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Телефон</label>
                                    <div class="col-10">
                                        <input name="phone" type="text" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Новый пароль</label>
                                    <div class="col-10">
                                        <input name="password" type="password" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Роль</label>
                                    <div class="col-10">
                                        <select name="role" class="form-control">
                                            <option>user</option>
                                            <option>admin</option>
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
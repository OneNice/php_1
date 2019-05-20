<?php
 if(!isset($_SESSION['user'])){ ?>
<div class="rasp">
<div class="form">
    <h2>Регистрация</h2>
        <form class="login" action="" method="post">
            <div class="form-group">
                <input type="text" class="form-control" id="inputName" placeholder="name" name="name" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="inputName" placeholder="Логин" name="login" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="inputName" placeholder="email" name="email" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="inputName" placeholder="Телефон" data-mask="+999-99 999-99-99" name="phone" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="inputName" placeholder="Пароль" name="password" required>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Зарегистрировать">
            </div>
        </form>
</div>
</div>
     <script src="/admin_assets/plugins/bootstrap-inputmask/bootstrap-inputmask.min.js" type="text/javascript"></script>
     <script src="/js/login.js"></script>
    <?php } else redirect(PATH); ?>

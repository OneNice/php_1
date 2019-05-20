<?php if(!isset($_SESSION['user'])){ ?>
    <div class="rasp">
    <div class="form">
         <h2>Вход</h2>
        <form class="login" action="" method="post">
            <div class="form-group">
                <input type="text" class="form-control" id="inputName" placeholder="Логин" name="login" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="inputName" placeholder="Пароль" name="password" required>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Войти">
            </div>
        </form>
     </div>
    </div>
    <script src="/js/login.js"></script>
<?php } else redirect(PATH); ?>
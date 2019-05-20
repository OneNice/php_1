<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/style.css">

</head>
<body>
    <div class="rasp">
        <div class="form">
            <h2>Вход</h2>
            <form class="login" action="<?= ADMIN ?>/login" method="post">
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
</body>
</html>
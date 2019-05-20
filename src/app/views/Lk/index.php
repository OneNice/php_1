<div class="blur"></div>
<div class="lk_vote">
    <div class="lk_vote_name">title</div>
    <div class="padding">
        <div class="lk_vote_mark" >
            <div class="lk_vote_star" data="1"></div>
            <div class="lk_vote_star" data="2"></div>
            <div class="lk_vote_star" data="3"></div>
            <div class="lk_vote_star" data="4"></div>
            <div class="lk_vote_star" data="5"></div>
        </div>
        <div class="lk_vote_comment">
            <label>Напишите небольшой отзыв</label>
            <textarea name="comment"></textarea>
            <input type="submit" class="profile_btn" value="Отправить" datavote="5">
        </div>
    </div>
    <div class="error"></div>
    <div class="success"></div>
</div>
<div class="main_lk">
    <div class="sidebar_lk">
        <span>Привет, <?= $user->name ?></span>
        <ul>
            <li class="active" data="profile">Профиль</li>
            <li data="orders">Заказы</li>
            <li data="changePassword">Смена пароля</li>
            <a href="/user/logout"><li>Выйти</li></a>
        </ul>
    </div>
    <div class="content_lk">
        <div class="profile slide active">
            <h2>Личные данные</h2>
            <div class="success_info"></div>
            <div class="error_info"></div>
            <div class="block">
                <label for="">Имя:</label>
                <input type="text" name="name" value="<?= $user->name ?>">
            </div>
            <div class="block">
                <label for="">Логин:</label>
                <input type="text" name="login" value="<?= $user->login ?>">
            </div>
            <div class="block">
                <label for="">email:</label>
                <input type="text" name="email" value="<?= $user->email ?>">
            </div>
            <div class="block">
                <label for="">Телефон:</label>
                <input type="text" name="phone" value="<?= $user->phone ?>">
            </div>
            <div class="block">
                <input type="submit" class="profile_btn" value="Сохранить" data="profile">
            </div>
        </div>
        <div class="orders slide">
            <h2>Заказы</h2>
            <div class="list">

            </div>
        </div>
        <div class="changePassword slide">
            <h2>Смена пароля</h2>
            <div class="success_info"></div>
            <div class="error_info"></div>
            <div class="block">
                <label for="">Старый пароль:</label>
                <input type="password" value="" name="password">
            </div>
            <div class="block">
                <label for="">Новый:</label>
                <input type="password" value="" name="password_new">
            </div>
            <div class="block">
                <input type="submit" class="pass_btn" value="Сохранить" data="password">
            </div>
        </div>
    </div>
</div>
<script src="/js/lk.js"></script>
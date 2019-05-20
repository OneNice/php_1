<div class="blur"></div>
<div class="popUp">
    <div class="place" data="">
        <?php if(!$event->place_id) { ?>
        <div class="styled-select">
            <select class="place_select"></select>
        </div>
        <div class="styled-select">
                <select class="time_select"></select>
        </div>
        <?php } ?>
        <?php $file =  APP . '/widgets/place/layouts/' .  $event->num_of_seats . '.php';
        if(file_exists($file))
        {
            include $file;
        }
        else
        {
            include APP . '/widgets/place/layouts/' .  'default' . '.php';
        }

        ?>
    </div>
</div>
<div class="check">
    <div class="box">
        <img class="ch" src="/img/check.png">
        <div class="about">
                <h2>Заголовок</h2>
                <div class="a_date">
                    Время: <b></b>
                </div>
                <div class="a_place">
                    Место: <b></b>
                </div>
                <div class="a_row">
                    Ряд: <b></b>
                </div>
                <div class="a_seat">
                    Место: <b></b>
                </div>
                <div class="a_price">
                    Цена: <b></b> руб.
                </div>
            <div class="orderBtns">
                <a class="checkGo">Готово</a>
                <a class="checkCansel">Отмена</a>
            </div>
            <div class="success">
                <span class="success">Заказ сделан</span>
                <span class="checkCansel">Закрыть</span>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="main_item" data="<?= $event->id ?>">
        <div class="images">
            <div class="ribbon-two ribbon-two-danger price" data="<?php if(!$event->price) echo 0; else echo $event->price; ?>">
                <span>
                    <?php
                    if(!$event->price) {echo 'Бесплатно'; }
                    else {
                        echo "от {$event->price}р.";
                    }
                    ?>
                </span>
            </div>
            <div class="title_image">
                <img class="title" src="<?php if(empty($event->image_array)) echo '/img/none.png'; else echo '/img/upload/' . $event->image_array; ?>" alt="">
                <?php
                $votes = R::findAll('votes', 'event_id = ?', [$event->id]);
                if($votes) {
                    $score = 0;
                    $count = count($votes);
                    foreach ($votes as $vote) {
                        $score += $vote->score;
                    }
                    ?>
                    <div class="vote" data="<?= round($score/$count,1) ?>">
                        <div class="vote_line"></div>
                        <div class="vote_mark"><?= round($score/$count,1)  ?></div>
                    </div>
                    <?php
                } else{
                    ?>
                    <div class="vote" data="5">
                        <div class="vote_line"></div>
                        <div class="vote_mark">5</div>
                    </div>
                <?php } ?>
            </div>
            <input class="goOrd" type="button" value="Заказать">

        </div>

        <div class="pud">

        </div>
        <div class="about">
            <h1> <?= $event->title ?></h1>
            <div class="category flex">
                <?php
                if($event->category->parent_id !== null)
                {
                    $result = R::load('category', $event->category->parent_id);
                    ?>
                    <div class="category_item c_a_l  cat_first"><a href="/cat/<?= $result->alias ?>">  <?= $result->name; ?></a> </div>
                    <div class="category_item "> <a href="/cat/<?= $result->alias . '/' . $event->category->alias ?>"> <?= $event->category->name; ?></a> </div>
                    <?php
                }
                else { ?> <div class="category_item cat_first"> <a href="/cat/<?= $event->category->alias ?>"> <?= $event->category->name; ?></a> </div>  <?php }
                ?>
            </div>
            <div class="content"><?= $event->content ?></div>
            <div class="param">
                <?php if($event->additional_field) {
                    foreach (json_decode($event->additional_field) as $k => $v) { ?>
                    <div><b><?= $k ?>: </b><span><?= $v ?></span></div>
                <?php }} ?>
            </div>
            <?php if($event->place_id) { ?>
            <div class="param" style="margin-top: 20px">
                <div><b>Место: </b><span class="place"><?= $event->place->name ?></span></div>
                <div><b>Время: </b><span class="date"><?= $event->date_start ?></span></div>
            </div>
            <?php } ?>

        </div>
    </div>
    <div class="votes">
        <h3>Рецензии:</h3>
        <?php
            foreach ($votes as $vote){
                ?>
                <article>
                    <div class="name">
                        <?php
                        for($i=0; $i < $vote->score; $i++)
                        {
                            ?>
                                <span class="lk_vote_star"></span>
                            <?php
                        }
                        ?>
                        <i><?= $vote->user->name ?></i>
                    </div>
                    <div class="comment"><?= $vote->comment ?></div>
                </article>
                <?php
            }
        ?>
    </div>
</div>
<script>
    $(window).on('load', function () {
        $('body>.content').css('min-height', ($(window).outerHeight() - $('header').outerHeight() - $('nav').outerHeight() - $('footer').outerHeight()));
    });
    var places_and_times = <?= $times_array ?>, //Возможные места и время
        seats_and_times = <?= isset($event->booked_seats) ? $event->booked_seats : '{}' ?>;  //Заказанные места
    //console.log(places_and_times, seats_and_times);
</script>
<script src="/js/votes.js"></script>
<script src="/js/event.js"></script>
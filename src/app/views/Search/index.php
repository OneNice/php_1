<div class="content">
    <div class="main">
        <div class="list flex flex-wrap">
            <?php foreach ($events as $event ) {?>
                <article class="<?php if(!$event->price) echo 'free';?>">
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
                    <div class="cont">
                        <div class="img">
                            <a href="/event/<?= $event->alias ?>"><img src="<?php if(empty($event->image_array)) echo '/img/none.png'; else echo '/img/upload/' . $event->image_array; ?>" alt="">
                                <div class="category flex">
                                    <?php
                                    if($event->category->parent_id !== null)
                                    {
                                        $result = R::load('category', $event->category->parent_id);
                                        ?>
                                        <div class="category_item c_a_l cat_first"><a href="/cat/<?= $result->alias ?>">  <?= $result->name; ?></a> </div>
                                        <div class="category_item"> <a href="/cat/<?= $result->alias . '/' . $event->category->alias ?>"> <?= $event->category->name; ?></a> </div>
                                        <?php
                                    }
                                    else { ?> <div class="category_item cat_first"> <a href="/cat/<?= $event->category->alias ?>"> <?= $event->category->name; ?></a> </div>  <?php }
                                    ?>
                                </div></a>
                        </div>
                        <div class="about">
                            <h3><a href="event/<?= $event->alias ?>"><?= $event->title ?></a></h3>
                            <div class="box flex">
                                <div class="geo flex">
                                    <?php if($event->place_id) {echo "<img src='/img/geo.png'><span>" . $event->place->name . '</span>'; } ?>
                                </div>
                                <div class="order">
                                    <?php
                                    if(!$event->price) {echo 'Бесплатно'; }
                                    else {
                                        echo "от {$event->price}р.";
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="add flex">
                        <div class="add_free">Бесплатно</div>
                        <div class="add_new">Новинка</div>
                    </div>
                    <div class="score">

                    </div>
                </article>
            <?php }  echo  $pagination->__toString();?>

        </div>
        <div class="sidebar">

        </div>
    </div>
</div>
<script src="/js/votes.js"></script>
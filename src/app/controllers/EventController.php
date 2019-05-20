<?php
/**
 * Created by PhpStorm.
 * User: onela
 * Date: 27.02.2019
 * Time: 20:32
 */

namespace app\controllers;


use RedBeanPHP\R;

class EventController extends AppController
{
    public function viewAction(){
        //debug($this->route);
        $alias = $this->route['alias'];
        $event = R::findOne('event', "alias = ? AND status = '1'", [$alias]);
        if(!$event)
        {
            throw new \Exception('Страница не найдена', 404);
        }

        $times = []; $votes = [];
        if(!$event->place_id)
        {
            $times = R::findAll('eventtimes', 'event_id = ?', [$event->id]);
        }
        $votes = R::findAll('votes', 'event_id = ? ', [$event->id]);
        $times_array = '{';
        foreach ($times as $val) {
            $times_array .= '"' . $val->place->name . '": [' . $val->date_array . ',' . $val->place_id . '  ],';
        }
        $times_array .= '}';

        $this->setMeta($event->title, $event->meta_description, $event->meta_keywords);
        $this->set(compact('event', 'times_array', 'votes'));
    }
}
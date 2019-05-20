<?php
/**
 * Created by PhpStorm.
 * User: onela
 * Date: 24.03.2019
 * Time: 12:25
 */

namespace app\controllers\admin;


use RedBeanPHP\R;
class CatController extends AppController
{
    public function indexAction(){
        $categories = R::findAll('category');

        $this->set(compact('categories'));
    }



    public function addAction(){
        $parentcats = R::findAll('category', 'parent_id is null');

        $this->set(compact('parentcats'));
    }



    public function editAction(){
        if(!empty($_POST)){
            $id = is_numeric($_POST['id']) ? $_POST['id'] : null;
            if($id){
                $cat = R::findOne('category', 'id = ?', [$id]);
                $parentcats = R::findAll('category', 'parent_id is null');
                $this->set(compact('cat', 'parentcats'));
            }
            else {  $_SESSION['errors'] = 'Эй, что ты творишь!';redirect('/admin/cat'); }
        }
        else {  $_SESSION['errors'] = 'Эй, что ты творишь!';redirect('/admin/cat'); }
    }


    public function saveAction(){
        if(!empty($_POST)){
            if(isset($_POST['id']) && is_numeric($_POST['id'])){
                $category = R::findOne('category', 'id = ?', [$_POST['id']]);
            }
            else {
                $category = R::dispense('category');
            }
            $category->name = $_POST['name'];
            $category->alias = $_POST['alias'];
            $category->about = $_POST['about'];
            $category->meta_keywords = $_POST['meta_keywords'];
            $category->meta_description = $_POST['meta_description'];
            $category->parent_id = (int)$_POST['parent_id'];

            if(R::store($category))
            {
                $_SESSION['success'] = 'Успешно сохранили!';
                redirect('/admin/cat');
            }
            else{
                $_SESSION['errors'] = 'Ошибочка вышла';
                redirect('/admin/cat/add');
            }
        }
        $_SESSION['errors'] = 'Эй, что ты творишь!';
        redirect('/admin/cat');
    }


    public function delAction(){
        if(!empty($_POST['id'])){

            $id = is_numeric($_POST['id']) ? $_POST['id'] : null;
            if($id){
                $cat = R::findOne('category', 'id = ?', [$id]);
                R::trash( $cat);
                $_SESSION['success'] = 'Успешно сохранили!';
                redirect('/admin/cat');
            }
            $_SESSION['errors'] = 'Ошибочка вышла';
            redirect('/admin/cat');
        }
        redirect();
    }
}
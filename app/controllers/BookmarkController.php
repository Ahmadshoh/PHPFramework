<?php

namespace app\controllers;


use app\models\Bookmark;

class BookmarkController extends AppController
{
    public function indexAction() {
        if(empty($_SESSION['bookmark'])) {
            $_SESSION['error'] = "Ваша закладка пусто! Попробуйте добавить товар в закладку!";
        }
        $this->setMeta("Закладки");
    }

    public function addToBookmarkAction() {
        $id = !empty($_GET['id']) ? (int)$_GET['id'] : null;

        if($id){
            $product = \R::findOne('product', 'id = ?', [$id]);
            if(!$product){
                return false;
            }
        }

        if(isset($_SESSION['bookmark'][$id])){
            $_SESSION['error'] = "Товар уже существуеть в закладки!";
        }else{
            $_SESSION['bookmark'][$id] = [
                'title' => $product->title,
                'alias' => $product->alias,
                'price' => $product->price,
                'image' => $product->image
            ];
        }

        if($this->isAjax()){
            $this->loadView('bookmark_modal');
        }

        redirect();
    }

    public function clearAction(){
        unset($_SESSION['bookmark']);
        $_SESSION['success'] = "Вы успешно очистили закладку!";
        redirect(PATH);
    }

    public function removeFromBookmarkAction() {
        $id = isset($_GET['id']) ? intval($_GET['id']) : null;
        if(!$id) return false;

        if(!isset($_SESSION["bookmark"][$id])) {
            $_SESSION['error'] = 'Такой товар не существуеть в закладки!';
        } else {
            unset($_SESSION['bookmark'][$id]);
            $_SESSION['success'] = "Товар успешно удалён из закладки!";
        }
        redirect();
    }
}
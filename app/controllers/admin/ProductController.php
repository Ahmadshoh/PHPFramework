<?php

namespace app\controllers\admin;

use app\models\admin\Product;
use app\models\AppModel;
use app\widgets\character\Character;
use shop\App;
use shop\base\View;

class ProductController extends AppController
{
    public function indexAction() {
        $products = \R::getAll("SELECT product.*, category.name AS cat FROM product JOIN category ON category.id = product.category_id ORDER BY product.title");
        $this->setMeta('Список товаров');
        $this->set(compact('products'));
    }

    public function addAction() {
        if(!empty($_POST)){

            $title = $_POST['title'];

            $img_name = str_replace(" " ,"_", $title);
            $img_name = str_replace("/" ,"_", $img_name);
            $img_name = strtolower($img_name);
            $tmp_name = $_FILES['image']['tmp_name'];
            $path = WWW . "/img/products/" . $img_name . ".png";
            $image = "public/img/products/" . $img_name . ".png";
            move_uploaded_file($tmp_name, $path);

            $product = new Product();
            $data = $_POST;
            $product->load($data);
            $product->attributes['visible'] = $product->attributes['visible'] ? '1' : '0';
            $product->attributes['recommended'] = $product->attributes['recommended'] ? '1' : '0';

            if(!$product->validate($data)){
                $product->getErrors();
                $_SESSION['form_data'] = $data;
                redirect();
            }

            if($id = $product->save('product')){
//                $product->saveGallery($id);
                $alias = AppModel::createAlias('product', 'alias', $data['title'], $id);
                $p = \R::load('product', $id);
                $p->alias = $alias;
                $p->image = $image;
                \R::store($p);
                $_SESSION['success'] = 'Товар добавлен';
            }
            redirect();
        }

        $this->setMeta('Новый товар');
    }

    public function editAction() {
        $id = $this->getRequestID();
        $characters = \R::getAll("SELECT * FROM characters");
        $product_character = \R::getAll("SELECT * FROM product_character WHERE product_id = ?", [$id]);
        $characters_group = \R::getAll("SELECT * FROM characters_group");


        foreach ($characters_group as $id => $group) {
            $groups[$group['title']] = array();
        }

        foreach ($characters as $id => $items) {
            foreach ($product_character as $id => $values) {
                if ($values['character_id'] == $items['id']) {
                    $items['value'] = $values['value'];
                }
            }

            foreach ($characters_group as $id => $group) {
                if ($group['id'] == $items['characters_group_id']){
                    array_push($groups[$group['title']], $items);
                }
            }
        }

        foreach ($groups as $group => $items) {
            if (empty($groups[$group])) {
                unset($groups[$group]);
            }
        }

        if(!empty($_POST)){
            $id = $this->getRequestID(false);
            $product = new Product();
            $data = $_POST;
            $product->load($data);
            $product->attributes['visible'] = $product->attributes['visible'] ? '1' : '0';
            $product->attributes['recommended'] = $product->attributes['recommended'] ? '1' : '0';

            if(!$product->validate($data)){
                $product->getErrors();
                redirect();
            }

            if($product->update('product', $id)){
                $alias = AppModel::createAlias('product', 'alias', $data['title'], $id);
                $product = \R::load('product', $id);

                if(!empty($_FILES['image'])) {
                    $title = $_POST['title'];

                    $img_name = str_replace(" " ,"_", $title);
                    $img_name = str_replace("/" ,"_", $img_name);
                    $img_name = strtolower($img_name);
                    $tmp_name = $_FILES['image']['tmp_name'];
                    $path = WWW . "/img/products/" . $img_name . ".png";
                    $image = "public/img/products/" . $img_name . ".png";
                    move_uploaded_file($tmp_name, $path);
                } else {
                    $title = $_POST['title'];

                    $img_name = str_replace(" " ,"_", $title);
                    $img_name = str_replace("/" ,"_", $img_name);
                    $img_name = strtolower($img_name);
                    $image = "public/img/products/" . $img_name . ".png";
                }

                $product->alias = $alias;
                $product->image = $image;
                \R::store($product);
                $_SESSION['success'] = 'Изменения сохранены';
                redirect();
            }
        }

        $id = $this->getRequestID();
        $product = \R::load('product', $id);
        App::$app->setProperty('parent_id', $product->category_id);
        $this->setMeta("Редактирование товара {$product->title}");
        $this->set(compact('product', 'groups'));
    }

    public function addCharacterAction() {
        if(!empty($_POST)){
            $id = $this->getRequestID(false);

            $data = $_POST;

            foreach ($data as $character_id => $items) {
                if ($character_id = 'id') {
                    unset($data[$character_id]);
                }
            }

            foreach ($data as $character_id => $value) {
                $character = \R::findOne('product_character', 'product_id = ? AND character_id = ?', [$id, $character_id]);
                if($character){
                    if(empty($value)) {
                        \R::exec("DELETE FROM `product_character` WHERE `id` = ?", [$character->id]);
                    } else {
                        \R::exec("UPDATE `product_character` SET `value`= ? WHERE `id` = ?", [$value, $character->id]);
                    }
                } else {
                    if (empty($value)) {
                        continue;
                    }
                    \R::exec("INSERT INTO `product_character`(`product_id`, `character_id`, `value`) VALUES (?, ?, ?)", [$id, $character_id, $value]);
                }
            }

            $_SESSION['success'] = 'Изменения сохранены';
            redirect();
        }
    }

    public function deleteAction() {
        $id = $this->getRequestID();
        $product = \R::load('product', $id);
        \R::trash($product);
        $_SESSION['success'] = 'Продукт удален';
        redirect(ADMIN . '/product');
    }
}
<?php

namespace app\controllers\admin;

class SliderController extends AppController
{
    public function indexAction() {
        $images = \R::findAll('slider');
        $this->set(compact('images'));
        $this->setMeta("Слайдер сайта");
    }

    public function addAction() {
        if(!empty($_FILES['image'])) {
            debug($_FILES);
            $tmp_name = $_FILES['image']['tmp_name'];
            $path = WWW . "/img/slider/" . $_FILES['image']['name'];
            $image = "img/slider/" . $_FILES['image']['name'];
            move_uploaded_file($tmp_name, $path);

            \R::exec("INSERT INTO `slider`(`img_path`) VALUES (?)", [$image]);
            $_SESSION['success'] = 'Изменения сохранены';
            redirect();
        }
    }

    public function deleteAction() {
        if(!empty($_GET)) {
            $id = $this->getRequestID();
            $slider = \R::load('slider', $id);
            \R::trash($slider);
            $_SESSION['success'] = 'Изображение удален';
            redirect(ADMIN . '/slider');
        }
    }
}
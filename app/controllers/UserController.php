<?php

namespace app\controllers;

use app\models\User;

class UserController extends AppController
{

    public function signupAction() {
        if(!empty($_POST)) {
            $user = new User();
            $data = $_POST;
            $user->load($data);
            if(!$user->validate($data) || !$user->checkUnique()) {
                $user->getErrors();
                $_SESSION['form_data'] = $data;
            } else {
                $user->attributes['password'] = password_hash($user->attributes['password'], PASSWORD_DEFAULT);
                if($user->save('users')) {
                    $_SESSION['success'] = 'Пользователь успешно зарегистрирован!';
                    if(empty($_SESSION['user'])) $this->loginAction();
                } else {
                    $_SESSION['error'] = 'Ошибка';
                }
            }
            redirect();
        }
        $this->setMeta("Регистрация");
    }

    public function loginAction() {
        if(!empty($_POST)) {
            $user = new User();
            if($user->login()) {
                unset($_SESSION['error']);
                $_SESSION['success'] = "Вы успешно авторизованы!";
            } else {
                $_SESSION['error'] = "Логин/пароль введены неверно!";
            }
            redirect();
        }
        $this->setMeta("Авторизация");
    }

    public function logoutAction() {
        if(isset($_SESSION['user'])) unset($_SESSION['user']);
        redirect();
    }

    public function ordersAction() {
        if(isset($_SESSION['user'])) {
            $user_id = $_SESSION['user']['id'];
        } else {
            $_SESSION['error'] = "Вы не авторизованы!";
            return false;
        }

        $orders = \R::getAll("SELECT `orders`.`id`, `orders`.`status`, `orders`.`date`, SUM(`order_product`.`total_price`) AS `sum`, SUM(`order_product`.`qty`) AS `qty` FROM `orders`
JOIN `order_product` ON `orders`.`id` = `order_product`.`order_id`
JOIN `product` ON `order_product`.`product_id` = `product`.`id`
WHERE `orders`.`user_id` = ?
GROUP BY `orders`.`id` ORDER BY `orders`.`status`, `orders`.`id`", [$user_id]);
        $this->set(compact('orders'));
    }

    public function profileAction() {
        if(empty($_SESSION['user'])) {
            $_SESSION['error'] = "Вы не авторизованы!";
            redirect(PATH);
        }

        if(!empty($_POST)){
            $id = $_SESSION['user']['id'];
            $user = new User();
            $data = $_POST;
            $user->load($data);
            if(!$user->attributes['password']){
                unset($user->attributes['password']);
            }else{
                $user->attributes['password'] = password_hash($user->attributes['password'], PASSWORD_DEFAULT);
            }
            if(!$user->validate($data) || !$user->checkUnique()){
                $user->getErrors();
//                redirect();
            }
            if($user->update('users', $id)){
                $_SESSION['success'] = 'Изменения сохранены';
                $this->loginAction();
            }
            redirect();
        }

        $this->setMeta("Учетная запись");
    }
}
<?php

namespace app\controllers\admin;

use app\models\admin\User;

class UserController extends AppController
{

    public function indexAction() {
        $users = \R::findAll('users');
        $this->set(compact('users'));
        $this->setMeta("Пользователи");
    }

    public function loginAdminAction(){
        if(!empty($_POST)){
            $user = new User();
            if(!$user->login(true)){
                $_SESSION['error'] = 'Логин/пароль введены неверно';
            }
            if(User::isAdmin()){
                redirect(ADMIN);
            }else{
                redirect();
            }
        }
        $this->layout = 'login';
    }

    public function addAction() {
        $this->setMeta("Добавить пользователья");
    }

    public function deleteAction() {
        $user_id = $this->getRequestID();
        $user = \R::load('users', $user_id);
        \R::trash($user);
        $_SESSION['success'] = 'Пользователь удален';
        redirect(ADMIN . '/user');
    }

    public function editAction() {
        if(!empty($_POST)){
            $id = $this->getRequestID(false);
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
                redirect();
            }
            if($user->update('users', $id)){
                $_SESSION['success'] = 'Изменения сохранены';
            }
            redirect();
        }

        $user_id = $this->getRequestID();
        $user = \R::load('users', $user_id);

        $orders = \R::getAll("SELECT `orders`.`id`, `orders`.`status`, `orders`.`date`, SUM(`order_product`.`total_price`) AS `sum`, SUM(`order_product`.`qty`) AS `qty` FROM `orders`
JOIN `order_product` ON `orders`.`id` = `order_product`.`order_id`
JOIN `product` ON `order_product`.`product_id` = `product`.`id`
WHERE `orders`.`user_id` = ?
GROUP BY `orders`.`id` ORDER BY `orders`.`status`, `orders`.`id`", [$user_id]);

        $this->setMeta('Редактирование профиля пользователя');
        $this->set(compact('user', 'orders'));
    }
}
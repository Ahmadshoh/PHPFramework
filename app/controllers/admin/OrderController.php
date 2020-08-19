<?php

namespace app\controllers\admin;


class OrderController extends AppController
{
    public function indexAction() {
        $orders = \R::getAll("SELECT `orders`.`id`, `orders`.`user_id`, `orders`.`status`, `orders`.`date`,
SUM(`order_product`.`total_price`) AS `sum`, SUM(`order_product`.`qty`) AS `qty`,
`users`.`name`, `users`.`phone` FROM `orders`
JOIN `order_product` ON `orders`.`id` = `order_product`.`order_id`
JOIN `product` ON `order_product`.`product_id` = `product`.`id`
JOIN `users` ON `orders`.`user_id` = `users`.`id`
GROUP BY `orders`.`id` ORDER BY `orders`.`status`, `orders`.`id`");

        $this->setMeta('Список заказов');
        $this->set(compact('orders'));
    }

    public function viewAction() {
        $order_id = $this->getRequestID();

        $order = \R::getRow("SELECT `orders`.*, SUM(`order_product`.`total_price`) AS `sum`, SUM(`order_product`.`qty`) AS `qty`,
`users`.`name`, `users`.`phone` FROM `orders`
JOIN `order_product` ON `orders`.`id` = `order_product`.`order_id`
JOIN `product` ON `order_product`.`product_id` = `product`.`id`
JOIN `users` ON `orders`.`user_id` = `users`.`id`
WHERE `orders`.`id` = ?
GROUP BY `orders`.`id` ORDER BY `orders`.`status`, `orders`.`id`", [$order_id]);

        if(!$order){
            throw new \Exception('Страница не найдена', 404);
        }
        $order_products = \R::findAll('order_product', "order_id = ?", [$order_id]);
        $this->setMeta("Заказ №{$order_id}");
        $this->set(compact('order', 'order_products'));
    }

    public function changeAction(){
        $order_id = $this->getRequestID();
        $status = !empty($_GET['status']) ? $_GET['status'] : 'Принять в обработку';
        $order = \R::load('orders', $order_id);
        if(!$order){
            throw new \Exception('Страница не найдена', 404);
        }
        $order->status = $status;
//        $order->update_at = date("Y-m-d H:i:s");
        \R::store($order);
        $_SESSION['success'] = 'Изменения сохранены';
        redirect();
    }

    public function deleteAction() {
        $id = $this->getRequestID();
        $order = \R::load('orders', $id);
        \R::trash($order);
        $_SESSION['success'] = 'Заказ удален';
        redirect(ADMIN . '/order');
    }

}
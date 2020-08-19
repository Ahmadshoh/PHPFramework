<?php

namespace app\controllers\admin;

class MainController extends AppController
{
    public function indexAction() {
        $productsCount = \R::count('product');
        $ordersCount = \R::count('orders');
        $usersCount = \R::count('users');

//        $orders = array();
//
//        $items = \R::getAssoc('SELECT * FROM orders ORDER BY id DESC');
//        $products = \R::getAssoc('SELECT * FROM product');
//        foreach ($items as $id => $order) {
//            $order['product'] = array();
//            foreach ($products as $key => $product) {
//                if($order['item_id'] == $key) {
//                    $order['product'] = $product;
//                    $orders[$id] = $order;
//                }
//            }
//        }
        $this->setMeta("Панель управления");
        $this->set(compact('productsCount', 'ordersCount', 'usersCount'));
    }
}
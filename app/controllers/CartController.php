<?php

namespace app\controllers;

use app\models\Cart;
use app\models\Order;
class CartController extends AppController
{
    public function indexAction() {
        if(empty($_SESSION['cart'])) {
            $_SESSION['error'] = "Ваша коризна пусто! Попробуйте добавить товар в корзину!";
        }
        $this->setMeta("Корзина");
    }

    public function addToCartAction() {
        $id = !empty($_GET['id']) ? (int)$_GET['id'] : null;
        $qty = !empty($_GET['qty']) ? (int)$_GET['qty'] : null;

        if($id){
            $product = \R::findOne('product', 'id = ?', [$id]);
            if(!$product){
                return false;
            }
        }

        $cart = new Cart();
        $cart->addToCart($product, $qty);

        if($this->isAjax()){
            $this->loadView('cart_modal');
        }

        redirect();
    }

    public function removeFromCartAction() {
        $id = !empty($_GET['id']) ? $_GET['id'] : null;

        if(isset($_SESSION['cart'][$id])){
            $cart = new Cart();
            $cart->deleteItem($id);
        }
        redirect();
    }

    public function clearAction(){
        unset($_SESSION['cart']);
        unset($_SESSION['cart.qty']);
        unset($_SESSION['cart.sum']);
        $_SESSION['success'] = "Вы успешно очистили вашу корзину!";
        redirect(PATH);
    }

    public function orderAction() {

        if(!empty($_POST)){
            $data = $_POST;
            $data['user_id'] = $_SESSION['user']['id'];

            $order_id = Order::saveOrder($data);
//            Order::sendToTelegram($data);

            $user_email = isset($_SESSION['user']['email']) ? $_SESSION['user']['email'] : $_POST['email'];
            Order::mailOrder($order_id, $user_email);
        }

        redirect(PATH);
    }
}
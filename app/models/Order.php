<?php

namespace app\models;

use shop\App;
use Swift_Mailer;
use Swift_Message;

class Order extends AppModel {

    public static function saveOrder($data){
        $order = \R::dispense('orders');
        $order->user_id = $data['user_id'];
        $order->comment = $data['comment'];
        $order->buying_type = $data['buying_type'];
        $order_id = \R::store($order);
        self::saveOrderProduct($order_id);
        return $order_id;
    }

    public static function saveOrderProduct($order_id){
        $sql_part = '';
        foreach($_SESSION['cart'] as $product_id => $product){
            $product_id = (int)$product_id;
            $sql_part .= "($order_id, $product_id, {$product['qty']}, '{$product['title']}', {$product['price']}, {$product['sum']}),";
        }
        $sql_part = rtrim($sql_part, ',');
        \R::exec("INSERT INTO order_product (order_id, product_id, qty, title, price, total_price) VALUES $sql_part");
    }

    public static function sendToTelegram($data) {

        $token = "528348308:AAGgCbTj4g5bTku8vGQ4Adt74U-Kr7qLFXI";
        $chat_id = "-278992946";

        $message = "Поступил заказ от <b>" . $_SESSION['user']['name'] . "</b>%0A%0A";
        $message .= "Номер покупателя: <b>" . $_SESSION['user']['phone'] . "</b>%0A";
        $message .= "Email покупателя: <b>" . $_SESSION['user']['email'] . "</b>%0A";
        $message .= "Тип покупки: <b>" . $data['buying_type'] . "</b>%0A%0A%0A";

        foreach ($_SESSION['cart'] as $id => $item) {
            $message .= "Товар: " . "<b>" . $item['title'] . "</b>" . "%0A";
            $message .= "Количество: " . "<b>" . $item['qty'] . "</b>" . "%0A";
            $message .= "Цена товара: " . "<b>" . $item['price'] . "</b>" . "%0A";
            $message .= "Общая цена товара: " . "<b>" . $item['sum'] . "</b>" . "%0A";
            $message .= "Комментарии: " . "<b>" . $data['comment'] . "</b>" . "%0A" . "%0A" . "%0A";
        }

        $sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$message}","r");

        if ($sendToTelegram) {
            unset($_SESSION['cart']);
            unset($_SESSION['cart.qty']);
            unset($_SESSION['cart.sum']);
            $_SESSION['success'] = 'Спасибо за Ваш заказ. В ближайшее время с Вами свяжется менеджер для согласования заказа';
        } else {
            $_SESSION['error'] = "Заказ не отправлен. Пожалуйста попробуйте позже!";
        }
    }

    public static function mailOrder($order_id, $user_email){
        // Create the Transport
//        $transport = (new \Swift_SmtpTransport(App::$app->getProperty('smtp_host'), App::$app->getProperty('smtp_port'), App::$app->getProperty('smtp_protocol')))
//            ->setUsername(App::$app->getProperty('smtp_login'))
//            ->setPassword(App::$app->getProperty('smtp_password'))
//        ;
        // Create the Mailer using your created Transport
//        $mailer = new Swift_Mailer($transport);

        // Create a message
        ob_start();
        require APP . '/views/mail/mail_order.php';
        $body = ob_get_clean();

//        debug($body);

//        $message_client = (new Swift_Message("Вы совершили заказ №{$order_id} на сайте " . App::$app->getProperty('shop_name')))
//            ->setFrom([App::$app->getProperty('smtp_login') => App::$app->getProperty('shop_name')])
//            ->setTo($user_email)
//            ->setBody($body, 'text/html')
//        ;

//        $message_admin = (new Swift_Message("Сделан заказ №{$order_id}"))
//            ->setFrom([App::$app->getProperty('smtp_login') => App::$app->getProperty('shop_name')])
//            ->setTo(App::$app->getProperty('admin_email'))
//            ->setBody($body, 'text/html')
//        ;

        // Send the message
//        $result = $mailer->send($message_client);
//        $result = $mailer->send($message_admin);
//        unset($_SESSION['cart']);
//        unset($_SESSION['cart.qty']);
//        unset($_SESSION['cart.sum']);
//        $_SESSION['success'] = 'Спасибо за Ваш заказ. В ближайшее время с Вами свяжется менеджер для согласования заказа';

        $message = "This is my first message!";
        $to = "ahmadshohnasrulloev1@gmail.com";
        $subject = "Title of message";

//        echo $body;
        mail($to, $subject, $message);
    }
}
<?php

namespace app\controllers;


use app\models\AppModel;
use shop\App;
use shop\base\Controller;

class AppController extends Controller
{
    public function __construct($route)
    {
        parent::__construct($route);
        new AppModel();

        if(isset($_SESSION['cart'])) {
            $cartCount = count($_SESSION['cart']);
        } else {
            $cartCount = 0;
        }

        App::$app->setProperty('cartCount', $cartCount);
        App::$app->setProperty('category', $_SESSION['category']);
    }
}
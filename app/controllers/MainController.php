<?php

namespace app\controllers;

class MainController extends AppController
{
    public function indexAction() {
        $sliders = \R::findAll('slider');
        $recommendedProducts = \R::findAll('product', 'recommended=1 AND visible = 1');
        $products = \R::findAll('product', 'visible = 1 ORDER BY id DESC LIMIT 9');
        $this->set(compact('sliders', 'recommendedProducts', 'products'));
        $this->setMeta('Android', 'Android is a mobile shop in Tajikistan', 'shop, android, mobile');
    }
}
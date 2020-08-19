<?php

namespace app\controllers;

class SearchController extends AppController
{
    public function indexAction() {
        $query = !empty($_GET['query']) ? strtolower($_GET['query']) : redirect();

        $products = array();

        $search = \R::getAssoc('SELECT * FROM product WHERE visible=1');
        foreach ($search as $key => $product) {
            if(preg_match("#{$query}#i", strtolower($product['title']))) {
                $products[$key] = $product;
            } else {
                continue;
            }   
        }

        $this->set(compact('products'));
    }
}
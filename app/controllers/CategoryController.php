<?php

namespace app\controllers;

class CategoryController extends AppController
{
    public function viewAction() {
        $alias = $this->route['alias'];
        $category = \R::findOne('category', 'alias = ?', [$alias]);
        $products = \R::findAll('product', 'category_id = ?', [$category['id']]);
        if(!$products) {
            $_SESSION['error'] = "Категория {$category['name']} не содержить ни одного товара!";
        }
        $this->set(compact('products', 'category'));
        $this->setMeta($category['name']);
    }
}
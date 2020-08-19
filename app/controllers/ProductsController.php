<?php

namespace app\controllers;

class ProductsController extends AppController
{
    public function indexAction() {
        $products = \R::findAll('product', 'visible = 1 ORDER BY id DESC LIMIT 9');
        $this->set(compact('sliders', 'recommendedProducts', 'products'));
        $this->setMeta('Android', 'This is a mobile shop', 'shop, android, mobile');
    }

    public function viewAction() {
        $alias = $this->route['alias'];
        $product = \R::findOne('product', 'alias=? AND visible=1', [$alias]);
        if(!$product) {
            throw new \Exception("Страница не найдено!", 404);
        }

        $data = \R::getAll("
SELECT `product_character`.`id`,`product_character`.`value`, `characters`.`title` as `charc_title`, `characters_group`.`title` as `group`, `product`.`alias`
FROM `product_character`
JOIN `characters` ON `characters`.`id` = `product_character`.`character_id`
JOIN `characters_group` ON `characters`.`characters_group_id` = `characters_group`.`id`
JOIN `product` ON `product_character`.`product_id` = `product`.`id`
WHERE `product_character`.`product_id` = {$product->id}
");

        $groups = array();
        foreach ($data as $id => $value){
            array_push($groups, $value["group"]);
        }

        $groups = array_unique($groups);

        foreach ($groups as $id => $item) {
            $groups[$item] = array();
            unset($groups[$id]);
            foreach ($data as $id => $value){
                if ($value["group"] === $item) {
                    unset($value["group"]);
                    unset($value["characters_group_id"]);
                    array_push($groups[$item], $value);
                }
            }
        }

        $this->set(compact('product', 'groups'));
        $this->setMeta($product['title'], 'This is a mobile shop', 'shop, android, mobile');
    }
}
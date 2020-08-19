<?php

namespace app\models;
use ishop\App;

class Category extends AppModel {

    public $attributes = [
        'name' => '',
        'parent_id' => '',
        'alias' => '',
    ];

    public $rules = [
        'required' => [
            ['name'],
        ]
    ];

    public function getIds($id){
        $cats = \shop\App::$app->getProperty('cats');
        $ids = null;
        foreach($cats as $k => $v){
            if($v['parent_id'] == $id){
                $ids .= $k . ',';
                $ids .= $this->getIds($k);
            }
        }
        return $ids;
    }
}
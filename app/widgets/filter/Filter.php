<?php

namespace app\widgets\filter;

class Filter{

    public $groups;
    public $attrs;
    public $tpl;
    public $filter;

    public function __construct($filter = null, $tpl = ''){
        $this->filter = $filter;
        $this->tpl = $tpl ?: __DIR__ . '/filter_tpl.php';
        $this->run();
    }

    protected function run(){

        $this->groups = $this->getGroups();
        $this->attrs = self::getAttrs();

        $filters = $this->getHtml();
        echo $filters;
    }

    protected function getHtml(){
        ob_start();
        $filter = self::getFilter();
        if(!empty($filter)){
            $filter = explode(',', $filter);
        }
        require $this->tpl;
        return ob_get_clean();
    }

    protected function getGroups(){
        return \R::getAssoc('SELECT id, title FROM characters_group');
    }

    protected static function getAttrs(){
        $data = \R::getAssoc('SELECT * FROM characters');
//        debug($data);
        $attrs = [];
        foreach($data as $k => $v){
            $attrs[$v['characters_group_id']][$k] = $v['title'];
        }
        return $attrs;
    }

    public static function getFilter(){
        $filter = null;
        if(!empty($_GET['filter'])){
            $filter = preg_replace("#[^\d,]+#", '', $_GET['filter']);
            $filter = trim($filter, ',');
        }
        return $filter;
    }

    public static function getCountGroups($filter){
        $filters = explode(',', $filter);
        $attrs = self::getAttrs();
        $data = [];
        foreach($attrs as $key => $item){
            foreach($item as $k => $v){
                if(in_array($k, $filters)){
                    $data[] = $key;
                    break;
                }
            }
        }
        return count($data);
    }

}
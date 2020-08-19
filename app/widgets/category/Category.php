<?php

namespace app\widgets\category;

use shop\App;

class Category
{
    protected $data;
    protected $categoryHtml;
    protected $tpl;
    protected $table = 'category';
    protected $prepend = '';
    protected $tree;
    protected $container = 'ul';
    protected $class = '';
    protected $attrs = [];

    public function __construct($options = [])
    {
        $this->tpl = __DIR__ . '/category_tpl/category.php';
        $this->getOptions($options);
        $this->run();
    }

    protected function getOptions($options) {
        foreach ($options as $k => $v) {
            if(property_exists($this, $k)) {
                $this->$k = $v;
            }
        }
    }

    protected function run() {
        $this->data = $cats = \R::getAssoc("SELECT * FROM {$this->table}");

        $_SESSION['category'] = $cats;

        $this->tree = $this->getTree();
        $this->categoryHtml = $this->getCategoryHtml($this->tree);

        $this->output();
    }

    protected function output() {
        $attrs = '';
        if(!empty($this->attrs)) {
            foreach ($this->attrs as $k => $v) {
                $attrs .= " $k='$v' ";
            }
        }
        echo "<{$this->container} class='{$this->class}' $attrs>";
            echo $this->prepend;
            echo $this->categoryHtml;
        echo "</{$this->container}>";
    }

    protected function getTree(){
        $tree = [];
        $data = $this->data;
        foreach ($data as $id=>&$node) {
            if (!$node['parent_id']){
                $tree[$id] = &$node;
            }else{
                $data[$node['parent_id']]['childs'][$id] = &$node;
            }
        }
        return $tree;
    }

    protected function getCategoryHtml($tree, $tab = ''){
        $str = '';
        foreach($tree as $id => $category){
            $str .= $this->catToTemplate($category, $tab, $id);
        }
        return $str;
    }

    protected function catToTemplate($category, $tab, $id){
        ob_start();
        require $this->tpl;
        return ob_get_clean();
    }
}
<?php
$parent = isset($category['childs']);
if(!$parent){
    $delete = '<a href="' . ADMIN . '/category/delete?id=' . $id . '" class="delete"><i class="fa fa-times text-danger"></i></a>';
}else{
    $delete = '<i class="fa fa-fw fa-times delete"></i>';
}
?>

<p class="group-p">
    <a class="list-group-item list-group-item-action" href="<?=ADMIN;?>/category/edit?id=<?=$id;?>">
        <?=$category['name'];?>
    </a>
    <?=$delete?>
</p>



<?php if($parent): ?>
    <div class="list-group pl-4">
        <?= $this->getCategoryHtml($category['childs']); ?>
    </div>
<?php endif; ?>

<!--<div class="list-group">-->
<!--    <a href="#" class="list-group-item list-group-item-action">Cras justo odio</a>-->
<!--</div>-->

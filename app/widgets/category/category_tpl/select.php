<?php $parent_id = \shop\App::$app->getProperty('parent_id'); ?>

<option value="<?=$id;?>"<?php if($id == $parent_id) echo ' selected'; ?><?php if(isset($_GET['id']) && $id == $_GET['id']) echo ' disabled'; ?>>
    <?=$tab . $category['name'];?>
</option>
<?php if(isset($category['childs'])): ?>
    <?= $this->getCategoryHtml($category['childs'], '&nbsp;' . $tab. ' - ') ?>
<?php endif; ?>
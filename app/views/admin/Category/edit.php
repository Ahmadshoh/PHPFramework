<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Категории</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 badge-primary">
            <h6 class="m-0 font-weight-bold">Изменить категорию</h6>
        </div>
        <div class="card-body">
            <form action="<?=ADMIN;?>/category/edit" method="POST">
                <div class="form-group">
                    <label for="name">Наименование категории</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Название категории" required>
                </div>
                <div class="form-group">
                    <label for="parent_id">Родительская категория</label>
                    <?php new \app\widgets\category\Category([
                        'tpl' => APP . '/widgets/category/category_tpl/select.php',
                        'container' => 'select',
                        'cache' => 0,
                        'cacheKey' => 'admin_select',
                        'class' => 'form-control',
                        'attrs' => [
                            'name' => 'parent_id',
                            'id' => 'parent_id',
                        ],
                        'prepend' => '<option value="0">Самостоятельная категория</option>',
                    ]) ?>
                </div>
                <input type="hidden" name="id" value="<?=$category->id;?>">
                <input type="submit" class="btn btn-success btn-block" value="Изменить">
            </form>
        </div>
    </div>
</div>
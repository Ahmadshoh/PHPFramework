<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Категории</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 badge-primary">
            <h6 class="m-0 font-weight-bold">Добавить категорию</h6>
        </div>
        <div class="card-body">
            <form action="<?=ADMIN;?>/category/add" method="POST" role="form" id="signup" data-toggle="validator">
                <div class="form-group has-feedback">
                    <label for="name">Наименование категории</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Название категории" required>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
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
                <input type="submit" class="btn btn-success btn-block" value="Добавить">
            </form>
            <?php if(isset($_SESSION['form_data'])) unset($_SESSION['form_data']); ?>
        </div>
    </div>
</div>
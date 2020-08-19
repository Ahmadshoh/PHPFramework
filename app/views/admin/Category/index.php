<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Категории</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 badge-primary">
            <h6 class="m-0 font-weight-bold">Все категории</h6>
        </div>
        <div class="card-body">
            <?php new \app\widgets\category\Category([
                'tpl' => APP . '/widgets/category/category_tpl/category_admin.php',
                'container' => 'div',
                'cache' => 0,
                'cacheKey' => 'admin_cat',
                'class' => 'list-group',
            ]);
            ?>
        </div>
    </div>
</div>
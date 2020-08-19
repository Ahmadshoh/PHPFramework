<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Товары</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 badge-primary">
            <h6 class="m-0 font-weight-bold">Добавить товар</h6>
        </div>
        <div class="card-body">
            <form action="<?=ADMIN;?>/product/add" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title">Имя товара</label>
                    <input type="text" name="title" class="form-control" id="title" placeholder="Имя товара" value="<?php isset($_SESSION['form_data']['title']) ? h($_SESSION['form_data']['title']) : null; ?>" required>
                </div>
                <div class="form-group">
                    <label for="category_id">Родительская категория</label>
                    <?php new \app\widgets\category\Category([
                        'tpl' => APP . '/widgets/category/category_tpl/select.php',
                        'container' => 'select',
                        'cache' => 0,
                        'cacheKey' => 'admin_select',
                        'class' => 'form-control',
                        'attrs' => [
                            'name' => 'category_id',
                            'id' => 'category_id',
                        ],
                        'prepend' => '<option value="0">Выберните категорию</option>',
                    ]) ?>
                </div>
                <div class="form-group">
                    <label for="price">Цена</label>
                    <input type="number" name="price" class="form-control" id="price" placeholder="Цена" pattern="^[0-9.]{1,}$" required>
                </div>
                <div class="form-group">
                    <label for="amount">Количество</label>
                    <input type="number" name="amount" class="form-control" id="amount" placeholder="Запась в скалде" pattern="^[0-9.]{1,}$" required>
                </div>
                <div class="form-group">
                    <label for="alif">Alif</label>
                    <input type="text" name="alif_link" class="form-control" id="alif" placeholder="сылка на alif.shop">
                </div>
                <div class="form-group">
                    <label for="description">Описание товара</label>
                    <textarea class="form-control" name="description" id="description" rows="5"></textarea>
                </div>
                <div class="form-group">
                    <label>
                        <input type="checkbox" name="visible" checked> Статус
                    </label>
                </div>

                <div class="form-group">
                    <label>
                        <input type="checkbox" name="recommended"> Рекомендуеться
                    </label>
                </div>
                <div class="form-group">
                    <div class="col-md-5">
                        <div class="card shadow mb-4 border-danger">
                            <div class="card-header badge-danger">
                                <h4 class="card-title">Базовое изображение</h4>
                            </div>
                            <div class="card-body">
                                <input type="file" name="image" id="image" class="form-control-file" required>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="submit" class="btn btn-success btn-block" value="Добавить">
            </form>
            <?php if(isset($_SESSION['form_data'])) unset($_SESSION['form_data']); ?>
        </div>
    </div>
</div>
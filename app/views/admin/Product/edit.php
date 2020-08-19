<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Продукты</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 badge-primary">
            <h6 class="m-0 font-weight-bold">Редактирование продукта</h6>
        </div>
        <div class="card-body">
            <form action="<?=ADMIN;?>/product/edit" method="post" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="title">Наименование товара</label>
                    <input type="text" name="title" class="form-control" id="title" placeholder="Имя товара" value="<?=$product->title;?>" required>
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
                        ]
                    ]) ?>
                </div>

                <div class="form-group">
                    <label for="price">Цена</label>
                    <input type="number" name="price" class="form-control" id="price" placeholder="Цена" pattern="^[0-9.]{1,}$" value="<?=$product->price;?>" required>
                </div>

                <div class="form-group">
                    <label for="amount">Количество</label>
                    <input type="number" name="amount" class="form-control" id="amount" placeholder="Запась в скалде" pattern="^[0-9.]{1,}$" value="<?=$product->amount?>" required>
                </div>

                <div class="form-group">
                    <label for="alif">Alif</label>
                    <input type="text" name="alif_link" class="form-control" id="alif" placeholder="сылка на alif.shop" value="<?=$product->alif_link?>">
                </div>

                <div class="form-group">
                    <label for="content">Описание</label>
                    <textarea name="description" id="description" rows="5"><?=$product->description;?></textarea>
                </div>

                <div class="form-group">
                    <label>
                        <input type="checkbox" name="visible"<?=$product->visible ? ' checked' : null;?>> Статус
                    </label>
                </div>

                <div class="form-group">
                    <label>
                        <input type="checkbox" name="recommended"<?=$product->recommended ? ' checked' : null;?>> Рекомендуеться
                    </label>
                </div>

                <div class="form-group">
                    <div class="col-md-6">
                        <div class="card shadow mb-4 border-danger">
                            <div class="card-header badge-danger">
                                <h4 class="card-title">Базовое изображение</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img src="<?=$product->image?>" style="width: 100%;">
                                    </div>
                                    <div class="col-md-8">
                                        <input type="file" name="image" id="image" class="form-control-file">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" value="<?=$product->id?>" name="id">
                <input type="submit" class="btn btn-success btn-block" value="Сохранить">
            </form>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 badge-primary">
            <h6 class="m-0 font-weight-bold">Характеристики продукта</h6>
        </div>
        <div class="card-body">

            <form action="<?=ADMIN;?>/product/addCharacter" method="post">
                <div id="accordion">
                    <div class="card nav-item">
                        <?php foreach ($groups as $group => $items): ?>

                            <?php
                                if (strpos($group, " ")) {
                                    $target = preg_split("/[s ]+/", $group)[1];
                                } else {
                                    $target = $group;
                                }
                            ?>
                            <a class="card-header nav-link collapsed badge-secondary" data-toggle="collapse"
                               data-target="#<?=$target?>" aria-expanded="true" aria-controls="<?=$target?>">
                                <h5 style="color: #fff; font-weight: bold;"><?=$group?></h5>
                            </a>

                            <?php foreach ($items as $item): ?>
                            <div id="<?=$target?>" class="collapse show" aria-labelledby="heading<?=$target?>"
                                 data-parent="#accordion">
                                <div class="card-body pb-0 pt-0">
                                    <div class="form-group">
                                        <label><?=$item['title']?></label>
                                        <input type="text" name="<?=$item['id']?>" class="form-control" <?php if(isset($item['value'])):?> value="<?=$item['value']?>" <?php endif;?>>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>

                        <?php endforeach; ?>
                    </div>
                </div>





                <input type="hidden" value="<?=$product->id?>" name="id">
                <input type="submit" class="btn btn-success btn-block" value="Сохранить">
            </form>
        </div>
    </div>
</div>
<?php if(!empty($_SESSION['bookmark'])): ?>
    <div class="col-md-12">
        <?php if(isset($_SESSION['error'])): ?>
            <div class="alert alert-danger">
                <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
            </div>
        <?php endif; ?>
    </div>
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>Фото</th>
                <th>Имя товара</th>
                <th>Цена</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($_SESSION['bookmark'] as $id => $item): ?>
                <tr>
                    <td><a href="products/<?=$item['alias'];?>"><img src="<?=$item['image'];?>" alt=""></a></td>
                    <td><a href="products/<?=$item['alias'];?>"><?=$item['title'];?></td>
                    <td><?=$item['price'];?></td>
                    <td><a href="bookmark/removeFromBookmark?id=<?=$id?>" class="removeFromBookmark"><button class="btn btn-danger">Удалить</button></a></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="text-right">
        <button class="btn btn-outline-dark" data-dismiss="modal">Продолжить покупку</button>
        <a href="bookmark"><button class="btn btn-primary">Закладки</button></a>
        <a href="bookmark/clear"><button class="btn btn-danger">Очистить закладку</button></a>
    </div>
<?php else: ?>
    <h3>Корзина пуста</h3>
<?php endif; ?>
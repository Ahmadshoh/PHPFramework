<?php if(!empty($_SESSION['cart'])): ?>
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>Фото</th>
                <th>Имя товара</th>
                <th>Кол-во</th>
                <th>Цена</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($_SESSION['cart'] as $id => $item): ?>
                <tr>
                    <td><a href="products/<?=$item['alias'];?>"><img src="<?=$item['img'];?>" alt=""></a></td>
                    <td><a href="products/<?=$item['alias'];?>"><?=$item['title'];?></td>
                    <td><?=$item['qty'];?></td>
                    <td><?=$item['price'];?></td>
                </tr>
            <?php endforeach; ?>
                <tr>
                    <td>Итого: <?=$_SESSION['cart.qty'];?> товара</td>
                    <td></td>
                    <td>На сумму:</td>
                    <td colspan="4" class="text-right cart-sum"><?=$_SESSION['cart.sum'];?> TJS</td>
                </tr>
            </tbody>
        </table>
    </div>
<div class="text-right">
    <button class="btn btn-outline-dark"  data-dismiss="modal">Продолжить покупку</button>
    <a href="cart"><button class="btn btn-primary">Оформить заказ</button></a>
    <a href="cart/clear"><button class="btn btn-danger">Очистить корзину</button></a>
</div>
<?php else: ?>
    <h3>Корзина пуста</h3>
<?php endif; ?>
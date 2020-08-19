<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Заказы</h1>
    </div>


    <div class="card shadow mb-4">
        <div class="card-header py-3 badge-primary">
            <h6 class="m-0 font-weight-bold">Заказ №<?=$order['id'] ?></h6>
            <div class="mt-3">
                <?php if($order['status'] == 'Принять в обработку' || $order['status'] == 'Обрабатывается'): ?>
                <a href="<?=ADMIN?>/order/change?id=<?=$order['id']?>&status=Одобрен"><button class="btn btn-success">Одобрить</button></a>
                <a href="<?=ADMIN?>/order/change?id=<?=$order['id']?>&status=Отказано"><button class="btn btn-danger">Отказать</button></a>
                <?php else: ?>
                <a href="<?=ADMIN?>/order/change?id=<?=$order['id']?>&status=Обрабатывается"><button class="btn btn-dark">Вернуть на доработку</button></a>
                <?php endif; ?>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td>Номер заказа</td>
                            <td><?php echo $order['id']; ?></td>
                        </tr>
                        <tr>
                            <td>Дата заказа</td>
                            <td><?php echo $order['date']; ?></td>
                        </tr>
                        <tr>
                            <td>Продуктов в заказе</td>
                            <td><?php echo count($order_products); ?></td>
                        </tr>
                        <tr>
                            <td>Сумма заказа</td>
                            <td><?php echo $order['sum']; ?></td>
                        </tr>
                        <tr>
                            <td>Имя заказчика</td>
                            <td><?php echo $order['name']; ?></td>
                        </tr>
                        <?php
                            if($order['status'] == "Одобрен") {
                                $class = "table-success";
                            } else if($order['status'] == "Отказано") {
                                $class = "table-danger";
                            } else {
                                $class = '';
                            }
                        ?>
                        <tr class="<?=$class?>">
                            <td>Статус</td>
                            <td><?php echo $order['status']; ?></td>
                        </tr>
                        <tr>
                            <td>Комментарии</td>
                            <td><?php echo $order['comment']; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success">Детали заказа</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th>ID</th>
                            <th>Имя товара</th>
                            <th>Количество</th>
                            <th>Цена</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($order_products as $product): ?>
                        <tr>
                            <td><?=$product->id?></td>
                            <td><?=$product->title?></td>
                            <td><?=$product->qty?></td>
                            <td><?=$product->price?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                    <tfoot class="thead-light">
                        <tr>
                            <td>Итого:</td>
                            <td></td>
                            <td><?=$order['qty']?></td>
                            <td><?=$order['sum']?></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
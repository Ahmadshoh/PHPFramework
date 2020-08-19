<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Заказы</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 badge-primary">
            <h6 class="m-0 font-weight-bold">Последные заказы</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="thead-light">
                    <tr>
                        <th>№</th>
                        <th>Имя</th>
                        <th>Номер</th>
                        <th>Кол-во</th>
                        <th>Итого</th>
                        <th>Статус</th>
                        <th>Время заказа</th>
                        <th>Действие</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($orders as $key => $order): ?>
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
                            <td><?php echo $order['id']; ?></td>
                            <td><?php echo $order['name']; ?></td>
                            <td><?php echo $order['phone']; ?></td>
                            <td><?php echo $order['qty']; ?></td>
                            <td><?php echo $order['sum']; ?></td>
                            <td><?php echo $order['status']; ?></td>
                            <td><?php echo $order['date']; ?></td>
                            <td>
                                <a href="<?=ADMIN?>/order/view?id=<?php echo $order['id']; ?>" class="mr-3"><i class="fa fa-eye"></i></a>
                                <a href="<?=ADMIN?>/order/delete?id=<?php echo $order['id']; ?>"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
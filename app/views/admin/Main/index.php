<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Статистика</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h1 mb-3 font-weight-bold text-gray-900"><?=$ordersCount?></div>
                            <div class="text-lg font-weight-bold text-primary text-uppercase mb-1">Заказов</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-money-bill-alt fa-2x text-gray-700"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h1 mb-3 font-weight-bold text-gray-900"><?=$productsCount?></div>
                            <div class="text-lg font-weight-bold text-success text-uppercase mb-1">Товаров</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-cart-plus fa-2x text-gray-700"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h1 mb-3 font-weight-bold text-gray-900"><?=$usersCount?></div>
                            <div class="text-дп font-weight-bold text-warning text-uppercase mb-1">Пользователей</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-700"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- DataTales Example -->
<!--    <div class="card shadow mb-4">-->
<!--        <div class="card-header py-3">-->
<!--            <h6 class="m-0 font-weight-bold text-success">Последные заказы</h6>-->
<!--        </div>-->
<!--        <div class="card-body">-->
<!--            <div class="table-responsive">-->
<!--                <table class="table table-bordered" id="dataTable" cellspacing="0" style="width: 1500px;">-->
<!--                    <thead>-->
<!--                    <tr>-->
<!--                        <th>№</th>-->
<!--                        <th>Имя</th>-->
<!--                        <th>Номер</th>-->
<!--                        <th>Имя товара</th>-->
<!--                        <th>Кол-во</th>-->
<!--                        <th>Итого</th>-->
<!--                        <th>Статус</th>-->
<!--                        <th>Время заказа</th>-->
<!--                    </tr>-->
<!--                    </thead>-->
<!--                    <tbody>-->
<!--                    --><?php //foreach($orders as $key => $order): ?>
<!--                        <tr>-->
<!--                            <td>--><?//=$key;?><!--</td>-->
<!--                            <td>--><?php //echo $order['name']; ?><!--</td>-->
<!--                            <td>--><?php //echo $order['phone']; ?><!--</td>-->
<!--                            <td>--><?php //echo $order['product']['title']; ?><!--</td>-->
<!--                            <td>--><?php //echo $order['count']; ?><!--</td>-->
<!--                            <td>--><?php //echo $order['product_total']; ?><!--</td>-->
<!--                            <td>--><?php //echo $order['status']; ?><!--</td>-->
<!--                            <td>--><?php //echo $order['date']; ?><!--</td>-->
<!--                        </tr>-->
<!--                    --><?php //endforeach; ?>
<!--                    </tbody>-->
<!--                </table>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
</div>
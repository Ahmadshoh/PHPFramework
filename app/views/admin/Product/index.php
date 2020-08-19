<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Продукты</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 badge-primary">
            <h6 class="m-0 font-weight-bold">Все продукты</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>№</th>
                            <th>Название</th>
                            <th>Категория</th>
                            <th>Цена</th>
                            <th>Статус</th>
                            <th>Действие</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($products as $key => $product): ?>
                        <tr>
                            <td><?php echo $product['id']; ?></td>
                            <td><?php echo $product['title']; ?></td>
                            <td><?php echo $product['cat']; ?></td>
                            <td><?php echo $product['price']; ?></td>
                            <td><?=$product['visible'] ? 'On' : 'Off';?></td>
                            <td>
                                <a href="<?=ADMIN?>/product/edit?id=<?php echo $product['id']; ?>" class="mr-3"><i class="fa fa-eye"></i></a>
                                <a href="<?=ADMIN?>/product/delete?id=<?php echo $product['id']; ?>"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
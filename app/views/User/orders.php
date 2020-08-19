<section class="content">
    <div class="container">
        <?php if($orders):?>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="border">
                    <tr class="thead border">
                        <th class="column-title">ID</th>
                        <th class="column-title">Количество</th>
                        <th class="column-title">Сумма</th>
                        <th class="column-title">DATA</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php foreach($orders as $item): ?>
                        <tr class="border">
                            <td><?=$item['id']?></td>
                            <td class="border-bottom"><?=$item['qty']?></td>
                            <td class="border-bottom"><?=$item['sum'];?></td>
                            <td class="border-bottom"><?=$item['date'];?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
        <div class="alert alert-danger">
            <h4>Заказы не найдены</h4>
        </div>
        <?php endif; ?>
    </div>
</section>
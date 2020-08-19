<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Пользователи</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 badge-primary">
            <h6 class="m-0 font-weight-bold">Редактирование пользователья</h6>
        </div>
        <div class="card-body">
            <form action="<?=ADMIN?>/user/edit" method="POST" data-toggle="validator">
                <div class="form-group has-feedback">
                    <label for="login">Логин</label>
                    <input name="login" id="login" type="text" value="<?=$user['login'];?>" class="form-control" data-error="Некорректный логин" required>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group has-feedback password">
                    <label for="profile_password">Пароль</label>
                    <input type="password" name="password" class="form-control" data-error="Пароль должен содержать минимум 6 символов" data-minlength="6" placeholder="Введите пароль если хотите его изменить">
<!--                    <button class="btn btn-password" id="password_btn"><i class="fa fa-eye" id="fa-visible"></i></button>-->
                    <div class="help-block with-errors" id="password"></div>
                </div>
                <div class="form-group has-feedback">
                    <label for="name">Имя</label>
                    <input type="text" name="name" id="name" value="<?=$user['name'];?>" class="form-control" data-error="Некорректное имя" required>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group has-feedback">
                    <label for="email">Ваша почта</label>
                    <input type="email" name="email" id="email" value="<?=$user['email'];?>" class="form-control" data-error="Некорректный email" required>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group has-feedback">
                    <label for="phone">Ваш номер телефона</label>
                    <input type="phone" name="phone" id="phone" value="<?=$user['phone'];?>" class="form-control" data-error="Некорректный номер телефона" maxlength="13" required>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group has-feedback">
                    <label for="address">Ваш адрес</label>
                    <input type="text" name="address" id="address" value="<?=$user['address'];?>" class="form-control" data-error="Некорректный адрес" required>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <label>Роль</label>
                    <select name="role" id="role" class="form-control">
                        <option value="user"<?php if($user->role == 'user') echo ' selected'; ?>>Пользователь</option>
                        <option value="admin"<?php if($user->role == 'admin') echo ' selected'; ?>>Администратор</option>
                    </select>
                </div>
                <input type="hidden" name="id" value="<?=$user->id;?>">
                <input type="submit" class="btn btn-success btn-block" value="Сохранить">
            </form>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success">Все заказы этого пользователья</h6>
        </div>
        <div class="card-body">
            <?php if($orders):?>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="border">
                        <tr class="thead border">
                            <th class="column-title">ID</th>
                            <th class="column-title">Статус</th>
                            <th class="column-title">Количество</th>
                            <th class="column-title">Сумма</th>
                            <th class="column-title">DATA</th>
                            <th class="column-title">Действие</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php foreach($orders as $item): ?>
                            <?php $class = $item['status'] == "Выполнен" ? 'table-success' : ''; ?>
                            <tr class="border <?=$class?>">
                                <td><?=$item['id']?></td>
                                <td><?=$item['status']?></td>
                                <td><?=$item['qty']?></td>
                                <td><?=$item['sum'];?></td>
                                <td><?=$item['date'];?></td>
                                <td></td>
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
    </div>
</div>
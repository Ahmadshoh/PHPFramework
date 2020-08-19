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
            <form action="user/signup" method="POST" role="form" id="signup" data-toggle="validator">
                <div class="form-group has-feedback">
                    <label for="login">Логин</label>
                    <input name="login" id="login" type="text" value="<?=isset($_SESSION['form_data']['login']) ? $_SESSION['form_data']['login'] : '';?>" class="form-control" data-error="Некорректный логин" required>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group has-feedback">
                    <label for="password">Пароль</label>
                    <input type="password" name="password" id="password" class="form-control" data-error="Пароль должен содержать минимум 6 символов" data-minlength="6" required>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group has-feedback">
                    <label for="name">Имя</label>
                    <input type="text" name="name" id="name" value="<?=isset($_SESSION['form_data']['name']) ? $_SESSION['form_data']['name'] : '';?>" class="form-control" data-error="Некорректное имя" required>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group has-feedback">
                    <label for="email">Ваша почта</label>
                    <input type="email" name="email" id="email" value="<?=isset($_SESSION['form_data']['email']) ? $_SESSION['form_data']['email'] : '';?>" class="form-control" data-error="Некорректный email" required>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group has-feedback">
                    <label for="phone">Ваш номер телефона</label>
                    <input type="phone" name="phone" id="phone" value="<?=isset($_SESSION['form_data']['phone']) ? $_SESSION['form_data']['phone'] : '';?>" class="form-control" data-error="Некорректный номер телефона" maxlength="13" required>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group has-feedback">
                    <label for="address">Ваш адрес</label>
                    <input type="text" name="address" id="address" value="<?=isset($_SESSION['form_data']['address']) ? $_SESSION['form_data']['address'] : '';?>" class="form-control" data-error="Некорректный адрес" required>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <label>Роль</label>
                    <select name="role" id="role" class="form-control">
                        <option value="user">Пользователь</option>
                        <option value="admin">Администратор</option>
                    </select>
                </div>
                <input type="submit" class="btn btn-success btn-block" value="Добавить">
            </form>
            <?php if(isset($_SESSION['form_data'])) unset($_SESSION['form_data']); ?>
        </div>
    </div>
</div>
<section class="content">
    <div class="container" style="width: 60%;">
        <h3 class="text-center">Регистрация</h3>
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
            <input type="submit" class="btn btn-success btn-block" value="Зарегистрироваться">
        </form>
        <?php if(isset($_SESSION['form_data'])) unset($_SESSION['form_data']); ?>
    </div>
</section>
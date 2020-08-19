<section class="content">
    <div class="container" style="width: 60%;">
        <h3 class="text-center">Авторизация</h3>
        <form action="user/login" method="post" role="form" id="login" data-toggle="validator">
            <div class="form-group has-feedback">
                <label for="login">Логин</label>
                <input name="login" id="login" type="text" class="form-control" data-error="Некорректный логин" required>
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group has-feedback">
                <label for="password">Пароль</label>
                <input type="password" id="password" name="password" class="form-control" data-error="Пароль должен содержать минимум 6 символов" required>
                <div class="help-block with-errors"></div>
            </div>
            <input type="submit" class="btn btn-success btn-block" value="Авторизация">
        </form>
    </div>
</section>
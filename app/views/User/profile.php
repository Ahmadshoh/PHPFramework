<section class="content">
    <div class="container" style="width: 60%;">
        <h3 class="text-center">Учетная запись</h3>
        <form action="user/profile" method="POST" role="form" id="signup" data-toggle="validator">
            <div class="form-group has-feedback">
                <label for="login">Логин</label>
                <input name="login" id="login" type="text" value="<?=$_SESSION['user']['login'];?>" class="form-control" data-error="Некорректный логин" required>
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group has-feedback password">
                <label for="profile_password">Пароль</label>
                <input type="password" name="password" id="profile_password" class="form-control" value="<?=$_SESSION['user']['password'];?>" data-error="Пароль должен содержать минимум 6 символов" data-minlength="6" required>
                <button class="btn btn-password" id="password_btn"><i class="fa fa-eye" id="fa-visible"></i></button>
                <div class="help-block with-errors" id="password"></div>
            </div>
            <div class="form-group has-feedback">
                <label for="name">Имя</label>
                <input type="text" name="name" id="name" value="<?=$_SESSION['user']['name'];?>" class="form-control" data-error="Некорректное имя" required>
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group has-feedback">
                <label for="email">Ваша почта</label>
                <input type="email" name="email" id="email" value="<?=$_SESSION['user']['email'];?>" class="form-control" data-error="Некорректный email" required>
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group has-feedback">
                <label for="phone">Ваш номер телефона</label>
                <input type="phone" name="phone" id="phone" value="<?=$_SESSION['user']['phone'];?>" class="form-control" data-error="Некорректный номер телефона" maxlength="13" required>
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group has-feedback">
                <label for="address">Ваш адрес</label>
                <input type="text" name="address" id="address" value="<?=$_SESSION['user']['address'];?>" class="form-control" data-error="Некорректный адрес" required>
                <div class="help-block with-errors"></div>
            </div>
            <input type="submit" class="btn btn-success btn-block" value="Сохранить">
        </form>
        <?php if(isset($_SESSION['form_data'])) unset($_SESSION['form_data']); ?>
    </div>
</section>
<div class="card-body p-5">
    <?php if(isset($_SESSION['error'])): ?>
        <div class="alert alert-danger">
            <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
        </div>
    <?php endif; ?>

    <?php if(isset($_SESSION['success'])): ?>
        <div class="alert alert-success">
            <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
        </div>
    <?php endif; ?>
    <div class="p-5">
        <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">Авторизация</h1>
        </div>
        <form class="user p-5" action="<?=ADMIN?>user/login-admin" method="post">
            <div class="form-group">
                <input type="text" class="form-control form-control-user" id="login" aria-describedby="loginHelp" placeholder="Введите логин" name="login">
            </div>
            <div class="form-group">
                <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Пароль">
            </div>
            <button class="btn btn-primary btn-user btn-block" type="submit">Авторизация</button>
        </form>
    </div>
</div>
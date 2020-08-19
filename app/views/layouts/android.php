<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?=$this->getMeta();?>
    <base href="http://localhost/shop.local/">
    <link rel="stylesheet" href="public/css/bootstrap.css">
    <link rel="stylesheet" href="public/css/owl.carousel.min.css">
    <link rel="stylesheet" href="public/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="public/css/animate.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="public/css/media.css">
</head>

<body>

    <div class="container">
        <section class="top-header">
            <div class="logo">
                <a href="<?=PATH?>"><img src="public/img/android.png" alt=""></a>
            </div>
            <div class="phone">
                <h3><span>+992</span> 98 766 2004</h3>
                 <h3 class="callback"><a href="#">Обратная связ</a></h3>
            </div>
            <div class="top-menu">
                <ul>
                    <li><a href="<?=PATH?>">Home</a></li>
                    <li><a href="about">About</a></li>
                    <li><a href="products">Products</a></li>
                    <li><a href="payment">Оплата</a></li>
                    <li><a href="contact">Contact</a></li>
                </ul>
            </div>
        </section>
    </div>
    <section class="menu">
        <div class="container">
            <nav class="menu-items">
                <ul>
                    <li class="category">
                        <button class="catalog" id="catalog">Каталог <i class="fas fa-bars"></i></button>
                        <?php new \app\widgets\category\Category([
                                'tpl' => APP . '/widgets/category/category_tpl/category.php',
                        ]); ?>
                    </li>
                    <li class="search-li">
                        <form action="search" method="GET">
                            <input type="text" placeholder="Искать товар" class="search" name="query" required>
                            <button type="submit" class="search-btn"><i class="fa fa-search"></i></button>
                        </form>
                    </li>
                    <li class="bookmark">
                        <a href="bookmark"><button type="button" class="bookmark-btn"><i
                                        class="fa fa-heart"></i></button></a>
                    </li>
                    <li class="cabins">
                        <button class="menu-btn cabinet">Аккаунт<i class="fas fa-user"></i></button>
                        <div class="cabins-items">
                            <?php if(!empty($_SESSION['user'])): ?>
                                <div class="p-3 text-center" style="color: #9DAA56; font-size: 20px;background: #fff; border: 1px solid rgba(0,0,0,0.2);">Здравствуйте,
                                    <br> <?php echo $_SESSION['user']['name']?></div>
                                <div><a href="user/profile">Личный кабинет</a></div>
                                <div><a href="user/orders">Ваши заказы</a></div>
                                <div><a href="user/logout">Выйти</a></div>
                            <?php else: ?>
                                <div><a href="user/login">Войти</a></div>
                                <div><a href="user/signup">Зарегистрироваться</a></div>
                            <?php endif; ?>
                        </div>
                    </li>
                    <li class="cart">
                        <a href="cart" style="text-decoration: none;">
                            <button class="menu-btn"><i class="fa fa-cart-plus"></i> Корзина
                                <span class="cart-count"><?php echo \shop\App::$app->getProperty('cartCount'); ?></span>
                            </button>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </section>
    <div class="container">
        <div class="row" style="margin-top: 25px;">
            <div class="col-md-12">
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
            </div>
        </div>
    </div>
    <?=$content?>

<!--    <div id="myModal" class="modal fade mt-5" tabindex="-1">-->
<!--        <div class="modal-dialog modal-md">-->
<!--            <div class="modal-header alert alert-success">-->
<!--                <h4 class="modal-title">OK</h4>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
    <div id="myModal" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header alert-success">
                    <h4 class="modal-title"></h4>
                    <button class="close" data-dismiss="modal">Х</button>
                </div>
                <div class="modal-body">

                </div>
            </div>
        </div>
    </div>
    <section class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <h4>Кабинет покупателя</h4>
                    <a href="">Войти</a>
                    <a href="">Регистрация</a>
                    <a href="">Заказы</a>
                    <a href="">Товары в закладке</a>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <h4>Магазин</h4>
                    <a href="">О магазине</a>
                    <a href="">Возврат</a>
                    <a href="">Условия рассрочки</a>
                    <a href="">Доставка</a>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <h4>Контакты</h4>
                    <span>г. Душанбе, ул. Фотех Ниёзи, 51</span>
                    <a href="">+992488881111</a>
                    <span>Пн—Пт: с 9.00 до 18.00</span>
                    <span>Сб: с 10.00 до 16.00</span>
                </div>
            </div>

        </div>
    </section>
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> -->
    <script src="public/js/jquery.js"></script>
    <script src="public/js/owl.carousel.min.js"></script>
    <script src="public/js/bootstrap.min.js"></script>
    <script src="public/js/validator.js"></script>
    <script src="public/js/script.js"></script>

</body>

</html>
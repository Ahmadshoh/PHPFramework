<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/media.css">
</head>

<body>
    <div class="container">
        <section class="top-header">
            <div class="logo">
                <a href="/"><img src="img/android.png" alt=""></a>
            </div>
            <div class="phone">
                <h3><span>+992</span> 98 766 2004</h3>
                <!-- <h3 class="callback"><a href="/">Обратная связ</a></h3> -->
            </div>
            <div class="top-menu">
                <ul>
                    <li><a href="/">Home</a></li>
                    <li><a href="/">About</a></li>
                    <li><a href="/">Products</a></li>
                    <li><a href="/">Оплата</a></li>
                    <li><a href="/">Contact</a></li>
                </ul>
            </div>
        </section>
    </div>
    <section class="menu">
        <div class="container">
            <nav class="menu-items">
                <ul>
                    <li>
                        <button class="catalog" id="catalog">Каталог <i class="fas fa-bars"></i></button>
                        <div class="podcatalog" id="podcatalog">
                            <?php foreach($categories as $category): ?>
                                <div>
                                    <a href="/products?category_id=<?php echo $category['id']; ?>">
                                        <?=$category->name;?>
                                        <span class="arrow">></span>
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </li>
                    <li class="search-li">
                        <form action="" method="GET">
                            <input type="text" placeholder="Искать товар" class="search" name="search">
                            <button type="submit" class="search-btn"><i class="fa fa-search"></i></button>
                        </form>
                    </li>
                    <li class="bookmark">
                        <a href="/bookmark"><button type="button" class="bookmark-btn"><i
                                        class="fa fa-heart"></i></button></a>
                    </li>
                    <li class="cabins">
                        <button class="menu-btn cabinet"><i class="fas fa-user"></i> Кабинет</button>
                        <div class="cabins-items">
                            <?php if(isset($_SESSION['user'])): ?>
                                <div><a href="/logout">Выйти</a></div>
                            <?php else: ?>
                                <div><a href="/login">Войти</a></div>
                                <div><a href="/signup">Зарегистрироваться</a></div>
                            <?php endif; ?>
                        </div>
                    </li>
                    <li class="cart">
                        <a href="/cart" style="text-decoration: none;">
                            <button class="menu-btn"><i class="fa fa-cart-plus"></i> Корзина
                                <span class="cart-count">1</span>
                            </button>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </section>

    <div class="errorBlock mt-5">
        <div class="text-center">
            <h1 style="color: red; font-size: 32px;">Страиница не найдено!</h1>
        </div>
    </div>

    <div id="myModal" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Товар добавлен в закладки</h4>
                    <button class="close" data-dismiss="modal">Х</button>
                </div>
                <div class="modal-body">
                    <div class="products-in-modal">
                        <div class="modal-items-img"><img src="<?php echo STATIC_PATH;?>img/1.png" alt=""></div>
                        <div class="modal-items-title">Samsung Galaxy A50</div>
                        <div class="modal-items price">1 x 1785 <span>TJS</span></span></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#"><button class="main-btn" data-dismiss="modal">Закладки</button></a>
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
    <script src="js/jquery.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>

</body>

</html>
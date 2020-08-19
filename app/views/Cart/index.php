<section class="content">
    <div class="container">
        <?php if(!empty($_SESSION['cart'])):?>
         <div class="text-right mb-2">
             <button class="btn btn-secondary" id="recount">Пересчитать</button>
             <a href="cart/clear"><button class="btn btn-danger">Очистить корзину</button></a>
         </div>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="border">
                <tr class="thead border">
                    <th class="column-title">Изображение</th>
                    <th class="column-title">Товар</th>
                    <th class="column-title">Количество</th>
                    <th class="column-title">Цена</th>
                    <th class="column-title">Сумма</th>
                    <th class="column-title"></th>
                </tr>
                </thead>

                <tbody>
                <?php foreach($_SESSION['cart'] as $id => $item): ?>
                    <tr class="border">
                        <td class="border-bottom">
                            <a href="products/<?=$item['alias']?>">
                                <img src="<?=$item['img']?>">
                            </a>
                        </td>
                        <td class="border-bottom">
                            <a href="products/<?=$item['alias']?>" style="color: #9DAA56;">
                                <?=$item['title']?>
                            </a>
                        </td>
                        <td class="border-bottom">
                            <input type="number" class="itemCount" id="itemCount_<?=$id?>" data-id="<?=$id;?>" data-current ="<?=$item['qty']?>" value="<?=$item['qty']?>" min='1' style="width: 75px;">
                        </td>
                        <td class="border-bottom"><?=$item['price'];?></td>
                        <td class="border-bottom itemPrice" id="itemPrice_<?=$id?>" value="<?=$item['price'];?>"><?=$item['sum'];?></td>
                        <td class="border-bottom">
                            <a href="cart/removeFromCart?id=<?=$id;?>">
                                <button class="btn btn-danger">Удалить</button>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>

                <tfoot>
                <tr class="border">
                    <th class="column-title">Итого: <span><?php echo $_SESSION['cart.qty'] ?></span> товара</th>
                    <th class="column-title"></th>
                    <th class="column-title"></th>
                    <th class="column-title"></th>
                    <th class="column-title"></th>
                    <th class="column-title" style="text-align: center;">Сумма: <span id="totalPrice"><?php echo $_SESSION['cart.sum']; ?></span> <span>TJS</span></th>
                </tr>
                </tfoot>
            </table>
        </div>

        <?php if(empty($_SESSION['user'])): ?>
        <div class="col-12">
            <div class="alert alert-danger text-center">
                <h5>Чтобы оформить заказ, сначало войдите или зарегистрируйтесь!</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
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
            <div class="col-lg-6 col-md-6 col-sm-12">
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
        </div>
        <?php else: ?>
        <h3 class="text-center" style="margin-top: 50px; margin-bottom: 50px;">Оформление заказа</h3>
        <form action="cart/order" method="POST">
            <div class="row">
                <div class="form-group col-sm-6">
                    <label for="name">Имя</label>
                    <input type="text" name="name" id="name" value="<?php echo $_SESSION['user']['name']; ?>" class="form-control" required>
                </div>
                <div class="form-group col-sm-6">
                    <label for="phone">Контакный телефон</label>
                    <input type="tell" name="phone" id="phone" maxlength="13"  value="<?php echo $_SESSION['user']['phone']; ?>" class="form-control" required>
                </div>
                <div id="remove" class="form-group col-sm-12">
                    <label>Выберите способ доставки</label>
                    <select class="form-control" name="buying_type" id="buying-type">
                        <option>Самовызов</option>
                        <option>Доставка</option>
                    </select>
                </div>
                <div class="form-group col-sm-6" id="addressBlock" style="display: none;">
                    <label for="phone">Адрес</label>
                    <input type="text" name="address" id="address"  value="<?php echo $_SESSION['user']['address']; ?>" class="form-control" required>
                </div>
                <div class="form-group col-sm-12">
                    <label for="comment">Комментарии к заказу</label>
                    <textarea class="form-control" name="comment" id="comment" rows="7"></textarea>
                </div>
                <div class="col-12">
                    <input type="submit" class="btn btn-success" value="Оформить заказ">
                </div>
            </div>
        </form>
        <?php if(isset($_SESSION['form_data'])) unset($_SESSION['form_data']); ?>
        <?php endif; ?>
        <?php endif;?>
    </div>
</section>
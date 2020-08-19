<section class="content">
    <div class="container">
        <div class="row">
            <?php new \app\widgets\filter\Filter(); ?>

            <div class="col-lg-9 col-md-9">
                <div class="owl-carousel owl-theme">
                    <?php foreach($sliders as $slider): ?>
                        <div>
                            <img src="<?=$slider->img_path;?>">
                        </div>
                    <?php endforeach; ?>
                </div>
                <?php if($recommendedProducts): ?>
                <div class="row mt-4 mb-4">
                    <div class="col-lg-6">
                        <h3>Рекомендуемые товары</h3>
                    </div>
                    <div class="col-lg-3 ml-auto" style="text-align:right;">
                        <a href="products" class="ml-auto" style="color: grey;">
                            <p>Все товары</p>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <?php foreach($recommendedProducts as $product): ?>
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="product">
                                <a href="bookmark/addToBookmark?id=<?=$product->id;?>" class="addToBookmark" data-id="<?=$product->id;?>">
                                    <button><i class="fa fa-heart"></i></button>
                                </a>
                                <div class="product-img">
                                    <a href="products/<?=$product->alias;?>"><img
                                            src="<?=$product->image;?>"></a>
                                </div>
                                <div class="product-review">
                                    <p class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</p>
                                </div>
                                <div class="product-title">
                                    <a href="products/<?=$product->alias;?>">
                                        <h3><?=$product->title;?></h3>
                                    </a>
                                </div>
                                <div class="product-price">
                                    <p>Цена: <?=$product->price;?> <span>TJS</span></p>
                                </div>
                                <div class="add-to-cart">
                                    <a id="addToCart" href="cart/addToCart?id=<?=$product->id;?>" class="addToCart" data-id="<?=$product->id;?>">
                                        <button class="main-btn">Добавить в корзину</button>
                                    </a>
                                    <a href="<?=$product->alif_link?>" target="_blank">
                                        <button class="main-btn" name="addToCart">Купить в рассрочку</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
                <?php if($products): ?>
                <div class="row mt-4 mb-4">
                    <div class="col-lg-6">
                        <h3>Новейшые товары</h3>
                    </div>
                    <div class="col-lg-3 ml-auto" style="text-align:right;">
                        <a href="products" class="ml-auto" style="color: grey;">
                            <p>Все товары</p>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <?php foreach($products as $product): ?>
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="product">
                                <a href="bookmark/addToBookmark?id=<?=$product->id;?>" class="addToBookmark" data-id="<?=$product->id;?>">
                                    <button><i class="fa fa-heart"></i></button>
                                </a>
                                <div class="product-img">
                                    <a href="products/<?=$product->alias;?>">
                                        <img src="<?=$product->image;?>">
                                    </a>
                                </div>
                                <div class="product-review">
                                    <p class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</p>
                                </div>
                                <div class="product-title">
                                    <a href="products/<?=$product->alias;?>">
                                        <h3><?=$product->title;?></h3>
                                    </a>
                                </div>
                                <div class="product-price">
                                    <p>Цена: <?=$product->price;?> <span>TJS</span></p>
                                </div>
                                <div class="add-to-cart">
                                    <a id="addToCart" href="/addToCart?id=<?=$product->id;?>" class="addToCart" data-id="<?=$product->id;?>">
                                        <button class="main-btn">Купить наличнимы</button>
                                    </a>
                                    <a href="#">
                                        <button class="main-btn" name="addToCart">Купить в рассрочку</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
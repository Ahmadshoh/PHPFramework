<section class="content">
    <div class="container">
        <div class="row">
            <?php new \app\widgets\brand\Brand(); ?>
            <div class="col-lg-9 col-md-9">
                <?php if($products): ?>
                    <div class="row mb-4">
                        <div class="col-lg-6">
                            <h3>Все товары</h3>
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
                                        <a id="addToCart" href="/addToCart?id=<?=$product->id;?>" class="addToCart">
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
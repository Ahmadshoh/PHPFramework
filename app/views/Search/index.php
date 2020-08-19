<section class="content">
    <div class="container">
        <?php if($products): ?>
        <h1 class="mb-4">Результаты поиска</h1>
        <div class="row">
            <?php foreach($products as $key => $product): ?>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="product">
                        <a href="bookmark/addToBookmark?id=<?=$key?>" class="addToBookmark" data-id="<?=$key;?>">
                            <button><i class="fa fa-heart"></i></button>
                        </a>
                        <div class="product-img">
                            <a href="products/<?php echo $product['alias'];?>">
                                <img src="<?php echo $product['image'];?>">
                            </a>
                        </div>
                        <div class="product-review">
                            <p class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</p>
                        </div>
                        <div class="product-title">
                            <a href="products/<?php echo $product['alias'];?>">
                                <h3><?php echo $product['title'];?></h3>
                            </a>
                        </div>
                        <div class="product-price">
                            <p>Цена: <?php echo $product['price'];?> <span>TJS</span></p>
                        </div>
                        <div class="add-to-cart">
                            <a id="addToCart" href="/addToCart?id=<?=$key?>" class="addToCart">
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
        <?php else: ?>
            <div class="col-12">
                <div class="alert alert-danger">
                    <h5>Не найден товар по вашему запросу!</h5>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>
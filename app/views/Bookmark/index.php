<section class="content">
    <div class="container">
        <?php if(!empty($_SESSION['bookmark'])):?>
        <div class="text-left">
            <a href="bookmark/clear"><button class="btn btn-danger">Очистить корзину</button></a>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="row mt-4 mb-4">
                    <div class="col-lg-6">
                        <h3>Закладки</h3>
                    </div>
                    <div class="col-lg-3 ml-auto" style="text-align:right;">
                        <a href="products" class="ml-auto" style="color: grey;">
                            <p>Все товары</p>
                        </a>
                    </div>
                </div>
            </div>
            <?php foreach($_SESSION['bookmark'] as $id => $item): ?>
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <div class="product">
                        <div class="delete-from-bookmark">
                            <a href="bookmark/removeFromBookmark?id=<?=$id;?>" class="removeFromBookmark">
                                <span>x</span> Удалить
                            </a>
                        </div>
                        <div class="product-img">
                            <a href="product/<?=$item['alias'];?>"><img src="<?=$item['image'];?>"></a>
                        </div>
                        <div class="product-review">
                            <p class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</p>
                        </div>
                        <div class="product-title">
                            <a href="product/<?=$item['alias'];?>">
                                <h3><?=$item['title'];?></h3>
                            </a>
                        </div>
                        <div class="product-price">
                            <p>Цена: <?=$item['price'];?> <span>TJS</span></p>
                        </div>
                        <div class="add-to-cart">
                            <a id="addToCart" href="#" class="addToCart" data-id="<?=$id;?>">
                                <button class="main-btn">Купить наличнимы</button>
                            </a>
                            <a href="" target="_blank">
                                <button class="main-btn">Купить в рассрочку</button>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</section>
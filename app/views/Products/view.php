<section class="content">
    <div class="container">
        <div class="row">
            <?php
            $category = \shop\App::$app->getProperty('category');
            ?>
            <div class="col-lg-4 col-md-4 col-sm-12 img-block">
                <div class="product_product-img">
                    <img src="<?=$product->image;?>" alt="">
                </div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-12 info-block">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12">
                        <h3 class="product_product-title"><?=$product->title;?></h3><br>
                        <p class="product_product-price">Цена: <span class="price"><?=$product->price;?></span> <span class="tjs">TJS</span></p>
                        <p class="product_product-manufacturer">
                            Производитель:
                            <span class="brand-name">
                                <a href="category/<?=$category[$product->category_id]['alias'];?>"><?=$category[$product->category_id]['name'];?></a>
                            </span>
                        </p>

                        <div class="text-left mb-3">
                            <select name="color" id="color" class="form-control">
                                <option value="Red">Red</option>
                                <option value="Red">Red</option>
                                <option value="Red">Red</option>
                            </select>
                        </div>

                        <div class="text-left mb-3">
                            <form action="cart/addToCart">
                                <input type="number" id="qty" name="qty" class="mr-3" style="width: 50px;" value="1" min="1">
                                <a href="cart/addToCart?id=<?=$product->id;?>" data-id="<?=$product->id;?>" class="addToCart">
                                    <button class="main-btn">Купить</button>
                                </a>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <h5 class="info-title">Полезные информации</h5><br>
                        <a href="#" class="product-terms"><i class="fa fa-align-justify"></i>Условия
                            рассрочки</a><br>
                        <a href="#" class="product-terms"><i class="fa fa-mobile"></i>Условия доставки</a>
                    </div>
                </div>

                <div class="bottom-block">
                    <a href="bookmark/addToBookmark?id=<?=$product->id?>" class="addToBookmark" data-id="<?=$product->id?>">
                        <i class="fa fa-heart"></i>
                        <span>Добавить в закладку</span>
                    </a>
                    <a href="<?=$product->alif_link?>" target="_blank">
                        <i class="fa fa-cart-plus"></i>
                        <span>Купить в рассрочку</span>
                    </a>
                </div>
            </div>

            <div class="product-infos">
                <div class="tabs">
                    <span class="tab">Описание</span>
                    <span class="tab">Характеристики</span>
                </div>
                <div class="tab_content">
                    <div class="tab_item col-12">
                        <?=$product->description;?>
                    </div>
                    <div class="tab_item">
                        <div class="table-responsive col-12">
                            <table class="table col-12">
                                <?php foreach($groups as $group => $items): ?>
                                <thead>
                                    <tr>
                                        <th colspan='4' class='text-left'><?=$group?></th>
                                    </tr>
                                </thead>
                                <?php foreach ($items as $id => $value): ?>
                                <tbody>
                                    <tr>
                                        <td class="text-left" colspan="2"><?=$value["charc_title"]?></td>
                                        <td class="text-left" colspan="2"><?=$value["value"]?></td>
                                    </tr>
                                </tbody>
                                <?php endforeach; ?>
                                <?php endforeach; ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
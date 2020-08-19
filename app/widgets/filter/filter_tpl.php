<div class="col-lg-3 col-md-3 col-sm-12">
    <div class="filters">
<!--        --><?php //new \app\widgets\category\Category([
//            'tpl' => APP . '/widgets/category/category_tpl/brands.php'
//        ]); ?>

        <?php
        $routes = \shop\Router::getRoute();
        if(!empty($routes['alias']))
        ?>
        <div id="accordion">
            <div class="card nav-item">
                <a class="card-header nav-link collapsed" data-toggle="collapse"
                   data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Сим-карта
                </a>

                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                     data-parent="#accordion">
                    <div class="card-body">
                        <div class="toggle-button">
                            <input id="visible" name="visible" type="checkbox">
                            <label for="visible"
                                   style="height: 20px;width: 20px;background: transparent; font-size: 22px;">
                                1 </label>
                            <div class="toggle-button__icon"></div>
                        </div>
                        <div class="toggle-button">
                            <input id="visible" name="visible" type="checkbox">
                            <label for="visible"
                                   style="height: 20px;width: 20px;background: transparent; font-size: 22px;">
                                2 </label>
                            <div class="toggle-button__icon"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

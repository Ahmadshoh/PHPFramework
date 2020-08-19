<li>
    <a href="category/<?php echo $category['alias'];?>">
        <?php echo $category['name'];?>
        <?php if(isset($category['childs'])): ?>
        <span class="arrow"><i
                    class="fa fa-arrow-alt-circle-right"></i></span>
        <?php endif; ?>
    </a>
    <?php if(isset($category['childs'])): ?>
        <ul>
            <?= $this->getCategoryHtml($category['childs']);?>
        </ul>
    <?php endif; ?>
</li>

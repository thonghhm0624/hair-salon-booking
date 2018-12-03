<section class="page explore container-fluid">
    <div class="container">
        <div class="row" id="body-row">
            <div class="col-md-3 col-sm-12">
                <?php
                    echo $this->element('modules/components/explore/explore-sidebar');
                ?>
            </div>
            <div class="col-md-9 col-sm-12">
                <?php if ($products != null) :?>
                    <?= $this->element('modules/components/products/products-content') ?>
                <?php elseif ($articles != null): ?>
                    <?= $this->element('modules/components/articles/articles-content') ?>
                <?php elseif ($product != null) : ?>
                    <?= $this->element('modules/components/products/product-details') ?>
                <?php elseif ($article != null) : ?>
                    <?= $this->element('modules/components/articles/article-details') ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
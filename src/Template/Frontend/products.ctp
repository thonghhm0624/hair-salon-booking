<section class="page explore container-fluid">
    <div class="container">
        <div class="row" id="body-row">
            <div class="col-md-3 col-sm-12">
                <?php
                    echo $this->element('modules/components/explore/explore-sidebar');
                ?>
            </div>
            <div class="col-md-9 col-sm-12">
                <?php if ($articles == null) : ?>
                    <?= $this->element('modules/components/products/products-content') ?>
                <?php else: ?>
                    <?= $this->element('modules/components/products/articles-content') ?>
                <?php endif ?>
            </div>
        </div>
    </div>
</section>
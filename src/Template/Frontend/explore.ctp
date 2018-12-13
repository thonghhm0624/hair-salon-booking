<section class="page explore container-fluid">
    <div class="container">
        <div class="row" id="body-row">
            <div class="col-md-3 col-sm-12">
                <?php
                    echo $this->element('modules/components/explore/explore-sidebar');
                ?>
            </div>
            <div class="col-md-9 col-sm-12">
                <?php if ($filter == "product_details") : ?>
                    <?= $this->element('modules/components/products/product-details') ?>
                <?php elseif ($filter == "article_details") : ?>
                    <?= $this->element('modules/components/articles/article-details') ?>
                <?php else: ?>
                    <?php if ($filter == "products_all") : ?>
                        <div class="search">
                            <form action="<?= $this->request->webroot ?>searchProducts" name="SearchForm" method="post">
                                <input type="text" name="search" maxlength="64" id="SearchForm" placeholder="Tìm kiếm . . ."/>
                            </form>
                            <div class="srch_btn" style="cursor: pointer;" onclick="SearchForm.submit()"><img src="<?= $this->request->webroot ?>images/icon-search.png"></div>
                        </div>
                        <?= $this->element('modules/components/products/products-content') ?>
                    <?php elseif ($filter == "products_search") : ?>
                        <div class="search">
                            <form action="<?= $this->request->webroot ?>searchProducts" name="SearchForm" method="post">
                                <input type="text" name="search" maxlength="64" id="SearchForm" placeholder="Tìm kiếm . . ."/>
                            </form>
                            <div class="srch_btn" style="cursor: pointer;" onclick="SearchForm.submit()"><img src="<?= $this->request->webroot ?>images/icon-search.png"></div>
                        </div>
                        <?= $this->element('modules/components/products/products-content') ?>
                    <?php elseif ($filter == "products_category") : ?>
                        <div class="search">
                            <form action="<?= $this->request->webroot ?>searchProducts" name="SearchForm" method="post">
                                <input type="text" name="search" maxlength="64" id="SearchForm" placeholder="Tìm kiếm . . ."/>
                            </form>
                            <div class="srch_btn" style="cursor: pointer;" onclick="SearchForm.submit()"><img src="<?= $this->request->webroot ?>images/icon-search.png"></div>
                        </div>
                        <?= $this->element('modules/components/products/products-content') ?>
                    <?php else: ?>
                        <div class="search">
                            <form action="<?= $this->request->webroot ?>searchArticles" name="SearchForm" method="post">
                                <input type="text" name="search" maxlength="64" id="SearchForm" placeholder="Tìm kiếm . . ."/>
                            </form>
                            <div class="srch_btn" style="cursor: pointer;" onclick="SearchForm.submit()"><img src="<?= $this->request->webroot ?>images/icon-search.png"></div>
                        </div>
                        <?= $this->element('modules/components/articles/articles-content') ?>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

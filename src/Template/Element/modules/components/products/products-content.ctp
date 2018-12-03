<div class="explore-content">
    <div class="search-results">
        <h2>Tìm thấy x kết quả</h2>
        <div class="search">
                <form action="<?= $this->request->webroot ?>products" name="SearchForm" method="post">
                    <input type="text" name="searchForContent" maxlength="64" id="SearchForm" placeholder="Tìm kiếm . . ."/>
                </form>
                <div class="srch_btn" style="cursor: pointer;" onclick="SearchForm.submit()"><img src="<?= $this->request->webroot ?>images/icon-search.png"></div>
        </div>
    </div>

    <a class="row articles-explore article-item" href="#" style="display:inline-flex;">
        <div class="col col-md-4 col-xs-12 article-explore-img">
            <img src="<?= $this->request->webroot ?>images/article/1/explore.png"/>
        </div>
        <div class="col col-md-8 col-xs-12 article-explore-content">
            <h2>Cách chăm sóc tóc cho nam giới</h2>
            <p>
                Bài hỏi đáp nhanh dưới đây sẽ gỉai đáp nhiều thắc mắc và cho bạn biết sự thật mà có thể lâu nay bạn đang lầm tưởng về cách chăm sóc tóc cho nam giới.
            </p>
        </div>
    </a>
    <div class="row products-explore">
    <?php foreach($products as $product): ?>
        <div class="col col-md-4 col-12 product-item">
            <div class="product-name">
                <?= $product->product_title ?>
            </div>
            <div>&nbsp;</div>
            <div class="product-img">
                <img src="<?= $this->request->webroot.$product->product_image ?>"/>
            </div>
            <div>&nbsp;</div>
            <div class="product-description">
                <?= $product->product_description ?>
            </div>
            <div>&nbsp;</div>
            <a class="product-read-more" href="#">Xem thêm</a>
        </div>
    
    <?php endforeach;?>
    </div>
    <?php
        $params_pagination = $this->Paginator->params();
    ?>
    <!-- Pagination -->
    <div class="row explore-pagination">
        <?php if($params_pagination['prevPage']) : ?>
            <a class="results-pagination previous-results-pagination" href="<?= $this->request->webroot.'products/'.($params_pagination['page'] - 1) ?>">&lt;&lt; Trang trước</a>
        <?php endif; ?>
        <?php if($params_pagination['nextPage']) : ?>
            <a class="results-pagination next-results-pagination" href="<?= $this->request->webroot.'products/'.($params_pagination['page'] + 1) ?>">Trang kế &gt;&gt;</a>
        <?php endif; ?>
    </div>
</div>
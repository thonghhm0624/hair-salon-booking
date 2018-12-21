<?php
$params_pagination = $this->Paginator->params();
?>
<div class="explore-content">
    <?php if ($params_pagination['count'] == 0 ) : ?>
        <div class="search-results">
            <h2>Không có kết quả tìm kiếm.</h2>
        </div>
    <?php else : ?>
        <div class="search-results">
            <h2>Tìm thấy <?= $params_pagination['count']?> kết quả</h2>
        </div>
        <div class="row products-explore">
            <?php foreach($products as $product): ?>
                <div class="col col-md-4 col-12">
                    <div class="product-item">
                        <div class="product-name">
                            <?= $product->product_title ?>
                        </div>
                        <div>&nbsp;</div>
                        <div class="product-img">
                            <img sty src="<?= $this->request->webroot.$product->product_image ?>"/>
                        </div>
                        <div>&nbsp;</div>
                        <div class="product-description">
                            <?= $product->product_description ?>
                        </div>
                        <div>&nbsp;</div>
                        <a class="product-read-more" href="<?= $this->request->webroot.'products/details/' .$product->product_id ?>">Xem thêm</a>
                    </div>
                </div>
            <?php endforeach;?>
        </div>
        <!-- Pagination -->
        <div class="row explore-pagination">
            <?php if ($filter == "products_all") : ?>
                <?php if($params_pagination['prevPage']) : ?>
                    <a class="results-pagination previous-results-pagination" href="<?= $this->request->webroot.'products/'.($params_pagination['page'] - 1) ?>">&lt;&lt; Trang trước</a>
                <?php endif; ?>
                <?php if($params_pagination['nextPage']) : ?>
                    <a class="results-pagination next-results-pagination" href="<?= $this->request->webroot.'products/'.($params_pagination['page'] + 1) ?>">Trang kế &gt;&gt;</a>
                <?php endif; ?>
            <?php elseif ($filter == "products_search") : ?>
                <?php if($params_pagination['prevPage']) : ?>
                    <a class="results-pagination previous-results-pagination" href="<?= $this->request->webroot.'searchProducts/'.$args.'/'.($params_pagination['page'] - 1) ?>">&lt;&lt; Trang trước</a>
                <?php endif; ?>
                <?php if($params_pagination['nextPage']) : ?>
                    <a class="results-pagination next-results-pagination" href="<?= $this->request->webroot.'searchProducts/'.$args.'/'.($params_pagination['page'] + 1) ?>">Trang kế &gt;&gt;</a>
                <?php endif; ?>
            <?php elseif ($filter == "products_category") : ?>
                <?php if($params_pagination['prevPage']) : ?>
                    <a class="results-pagination previous-results-pagination" href="<?= $this->request->webroot.'products/category/'.$category.'/'.($params_pagination['page'] - 1) ?>">&lt;&lt; Trang trước</a>
                <?php endif; ?>
                <?php if($params_pagination['nextPage']) : ?>
                    <a class="results-pagination next-results-pagination" href="<?= $this->request->webroot.'products/category/'.$category.'/'.($params_pagination['page'] + 1) ?>">Trang kế &gt;&gt;</a>
                <?php endif; ?>
            <?php endif ?>
        </div>
    <?php endif; ?>
</div>
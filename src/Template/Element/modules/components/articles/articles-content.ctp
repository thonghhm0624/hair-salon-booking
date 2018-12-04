<?php
$params_pagination = $this->Paginator->params();
?>
<div class="explore-content">
    <div class="search">
        <form action="<?= $this->request->webroot ?>articles" name="SearchForm" method="post">
            <input type="text" name="searchForArticles" maxlength="64" id="SearchForm" placeholder="Tìm kiếm . . ."/>
        </form>
        <div class="srch_btn" style="cursor: pointer;" onclick="SearchForm.submit()"><img src="<?= $this->request->webroot ?>images/icon-search.png"></div>
    </div>
    <?php if ($params_pagination['count'] == 0 ) : ?>
        <div class="search-results">
            <h2>Không có kết quả tìm kiếm.</h2>
        </div>
    <?php else : ?>
        <div class="search-results">
            <h2>Tìm thấy <?= $params_pagination['count']?> kết quả</h2>
        </div>
        <?php foreach ($articles as $article): ?>
        <a class="row articles-explore article-item" href="<?= $this->request->webroot.'articles/details/' .$article->article_id ?>">
            <div class="col col-md-4 col-xs-12 article-explore-img">
                <img src="<?= $this->request->webroot.$article->article_image ?>"/>
            </div>
            <div class="col col-md-8 col-xs-12 article-explore-content">
                <h2><?= $article->article_title ?></h2>
                <p>
                    <?= $article->article_description ?>
                </p>
            </div>
        </a>
        <?php endforeach; ?>

        <!-- Pagination -->
        <div class="row explore-pagination">
            <?php if ($category == null) : ?>
                <?php if($params_pagination['prevPage']) : ?>
                    <a class="results-pagination previous-results-pagination" href="<?= $this->request->webroot.'articles/'.($params_pagination['page'] - 1) ?>">&lt;&lt; Trang trước</a>
                <?php endif; ?>
                <?php if($params_pagination['nextPage']) : ?>
                    <a class="results-pagination next-results-pagination" href="<?= $this->request->webroot.'articles/'.($params_pagination['page'] + 1) ?>">Trang kế &gt;&gt;</a>
                <?php endif; ?>
            <?php else : ?>
                <?php if($params_pagination['prevPage']) : ?>
                    <a class="results-pagination previous-results-pagination" href="<?= $this->request->webroot.'articles/category/'.($params_pagination['page'] - 1) ?>">&lt;&lt; Trang trước</a>
                <?php endif; ?>
                <?php if($params_pagination['nextPage']) : ?>
                    <a class="results-pagination next-results-pagination" href="<?= $this->request->webroot.'articles/category/'.($params_pagination['page'] + 1) ?>">Trang kế &gt;&gt;</a>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>
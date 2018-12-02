<div class="explore-sidebar" id="accordionExample">
    <div class="explore-sidebar-item">
        <div id="headingOne">
            <?php if($collapse_articles == true): ?>
            <a class="item item-heading news" type="button" data-toggle="collapse" data-target="#collapseArticles" aria-expanded="true" aria-controls="collapseOne">
                Tin tức
            </a>
            <?php else: ?>
            <a class="item item-heading news collapsed" type="button" data-toggle="collapse" data-target="#collapseArticles" aria-expanded="true" aria-controls="collapseOne">
                Tin tức
            </a>
             <?php endif; ?>
        </div>
        <?php if($collapse_articles == true):?>
             <div id="collapseArticles" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
        <?php else: ?>
             <div id="collapseArticles" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
        <?php endif; ?>
            <a class="card card-body item item-category" href="page=explore&exploring=news&category=1">
                Chăm sóc tóc
            </a>
            <a class="card card-body item item-category" href="page=explore&exploring=news&category=2">
                Phục hồi tóc
            </a>
            <a class="card card-body item item-category" href="page=explore&exploring=news&category=3">
                Kiểu tóc
            </a>
        </div>
    </div>
    <div class="explore-sidebar-item">
        <div id="headingTwo">
            <?php if($collapse_products == true) :?>
            <a class="item item-heading products " type="button" data-toggle="collapse" data-target="#collapseProducts" aria-expanded="true" aria-controls="collapseProducts">
                Sản phẩm
            </a>
            <?php else: ?>
            <a class="item item-heading products collapsed" type="button" data-toggle="collapse" data-target="#collapseProducts" aria-expanded="true" aria-controls="collapseProducts">
                Sản phẩm
            </a>
            <?php endif; ?>
            
        </div>
        <?php if($collapse_products == true): ?>
           <div id="collapseProducts" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
        <?php else: ?>
            <div id="collapseProducts" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
        <?php endif; ?>
        
            <a class="card card-body item item-category" href="page=explore&exploring=product&category=1">
                Chăm sóc tóc
            </a>
            <a class="card card-body item item-category" href="page=explore&exploring=product&category=2">
                Phục hồi tóc
            </a>
            <a class="card card-body item item-category" href="page=explore&exploring=product&category=3">
                Kiểu tóc
            </a>
        </div>
    </div>
</div>
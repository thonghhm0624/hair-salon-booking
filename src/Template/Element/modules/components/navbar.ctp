<!--<nav class="navbar navbar-expand-lg container-fluid">-->
<!--    <div class="container">-->
<!--        <div class="navbar-collapse" id="navbarNav" >-->
<!--            <ul class="navbar-nav">-->
<!--                <li class="nav-item">-->
<!--                    <a class="nav-link" href="--><!--introduction">Giới Thiệu</a>-->
<!--                </li>-->
<!--                <li class="nav-item ">-->
<!--                    <a class="nav-link" href="--><!--articles">Tin Tức </a>-->
<!--                </li>-->
<!--                <li class="nav-item">-->
<!--                    <a class="nav-link" href="--><!--products">Sản Phẩm</a>-->
<!--                </li>-->
<!--                -->
<!--                <li class="nav-item">-->
<!--                    <a class="nav-link js-goto" goto="contact" href="#contact">Liên hệ</a>-->
<!--                </li>-->
<!--            </ul>-->
<!--        </div>-->
<!--    </div>-->
<!--</nav>-->
<section class="navigation container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-12">
                <a class="nav-link" href="<?= $this->request->webroot ?>introduction">Giới Thiệu</a>
            </div>
            <div class="col-md-3 col-sm-12">
                <a class="nav-link" href="<?= $this->request->webroot ?>articles">Tin Tức </a>
            </div>
            <div class="col-md-3 col-sm-12">
                <a class="nav-link" href="<?= $this->request->webroot ?>products">Sản Phẩm</a>
            </div>
            <div class="col-md-3 col-sm-12">
                <a class="nav-link js-goto" goto="contact" href="#contact">Liên hệ</a>
            </div>
        </div>
    </div>
</section>
<nav class="navbar navbar-expand-lg container-fluid mobile-md-hide">
    <div class="container">
        <div class="collapse navbar-collapse" id="navbarNav" >
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="<?= $this->request->webroot ?>introduction">Giới Thiệu</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="<?= $this->request->webroot ?>articles">Tin Tức </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $this->request->webroot ?>products">Sản Phẩm</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link js-goto" goto="contact" href="#contact">Liên hệ</a>
                </li>
            </ul>
           <!--  <div class="search">
                <form action="" name="SearchForm" method="post">
                    <input type="text" name="searchForContent" maxlength="64" id="SearchForm" placeholder="Tìm kiếm . . ." onblur="this.value=''"/>
                </form>
                <div class="srch_btn" onclick="SearchForm.submit()"><img src="<$this->request->webroot ?>images/icon-search.png"></div>
            </div> -->
        </div>
    </div>
</nav>
<header class="container-fluid">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-4 col-sm-12 logo">
                <a href="<?= $this->request->webroot ?>"><img src="<?= $this->request->webroot ?>images/logo.png" /></a>
                <a href="https://www.facebook.com/tony.a.lev.0624"><img class="icon-social" src="<?= $this->request->webroot ?>images/icon-facebook.png" /></a>
                <a href="https://www.facebook.com/tony.a.lev.0624"><img class="icon-social" src="<?= $this->request->webroot ?>images/icon-instagram.png" /></a>
            </div>
            <div class="col-md-4 col-sm-6 col-6 time-work">
                Thời gian làm việc : 10h - 20h
            </div>
            <?php if(!empty($session)):?>
                <div class="col-md-4 col-sm-6 col-6 login" >
                    Chào <a href="<?= $this->request->webroot.'user'?>"><?= $session['data']['login_user']['name'] ?></a>,&nbsp;<a href="<?= $this->request->webroot ?>logout">Đăng Xuất</a>
                </div>
            <?php else : ?>
                <div class="col-md-4 col-sm-6 col-6 login" id="show-popup-login">
                    Đăng Nhập
                </div>
            <?php endif;?>
        </div>
    </div>
</header>
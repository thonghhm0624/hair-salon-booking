<header class="container-fluid">
    <div class="container">
        <div class="logo">
            <a href="<?= $this->request->webroot ?>"><img src="<?= $this->request->webroot ?>images/logo.png" /></a>
            <a href="#"><img class="icon-social" src="<?= $this->request->webroot ?>images/icon-facebook.png" /></a>
            <a href="#"><img class="icon-social" src="<?= $this->request->webroot ?>images/icon-instagram.png" /></a>
        </div>
        <div class="time-work">
            Thời gian làm việc : 10h - 20h
        </div>
        <?php if(!empty($session)):?>
            <div class="login" >
                Chào <a href="<?= $this->request->webroot.'user'?>"><?= $session['data']['login_user']['name'] ?></a>
                <br/>
                <a href="<?= $this->request->webroot ?>logout">Đăng Xuất</a>
            </div>
        <?php else : ?>
            <div class="login" id="show-popup-login">
                Đăng Nhập
            </div>
        <?php endif;?>

    </div>
</header>
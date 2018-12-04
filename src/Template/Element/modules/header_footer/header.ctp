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
        <?php $login_user =  $this->request->session()->read('response'); ?>
        <?php if(!empty($login_user)):?>
            <div class="login" >
                Chào <?= $login_user['data']['login_user']['name'] ?>
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
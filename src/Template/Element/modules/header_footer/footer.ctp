<footer id="contact">
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <div class="footer-item footer-introduce-col">
                        <div class="title">
                            <img src="<?= $this->request->webroot ?>images/logo.png">
                            <h1 class="left-underline">Gent là ai?</h1>
                        </div>
                        <div class="content-container">
                            <div class="content">Hệ thống salon chuyên nghiệp, giúp bạn trải nghiệm một phong cách thời thượng ẩn giấu trong chính bạn </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="footer-item footer-system-col">
                        <div class="title"><h1 class="left-underline">Hệ Thống</h1></div>
                        <div class="content-container">
                            <?php foreach ($branches_for_site as $branch) : ?>
                                <div class="content"><?= $branch->branch_address ?></div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="footer-item footer-phone-col">
                        <div class="title"><h1 class="left-underline">Liên Hệ</h1></div>
                        <div class="content-container">
                            <div class="content">
                                <?php foreach ($branches_for_site as $branch) : ?>
                                    <div class="content"><?= $branch->branch_phonenumber ?></div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid text-footer">
        <div>Copyright &copy; 2018 Méo Meo. Thiết kế bởi Méo Meo.</div>
    </div>
</footer>

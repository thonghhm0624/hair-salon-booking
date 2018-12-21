<?php if (!empty($session)) : ?>
    <section class="page user container-fluid">
        <div class="container">
            <div class="row" id="body-row">
                <div class="col-md-3 col-sm-12">
                    <?php
                        echo $this->element('modules/components/user/user_sidebar');
                    ?>
                </div>
                <div class="col-md-9 col-sm-12">
                    <?php
                    echo $this->element('modules/components/user/user_functions');
                    ?>
                </div>
            </div>
        </div>
    </section>
<?php else : ?>
    <div class="container not-logged-in">
        Bạn chưa đăng nhập vào hệ thống. Mời đăng nhập trước.
    </div>
<?php endif; ?>


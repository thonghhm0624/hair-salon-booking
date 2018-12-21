
<?php if(empty($session) || $session['data']['login_type'] == 'customer'): ?>
    <section class="teaser">
        <div class="block1 container-fluid">
            <div class="container">
                <p class="reservation">
                    Nếu bạn đã sẵn sàng<br />
                    thay đổi bản thân <br/>
                    . . .<br/>
                    Hãy đặt lịch ngay<br/><br/>
                    <a style="cursor: pointer;" class="cta-start" id="show-popup-resevation">Bắt đầu</a>
                </p>
            </div>
        </div>
    </section>
<?php else : ?>
    <?= "" ?>
<?php endif; ?>



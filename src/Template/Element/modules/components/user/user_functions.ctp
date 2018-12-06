<div class="user-functions">
    <?php if ($userfunction == "changepassword") : ?>
    <div id="user-password-container-function" class="user-password-container">
        <h2>Thay đổi mật khẩu</h2>
        <form>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-5 col-form-label">Nhập mật khẩu mới</label>
                <div class="col-sm-6">
                    <input type="password" class="form-control" id="update-info-password-new" placeholder="Nhập mật khẩu mới">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-5 col-form-label">Nhập lại mật khẩu mới</label>
                <div class="col-sm-6">
                    <input type="password" class="form-control" id="update-info-password-retype" placeholder="Nhập lại mật khẩu mới">
                </div>
            </div>
            <div class="form-group row text-center">
                <div class="col-sm-4">
                    &nbsp;
                </div>
                <div class="col-sm-4">
                    <input type="submit" id="submit-user-password" class="user-password-update" value="Cập nhật" />
                </div>
                <div class="col-sm-4">
                    &nbsp;
                </div>
            </div>
        </form>
        <div class="update-status text-center"></div>
        <hr />
    </div>
    <?php elseif ($userfunction == "changeinfo") : ?>
    <div id="user-info-container-function" class="user-info-container">
        <h2>Thay đổi thông tin</h2>
        <form>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-5 col-form-label">Tên</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="update-info-name" value="<?= $session['data']['login_user']['name'] ?>" placeholder="Tên">
                </div>
            </div>
            <div class="form-group row text-center">
                <div class="col-sm-4">
                    &nbsp;
                </div>
                <div class="col-sm-4">
                    <input type="submit" id="submit-user-name" class="user-info-update" value="Cập nhật" />
                </div>
                <div class="col-sm-4">
                    &nbsp;
                </div>
            </div>
        </form>
        <div class="update-status text-center"></div>
        <hr />
    </div>
    <?php elseif ($userfunction == 'history'): ?>
    <div id="user-history-container-function" class="user-history-container">
        <h2>Lịch sử</h2>
        <div class="user-history">
            <div class="row border history-classify">
                <div class="col-1 border">Mã</div>
                <div class="col-3 border">Chi nhánh</div>
                <div class="col-2 border">Dịch vụ</div>
                <div class="col-2 border">Stylist</div>
                <div class="col-2 border">Ngày</div>
                <div class="col-2 border">Thời gian</div>
            </div>
            <?php foreach ($reservations as $reservation) : ?>
                <div class="row history-data-row">
                    <div class="col-1 border border-top-0"><?= $reservation->reservation_id ?></div>
                    <div class="col-3 border border-top-0"><?= $branches[$reservation->reservation_id] ?></div>
                    <div class="col-2 border border-top-0"><<?= $services[$reservation->service_id] ?>/div>
                    <div class="col-2 border border-top-0"><?= $stylists[$reservation->stylist_id] ?></div>
                    <div class="col-2 border border-top-0"><?= $reservation->reservation_date ?></div>
                    <div class="col-2 border border-top-0"><?= $reservation->reservation_time ?></div>
                </div>
            <?php endforeach; ?>
        </div>
        <hr />
    </div>
    <?php endif; ?>
</div>
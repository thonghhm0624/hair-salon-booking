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
            <?php if ($session['data']['login_type'] == 'customer') : ?>
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
                    <div class="col-3 border border-top-0"><?= $branches[$reservation->branch_id] ?></div>
                    <div class="col-2 border border-top-0"><?= $services[$reservation->service_id]?></div>
                    <div class="col-2 border border-top-0"><?= $stylists[$reservation->stylist_id] ?></div>
                    <div class="col-2 border border-top-0"><?= $reservation->reservation_date ?></div>
                    <div class="col-2 border border-top-0"><?= $reservation->reservation_time ?>:00</div>
                </div>
                <?php endforeach; ?>
            <?php elseif ($session['data']['login_type'] == 'stylist') : ?>
                <div class="row border history-classify">
                    <div class="col-2 border">Chi nhánh</div>
                    <div class="col-2 border">Khách</div>
                    <div class="col-2 border">Dịch vụ</div>
                    <div class="col-2 border">Ngày</div>
                    <div class="col-1 border">Thời gian</div>
                    <div class="col-1 border">Điểm</div>
                    <div class="col-2 border">Đánh giá</div>
                </div>
                <?php $sum_stylist_marks = 0 ?>
                <?php foreach ($reservations as $reservation) : ?>
                    <div class="row history-data-row">
                        <div class="col-2 border border-top-0"><?= $branches[$reservation->branch_id] ?></div>
                        <div class="col-2 border border-top-0"><?= $customers[$reservation->customer_id]?></div>
                        <div class="col-2 border border-top-0"><?= $services[$reservation->service_id] ?></div>
                        <div class="col-2 border border-top-0"><?= $reservation->reservation_date ?></div>
                        <div class="col-1 border border-top-0"><?= $reservation->reservation_time ?>:00</div>
                        <div class="col-1 border border-top-0"><?= $reservation->reservation_marks ?></div>
                        <div class="col-2 border border-top-0"><?= $reservation->reservation_remark ?></div>
                    </div>
                    <?php $sum_stylist_marks +=  intval($reservation->reservation_marks) ?>
                <?php endforeach; ?>
                <div>&nbsp;</div>
                <div>
                    <?php if (sizeof($reservations) == 0) : ?>
                    <?= "Chưa có đánh giá nào" ?>
                    <?php else : ?>
                        Điểm trung bình: <?= $sum_stylist_marks/sizeof($reservations) ?>
                    <?php endif; ?>
                </div>
            <?php else: ?>
            <?php endif; ?>
        </div>
        <hr />
    </div>
    <?php endif; ?>
</div>
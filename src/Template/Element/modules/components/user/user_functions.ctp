<div class="user-functions">
    <label id="classify" class="d-none" for="<?= $session['data']['login_type'] ?>">Bạn là <?= $session['data']['login_type'] ?></label>
    <label id="update-info-phonenumber" class="d-none" for="phonenumber"><?= $session['data']['login_user']['id'] ?></label>
    <?php if ($userfunction == "changeinfo") : ?>
    <div id="user-info-container-function" class="user-info-container">
        <h2>Thay đổi thông tin</h2>
        <form>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-5 col-form-label">Tên</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="update-info-name" value="<?= $session['data']['login_user']['name'] ?>" placeholder="Tên">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-5 col-form-label">Mật khẩu mới</label>
                <div class="col-sm-6">
                    <input type="password" class="form-control" id="update-info-password" placeholder="Mật khẩu mới">
                </div>
            </div>
            <div class="form-group row text-center">
                <div class="col-sm-4">
                    &nbsp;
                </div>
                <div class="col-sm-4">
                    <input type="submit" disabled id="submit-user-info" class="user-info-update" value="Cập nhật" />
                </div>
                <div class="col-sm-4">
                    &nbsp;
                </div>
            </div>
        </form>
        <div id="update-status" class="text-center"></div>
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
            <div class="row history-data-row">
                <div class="col-1 border border-top-0">1</div>
                <div class="col-3 border border-top-0">ABC</div>
                <div class="col-2 border border-top-0">Chít</div>
                <div class="col-2 border border-top-0">Taylor</div>
                <div class="col-2 border border-top-0">20/11</div>
                <div class="col-2 border border-top-0">15:00</div>
            </div>
        </div>
        <hr />
    </div>
    <?php endif; ?>
</div>
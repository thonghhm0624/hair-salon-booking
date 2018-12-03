<div class="popup popup-login" style="display: none">
    <div class="popup-login-ui">
        <form method="post">
            <div class="form-group row">
                <label class="col-sm-12 col-md-4 col-form-label">Số điện thoại</label>
                <div class="col-sm-12 col-md-8 ">
                    <input type="text" class="form-control" name="phonenumber">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-4 col-form-label">Mật khẩu</label>
                <div class="col-sm-12 col-md-8 ">
                    <input type="password" class="form-control" name="password">
                </div>
            </div>
            <div class="form-group row justify-content-between text-center">
                <div class="col-md-6">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" value="customer" name="login_objectDetectRadio">Khách hàng
                    </label>
                </div>
                <div class="col-md-6">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" value="stylist" name="login_objectDetectRadio">Stylist
                    </label>
                </div>
            </div>
            <div class="form-group row justify-content-between">
                <div class="col-md-3">
                    <button type="submit" class="btn">OK</button>
                </div>
                <div class="col-md-3">
                    <button type="button" class="btn popup-close">Thoát</button>
                </div>
            </div>
        </form>
    </div>
</div>
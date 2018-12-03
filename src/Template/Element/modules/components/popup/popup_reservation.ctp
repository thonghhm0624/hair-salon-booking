<div class="popup popup-reservation">
    <div class="popup-reservation-ui">
        <div class="bg-popup" >
            <div style="display: block">
                <form method="post">
                    <div class="row container-form">
                        <div class="col-sm-2 set-height">
                            <input type="text"  placeholder="Số điện thoại" />
                            <img src="<?= $this->request->webroot ?>images/phone.png">
                        </div>
                        <div class="col-sm-2 set-height">
                            <select name="" >
                                <option selected="selected" >Địa chỉ tiệm</option>
                                <option ></option>
                            </select>
                        </div>
                        <div class="col-sm-2 set-height">
                            <select name="" >
                                <option selected="selected" >Tên stylist</option>
                                <option ></option>
                            </select>
                        </div>
                        <div class="col-sm-2 set-height">
                            <select name="" >
                                <option selected="selected" >Dịch vụ</option>
                                <option ></option>
                            </select>
                        </div>
                        <div class="col-sm-2 set-height">
                            <input type="text" placeholder="Datepicker" />
                        </div>
                        <div class="col-sm-2 set-height">
                            <input type="text" placeholder="Chọn giờ" />
                        </div>
                    </div>
                    <div class="cta-cal">
                        <input type="submit" id="submit-reservation" class="cta" value="Đặt lịch ngay" />
                        <a class="cta exit-reservation popup-close">Thoát</a>
                    </div>
                </form>
            </div>
            <div class="result-success" style="display: none">
                <p>
                    Thao tác thành công!<br/>
                    Anh vui lòng đợi nhân viên liên lạc để xác nhận thông tin nhé. Trân trọng
                </p>
            </div>
            <div class="result-fail" style="display: none">
                <p>
                    Có lỗi trong quá trình xử lý. Mong anh thông cảm và đặt lịch lại giúp em nha.
                </p>
            </div>
        </div>
    </div>
</div>
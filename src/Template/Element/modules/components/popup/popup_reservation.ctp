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
                        <div style="display: block;" class="row border-row" id="thoigianhidden">
                            <div name="" class="thoigiantrongngay">
                                <div class="thoigian">
                                    <div class="time">
                                        <a><p data-value="0" class="text-h4 text-center">10 : 00</p></a>
                                    </div>
                                    <div class="clearfix">

                                    </div>
                                </div>
                                <div class="thoigian">
                                    <div class="time">
                                        <a><p data-value="1" class="text-h4 text-center">11 : 00</p></a>
                                    </div>
                                    <div class="clearfix">

                                    </div>
                                </div>
                                <div class="thoigian">
                                    <div class="time">
                                        <a><p data-value="2" class="text-h4 text-center">12 : 00</p></a>
                                    </div><div class="clearfix">

                                    </div>
                                </div>
                                <div class="thoigian">
                                    <div class="time">
                                        <a><p data-value="3" class="text-h4 text-center">13 : 00</p></a>
                                    </div><div class="clearfix">

                                    </div>
                                </div>
                                <div class="thoigian">
                                    <div class="time">
                                        <a><p data-value="4" class="text-h4 text-center">14 : 00</p></a>
                                    </div><div class="clearfix">

                                    </div>
                                </div>
                                <div class="thoigian">
                                    <div class="time">
                                        <a><p data-value="5" class="text-h4 text-center">15 : 00</p></a>
                                    </div><div class="clearfix">

                                    </div>
                                </div>
                                <div class="thoigian">
                                    <div class="time">
                                        <a><p data-value="6" class="text-h4 text-center">16 : 00</p></a>
                                    </div><div class="clearfix">

                                    </div>
                                </div>
                                <div class="thoigian">
                                    <div class="time">
                                        <a><p data-value="7" class="text-h4 text-center">17 : 00</p></a>
                                    </div><div class="clearfix">

                                    </div>
                                </div>
                                <div class="thoigian">
                                    <div class="time">
                                        <a><p data-value="8" class="text-h4 text-center">18 : 00</p></a>
                                    </div><div class="clearfix">

                                    </div>
                                </div>
                                <div class="thoigian">
                                    <div class="time">
                                        <a><p data-value="9" class="text-h4 text-center">19 : 00</p></a>
                                    </div><div class="clearfix">

                                    </div>
                                </div>
                                <div class="thoigian">
                                    <div class="time">
                                        <a><p data-value="10" class="text-h4 text-center">20 : 00</p></a>
                                    </div><div class="clearfix">

                                    </div>
                                </div>


                            <div class="clearfix"></div>
                            <div style="cursor: pointer;" class="text-center closetime">
                                <svg class="svg-inline--fa fa-times fa-w-12" style="font-size: 30px; color: #DFA541;" aria-hidden="true" data-prefix="fas" data-icon="times" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg=""><path fill="currentColor" d="M323.1 441l53.9-53.9c9.4-9.4 9.4-24.5 0-33.9L279.8 256l97.2-97.2c9.4-9.4 9.4-24.5 0-33.9L323.1 71c-9.4-9.4-24.5-9.4-33.9 0L192 168.2 94.8 71c-9.4-9.4-24.5-9.4-33.9 0L7 124.9c-9.4 9.4-9.4 24.5 0 33.9l97.2 97.2L7 353.2c-9.4 9.4-9.4 24.5 0 33.9L60.9 441c9.4 9.4 24.5 9.4 33.9 0l97.2-97.2 97.2 97.2c9.3 9.3 24.5 9.3 33.9 0z"></path></svg><!-- <i class="fas fa-times" style="font-size: 30px; color: #DFA541;"> </i> -->
                            </div>
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
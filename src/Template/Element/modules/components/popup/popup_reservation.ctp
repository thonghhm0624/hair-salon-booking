<div class="popup popup-reservation">
    <div class="popup-reservation-ui">
        <div class="bg-popup" >
            <div>
                <form method="post" id="reservation_form">
                    <div class="row container-form">
                        <div class="col-sm-2 set-height">
                            <?php $login_user =  $this->request->session()->read('response'); ?>
                            <?php if(!empty($login_user)):?>
                                <?php if ($login_user['data']['login_type'] == 'customer') : ?>
                                    <input type="text" id="reservation-phonenumber" value="<?= $login_user['data']['login_user']['id'] ?>" class="reservation-input" name="phonenumber" data-order="0" placeholder="Số điện thoại" />
                                <?php else : ?>
                                    <input type="text" id="reservation-phonenumber" disabled class="reservation-input" name="phonenumber" data-order="0" placeholder="Số điện thoại" />
                                <?php endif; ?>
                            <?php else : ?>
                                <input type="text" id="reservation-phonenumber" class="reservation-input" name="phonenumber" data-order="0" placeholder="Số điện thoại" />
                            <?php endif; ?>
                        </div>
                        <div class="col-sm-2 set-height">
                            <select name="store"  id="reservation-store" class="reservation-input" data-order="1" disabled>
                                <option class="d-none" value="" disabled selected >Địa chỉ tiệm</option>
                                <?php foreach ($branches_select as $branch): ?>
                                    <option value="<?= $branch->branch_id ?>" ><?= $branch->branch_address ?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="col-sm-2 set-height">
                            <select name="stylist" id="reservation-stylist" class="reservation-input" data-order="2" disabled>
                                <option class="d-none" value="" disabled selected >Tên stylist</option>
                                <?php foreach ($stylists_select as $stylist): ?>
                                    <option value="<?= $stylist->stylist_id ?>" ><?= $stylist->stylist_name ?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="col-sm-2 set-height">
                            <select name="service" id="reservation-service" class="reservation-input" data-order="3" disabled>
                                <option class="d-none" value=""  disabled selected >Dịch vụ</option>
                                <?php foreach ($services_select as $service): ?>
                                    <option value="<?= $service->service_id ?>" ><?= $service->service_name ?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="col-sm-2 set-height">
                            <input type="text" placeholder="Chọn Ngày" class="reservation-input" data-order="4" name="reservation-date" id="reservation-date" disabled/>
                        </div>

                        <div class="col-sm-2 set-height">
                            <select type="text" name="reservation-time" id="reservation-time" class="reservation-input" data-order="5" disabled>
                                <option value="10:00" disabled>10:00</option>
                                <option value="11:00">11:00</option>
                                <option value="12:00">12:00</option>
                                <option value="13:00">13:00</option>
                                <option value="14:00">14:00</option>
                                <option value="15:00">15:00</option>
                                <option value="16:00">16:00</option>
                                <option value="17:00">17:00</option>
                                <option value="18:00">18:00</option>
                                <option value="19:00">19:00</option>
                                <option value="20:00">20:00</option>
                            </select>
                        </div>

                    </div>
                    <div class="cta-cal">
                        <input type="submit" id="submit-reservation" class="reservation-input cta"  data-order="6" disabled value="Đặt lịch ngay" />
                        <a class="cta exit-reservation popup-close">Thoát</a>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<div class="result-success d-none">
    <p>
        Thao tác thành công!<br/>
        Anh vui lòng đợi nhân viên liên lạc để xác nhận thông tin nhé. Trân trọng
    </p>
</div>
<div class="result-fail d-none">
    <p>
        Có lỗi trong quá trình xử lý. Mong anh thông cảm và đặt lịch lại giúp em nha.
    </p>
</div>

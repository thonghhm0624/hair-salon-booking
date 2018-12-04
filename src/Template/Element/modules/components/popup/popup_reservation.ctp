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
                            <input type="text" placeholder="Datepicker" id="datepicker" />
                        </div>


                        <div id="ui-datepicker-div" class="ui-datepicker ui-widget ui-widget-content ui-helper-clearfix ui-corner-all" style="position: absolute; top: 50%; left: 65%; z-index: 4; display: block;">
                            <div class="ui-datepicker-header ui-widget-header ui-helper-clearfix ui-corner-all">
                                <a class="ui-datepicker-prev ui-corner-all" data-handler="prev" data-event="click" title="Prev">
                                    <span class="ui-icon ui-icon-circle-triangle-w">Prev</span>
                                </a>
                                <a class="ui-datepicker-next ui-corner-all" data-handler="next" data-event="click" title="Next">
                                    <span class="ui-icon ui-icon-circle-triangle-e">Next</span>
                                </a><div class="ui-datepicker-title"><select class="ui-datepicker-month" data-handler="selectMonth" data-event="change">
                                        <option value="0">Tháng 1</option>
                                        <option value="1">Tháng 2</option>
                                        <option value="2">Tháng 3</option>
                                        <option value="3">Tháng 4</option>
                                        <option value="4">Tháng 5</option>
                                        <option value="5">Tháng 6</option>
                                        <option value="6">Tháng 7</option>
                                        <option value="7">Tháng 8</option>
                                        <option value="8">Tháng 9</option>
                                        <option value="9">Tháng 10</option>
                                        <option value="10">Tháng 11</option>
                                        <option value="11" selected="selected">Tháng 12</option>
                                    </select>&nbsp;<span class="ui-datepicker-year">2018</span>
                                </div>
                            </div>
                        <table class="ui-datepicker-calendar">
                            <thead>
                            <tr>
                                <th scope="col" class="ui-datepicker-week-end">
                                    <span title="Sunday">Su</span>
                                </th>
                                <th scope="col">
                                    <span title="Monday">Mo</span>
                                </th>
                                <th scope="col">
                                    <span title="Tuesday">Tu</span>
                                </th>
                                <th scope="col">
                                    <span title="Wednesday">We</span>
                                </th>
                                <th scope="col">
                                    <span title="Thursday">Th</span>
                                </th>
                                <th scope="col">
                                    <span title="Friday">Fr</span>
                                </th>
                                <th scope="col" class="ui-datepicker-week-end">
                                    <span title="Saturday">Sa</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class=" ui-datepicker-week-end ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td>
                                <td class=" ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td>
                                <td class=" ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td>
                                <td class=" ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td>
                                <td class=" ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td>
                                <td class=" ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td>
                                <td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="11" data-year="2018">
                                    <a class="ui-state-default">1</a>
                                </td>
                            </tr>
                            <tr>
                                <td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="11" data-year="2018">
                                    <a class="ui-state-default">2</a>
                                </td>
                                <td class=" " data-handler="selectDay" data-event="click" data-month="11" data-year="2018">
                                    <a class="ui-state-default">3</a>
                                </td>
                                <td class=" ui-datepicker-days-cell-over  ui-datepicker-current-day ui-datepicker-today" data-handler="selectDay" data-event="click" data-month="11" data-year="2018">
                                    <a class="ui-state-default ui-state-highlight ui-state-active">4</a>
                                </td>
                                <td class=" " data-handler="selectDay" data-event="click" data-month="11" data-year="2018">
                                    <a class="ui-state-default">5</a>
                                </td>
                                <td class=" " data-handler="selectDay" data-event="click" data-month="11" data-year="2018">
                                    <a class="ui-state-default">6</a>
                                </td>
                                <td class=" " data-handler="selectDay" data-event="click" data-month="11" data-year="2018">
                                    <a class="ui-state-default">7</a>
                                </td>
                                <td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="11" data-year="2018">
                                    <a class="ui-state-default">8</a>
                                </td>
                            </tr>
                            <tr>
                                <td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="11" data-year="2018">
                                    <a class="ui-state-default">9</a>
                                </td>
                                <td class=" " data-handler="selectDay" data-event="click" data-month="11" data-year="2018">
                                    <a class="ui-state-default">10</a>
                                </td>
                                <td class=" " data-handler="selectDay" data-event="click" data-month="11" data-year="2018">
                                    <a class="ui-state-default">11</a>
                                </td>
                                <td class=" " data-handler="selectDay" data-event="click" data-month="11" data-year="2018">
                                    <a class="ui-state-default">12</a>
                                </td>
                                <td class=" " data-handler="selectDay" data-event="click" data-month="11" data-year="2018">
                                    <a class="ui-state-default">13</a>
                                </td>
                                <td class=" " data-handler="selectDay" data-event="click" data-month="11" data-year="2018">
                                    <a class="ui-state-default">14</a>
                                </td>
                                <td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="11" data-year="2018">
                                    <a class="ui-state-default">15</a>
                                </td>
                            </tr>
                            <tr>
                                <td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="11" data-year="2018">
                                    <a class="ui-state-default">16</a>
                                </td>
                                <td class=" " data-handler="selectDay" data-event="click" data-month="11" data-year="2018">
                                    <a class="ui-state-default">17</a>
                                </td>
                                <td class=" " data-handler="selectDay" data-event="click" data-month="11" data-year="2018">
                                    <a class="ui-state-default">18</a>
                                </td>
                                <td class=" " data-handler="selectDay" data-event="click" data-month="11" data-year="2018">
                                    <a class="ui-state-default">19</a>
                                </td>
                                <td class=" " data-handler="selectDay" data-event="click" data-month="11" data-year="2018">
                                    <a class="ui-state-default">20</a>
                                </td>
                                <td class=" " data-handler="selectDay" data-event="click" data-month="11" data-year="2018">
                                    <a class="ui-state-default">21</a>
                                </td>
                                <td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="11" data-year="2018">
                                    <a class="ui-state-default">22</a>
                                </td>
                            </tr>
                            <tr>
                                <td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="11" data-year="2018">
                                    <a class="ui-state-default">23</a>
                                </td>
                                <td class=" " data-handler="selectDay" data-event="click" data-month="11" data-year="2018">
                                    <a class="ui-state-default">24</a>
                                </td>
                                <td class=" " data-handler="selectDay" data-event="click" data-month="11" data-year="2018">
                                    <a class="ui-state-default">25</a>
                                </td>
                                <td class=" " data-handler="selectDay" data-event="click" data-month="11" data-year="2018">
                                    <a class="ui-state-default">26</a>
                                </td>
                                <td class=" " data-handler="selectDay" data-event="click" data-month="11" data-year="2018">
                                    <a class="ui-state-default">27</a>
                                </td>
                                <td class=" " data-handler="selectDay" data-event="click" data-month="11" data-year="2018">
                                    <a class="ui-state-default">28</a
                                </td>
                                <td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="11" data-year="2018">
                                    <a class="ui-state-default">29</a>
                                </td>
                            </tr>
                            <tr>
                                <td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="11" data-year="2018">
                                    <a class="ui-state-default">30</a>
                                </td>
                                <td class=" " data-handler="selectDay" data-event="click" data-month="11" data-year="2018">
                                    <a class="ui-state-default">31</a>
                                </td>
                                <td class=" ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td>
                                <td class=" ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td>
                                <td class=" ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td>
                                <td class=" ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td>
                                <td class=" ui-datepicker-week-end ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td>
                            </tr>
                            </tbody>
                        </table>
                        </div>


                        <div class="col-sm-2 set-height">
                            <input type="text" placeholder="Chọn giờ" />
                        </div>
                        <div style="display: none;" class="row border-row" id="thoigianhidden">
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
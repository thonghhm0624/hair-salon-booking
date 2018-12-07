SE.clsReservation = (function() {

    //INIT
    function init(){
        initEvent();
    }

    //PARAMETERS
    let phonenumber = $('#reservation-phonenumber'),
        service = $('#reservation-service'),
        store = $('#reservation-store'),
        stylist = $('#reservation-stylist'),
        date = $('#reservation-date'),
        time = $('#reservation-time'),
        submit = $('#submit-reservation');
    var times_to_be_conflicted = null;

    //EVENTS
    function initEvent()
    {
        phonenumber.change(function () {
            if (isValidPhonenumber(phonenumber.val())) {
                phonenumber.removeClass("failed");
                if (isInformationFilledAll()) {
                    submit.removeAttr('disabled');
                }
            }
            else {
                submit.attr('disabled','disabled');
                phonenumber.addClass("failed");
                phonenumber.focus();
            }
        });

        store.change (function () {
            if (store.val() != null) {
                stylist.attr('disabled','disabled');
                $.ajax({
                    url: window_app.webroot + 'stylistsbybranch',
                    type: 'post',
                    data: {
                        store: store.val(),
                    },
                    success: function (data) {
                        let real_data = JSON.parse(data);
                        if(real_data.status == 1){
                            stylist.empty();
                            let stylists = real_data.data.stylists;
                            let option = '';
                            for(let i = 0; i < stylists.length; i++) {
                                option += '<option value="' + stylists[i].stylist_id + '">' + stylists[i].stylist_name + '</option>';
                            }
                            stylist.append(option);
                            stylist.removeAttr("disabled");
                            store.attr('disabled','disabled');
                        } else {
                            console.log("fail");
                        }
                    }
                });
            }
        });

        stylist.change (function () {
            if (stylist.val() != null) {
                date.removeAttr('disabled');
                stylist.attr('disabled','disabled');
            }
        });

        date.change (function () {
            service.removeAttr('disabled');
            date.attr('disabled','disabled');
        });

        service.change (function () {
            submit.attr('disabled','disabled');
            if (service.val() != null) {
                $.ajax({
                    url: window_app.webroot + 'reservationtimehandler',
                    type: 'post',
                    data: {
                        service: service.val(),
                        store: store.val(),
                        stylist: stylist.val(),
                        date: date.val()
                    },
                    success: function (data) {
                        let real_data = JSON.parse(data);

                        if(real_data.status == 1){
                            let option = "";
                            time.empty();
                            if (real_data.time_conflict == 0) {
                                console.log('No time conflict');
                                times_to_be_conflicted = null;
                                for(let i = 10; i <= 20; i++) {
                                    option += '<option value=' + i + '>' + i + ':00' + '</option>';
                                    time.append(option);
                                    time.removeAttr('disabled');
                                }
                            }
                            else {
                                times_to_be_conflicted = real_data.data.times_to_be_conflicted;
                                console.log(times_to_be_conflicted);
                                for(let i = 10; i <= 20; i++) {
                                    if (checkTimeConflict(times_to_be_conflicted,i))
                                        option += '<option style="color: red" disabled value=' + i + '>' + i + ':00' + '</option>';
                                    else
                                        option += '<option value=' + i + '>' + i + ':00' + '</option>';
                                }
                                time.append(option);
                                time.removeAttr('disabled');
                            }
                        } else {
                            console.log("fail");
                        }
                    }
                });
            }
        });

        time.change (function () {
            if (time.val() != null) {
                // submit.removeAttr('disabled');
                let duration = parseInt($(service).find(":selected").attr('duration'));
                let new_time = parseInt(time.val());
                // let isAnyConflictTime= false;
                // if (times_to_be_conflicted != null) {
                //     for (let i = 1; i <= duration; i++) {
                //         if (checkTimeConflict(times_to_be_conflicted, new_time + i - 1)) {
                //             isAnyConflictTime = true;
                //             alert('Thời gian chọn chưa phù hợp vì stylist này có thể sẽ có khách khác trong lúc này');
                //             break;
                //         }
                //     }
                // }
                // if (isAnyConflictTime)
                //     submit.attr('disabled','disabled');
                // else
                //     submit.removeAttr('disabled');
                $.ajax({
                    url: window_app.webroot + 'reservationtimecheckconflict',
                    type: 'post',
                    data: {
                        stylist: stylist.val(),
                        date: date.val(),
                        duration: duration,
                        new_time: new_time,
                    },
                    success: function (data) {
                        let real_data = JSON.parse(data);

                        if(real_data.status == 1){
                            submit.removeAttr('disabled');
                        }
                        else if (real_data.status == 2) {
                            alert('Thời gian chọn chưa phù hợp vì stylist này có thể đang có khách trong phạm vi thời gian của dịch vụ');
                        }
                        else {
                            submit.removeAttr('disabled');
                        }
                    }
                });
            }
        });
    }

    //FUNCTIONS
    function isValidPhonenumber(value) {
        return (/^\d{10,}$/).test(value.replace(/[\s()+\-\.]|ext/gi, ''));
    }

    function isInformationFilledAll () {
        return (service.val() != null && store.val() != null && stylist.val() != null && time.val() != null);
    }

    function checkTimeConflict (times, time) {
        for (let i = 0; i < times.length; i++) {
            if (time == times[i])
                return true;
        }
        return false;
    }
    //RETURN
    return {
        init:init,
        isValidPhonenumber:isValidPhonenumber,
        isInformationFilledAll:isInformationFilledAll,
        checkTimeConflict:checkTimeConflict
    }
})();


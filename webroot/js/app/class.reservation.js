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



    function initEvent()
    {
        phonenumber.change(function () {
            if (isValidPhonenumber(phonenumber.val())) {
                service.removeAttr('disabled');
                phonenumber.removeClass("failed");
                if (isInformationFilledAll()) {
                    submit.removeAttr('disabled');
                }
            }
            else {
                submit.attr('disabled','disable');
                phonenumber.addClass("failed");
                phonenumber.focus();
            }
        });

        service.change (function () {
            if (service.val() != null) {
                store.removeAttr('disabled');
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
            }
        });

        date.change (function () {
            if (date.val() != null) {
                time.removeAttr('disabled');
            }
        });

        time.change (function () {
            if (time.val() != null) {
                submit.removeAttr('disabled');
            }
        });
    }

    function isValidPhonenumber(value) {
        return (/^\d{10,}$/).test(value.replace(/[\s()+\-\.]|ext/gi, ''));
    }

    function isInformationFilledAll () {
        return (service.val() != null && store.val() != null && stylist.val() != null && time.val() != null);
    }
    //FUNCTIONS

    //RETURN
    return {
        init:init,
        isValidPhonenumber:isValidPhonenumber,
        isInformationFilledAll:isInformationFilledAll
    }
})();


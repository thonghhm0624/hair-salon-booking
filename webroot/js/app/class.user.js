SE.clsUser = (function() {

    //INIT
    function init(){
        initEvent();
    }

    //PARAMETERS
    let login_type = $('#classify'),
        phone = $('#update-info-phonenumber'),
        name = $('#update-info-name'),
        password = $('#update-info-password'),
        submit = $('#submit-user-info'),
        status = $('#update-status');

    //EVENTS
    function initEvent()
    {
        password.change (function () {
            let val = password.val();
            if (val == "" || val == null || val.length < 6) {
                let message = "Mật khẩu mới phải có ít nhất 6 ký tự!";
                status.empty();
                status.append(message);
                submit.attr('disabled','disabled');
                password.focus();
            }
            else {
                submit.removeAttr('disabled');
            }
        });

        submit.click (function (event) {
            event.preventDefault();
            console.log('update info submit clicked!');
            $.ajax({
                url: window_app.webroot + 'updateinfo',
                type: 'post',
                data: {
                    phone: phone.val(),
                    name: name.val(),
                    password: password.val(),
                    type: login_type.val()
                },
                success: function (data) {
                    let real_data = JSON.parse(data);
                    if(real_data.status == 1){
                        console.log('update successfully!');
                    } else {
                        console.log('update failed!');
                    }
                }
            });
        });
    }

    //FUNCTIONS

    //RETURN
    return {
        init:init,

    }
})();


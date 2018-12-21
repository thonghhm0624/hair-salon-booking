SE.clsUser = (function() {

    //INIT
    function init(){
        initEvent();
    }

    //PARAMETERS
    let name = $('#update-info-name'),
        password_new = $('#update-info-password-new'),
        password_retype = $('#update-info-password-retype'),
        name_submit = $('#submit-user-name'),
        password_submit = $('#submit-user-password'),
        status = $('.update-status');

    //EVENTS
    function initEvent()
    {
        password_submit.click (function () {
            event.preventDefault();
            if (isSameString(password_new.val(),password_retype.val())) {
                status.empty();
                $.ajax({
                    url: window_app.webroot + 'update/password',
                    type: 'post',
                    data: {
                        password: password_new.val(),
                    },
                    success: function (data) {
                        let real_data = JSON.parse(data);
                        if(real_data.status == 1){
                            status.append('Thay đổi mật khẩu thành công!');
                            password_new.val("");
                            password_retype.val("");
                        } else {
                            console.log('update failed!');
                        }
                    }
                });
            }
            else {
                status.empty();
                status.append('Mật khẩu mới và nhập lại mật khẩu mới phải giống nhau');
            }
        });

        name_submit.click (function (event) {
            event.preventDefault();
            $.ajax({
                url: window_app.webroot + 'update/name',
                type: 'post',
                data: {
                    name: name.val(),
                },
                success: function (data) {
                    let real_data = JSON.parse(data);
                    if(real_data.status == 1){
                        status.empty();
                        status.append('Thay đổi thông tin thành công!');
                    } else {
                        console.log('update failed!');
                    }
                }
            });
        });
    }

    //FUNCTIONS
    function isSameString (string1,string2) {
        return (string1 === string2);
    }
    //RETURN
    return {
        init:init,

    }
})();


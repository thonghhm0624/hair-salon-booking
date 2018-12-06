import '../sass/all.scss'; // import scss
import 'bootstrap';
import 'jquery';
import 'gsap';
import 'jquery-scrollTo'
import 'jquery-ui';
import 'jquery-datepicker';
import datepickerFactory from 'jquery-datepicker';

require('./app/class.popup');
require('./app/class.reservation');
require('./app/class.user');

datepickerFactory($);
$('#reservation-date').datepicker();

SE.clsPopup.init();
SE.clsReservation.init();
SE.clsUser.init();

$('#login-submit-btn').click(function(event){
    event.preventDefault();
    let phonenumber = $('#login-phonenumber').val();
    let password = $('#login-password').val();
    if(isValidPhonenumber(phonenumber)){
        if(password == null || password == ''){
            alert('Hãy nhập mật khẩu!');
        } else {
            //Ajax login
            $.ajax({
                url: window_app.webroot + 'login',
                type: 'post',
                data: {
                    password: password,
                    phonenumber: phonenumber,
                    login_type: $('input[name=login_type]:checked').val()
                },
                success: function (data) {
                    let real_data = JSON.parse(data);
                    if(real_data.status == 1){
                        location.reload();
                    } else {
                        alert(real_data.message);
                    }
                }
            });
        }
    } else {
        alert('Hãy nhập số điện thoại!');
    }
    //
});

$('#submit-reservation').click(function(event){
    event.preventDefault();

    let phonenumber = $('#reservation-phonenumber').val();
    let store = $('#reservation-store').val();
    let stylist = $('#reservation-stylist').val();
    let service = $('#reservation-service').val();
    let date = $('#reservation-date').val();
    let time = $('#reservation-time').val();

    $.ajax({
        url: window_app.webroot + 'reserve',
        type: 'post',
        data: {
            phonenumber: phonenumber,
            store: store,
            stylist: stylist,
            service: service,
            date: date,
            time: time,
        },
        success: function (data) {
            let real_data = JSON.parse(data);
            if(real_data.status == 1){
                $('.result-success').removeClass('d-none');
                $('.result-fail').addClass('d-none');
                TweenMax.to(('.popup'), .2, { css:{display:'none',opacity:0}} );

            } else {
                $('.result-fail').removeClass('d-none');
                $('.result-success').addClass('d-none');

            }
        }
    });
    //
});

function isValidPhonenumber(value) {
    return (/^\d{10,}$/).test(value.replace(/[\s()+\-\.]|ext/gi, ''));
}

// $('.js-goto').click(function(event){
//     event.preventDefault();
//     var goto = '#' + $(this).attr('goto');

//     $('body').animate(
//         {
//         	scrollTop: $(goto).offset().top
//         },
//         1000
//     );
//     console.log(goto);
// });

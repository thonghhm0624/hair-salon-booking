import '../sass/all.scss'; // import scss
import 'bootstrap';
import 'jquery';
import 'gsap';
import 'jquery-scrollTo'
import 'jquery-ui';

require('./app/class.popup');

SE.clsPopup.init()
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

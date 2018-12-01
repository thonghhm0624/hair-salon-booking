SE.clsPopup = (function() {

  //INIT
  function init(){
    initEvent();
    console.log('clsPopup - init');
  }

    //PARAMETERS
    var popup_login = ".popup.popup-login",
        popup_reservation = ".popup.popup-reservation";

  function initEvent()
  {
    $('.popup-close').click(function(){
      closeAll();
    });

    $('#show-popup-login').click(function () {
      open(popup_login);
    });

    $('#show-popup-resevation').click(function () {
      open(popup_reservation);
    })
  }

  //FUNCTIONS
  function closeAll()
  {
    TweenMax.to(('.popup'), .2, { css:{display:'none',opacity:0}} );
  }

  function open(id)
  {
    closeAll();
    TweenMax.to( $(id), 0.4, { css:{display:'block',opacity:1}} );
  }
  //RETURN
  return {
    init:init,
    closeAll:closeAll,
    open:open
  }
})();


jQuery(document).ready(function($){
  //sticky nav
  window.onscroll = function(){ stickNav(); }
  var headerNav = document.getElementById("header-nav");
  var navbarPosition = headerNav.offsetTop;

  function stickNav(){
    if(window.pageYOffset >= navbarPosition){
      headerNav.classList.add('sticky');
    }
    else{
      headerNav.classList.remove('sticky');
    }
  }

  //home-hero continue
  $('#scroll-down').on('click', function (e) {
    e.preventDefault;
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name="' + this.hash.slice(1) + '"]');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });  
});

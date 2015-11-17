<!--
jQuery(document).ready(function($){

  var lastdistancebottom = 0;
  var lastScrollTop = 0;

  $('#WPScrollBottomRedirect').hide();

  $(window).scroll(function() {

    var scrollTop = $(this).scrollTop();
    var distancebottom = $(document).height() - $(window).height() - $(window).scrollTop();
    var percentage = Math.floor( distancebottom * 100 / $(document).height() );
	

    if (percentage < 25) {
      $('#WPScrollBottomRedirect').stop().fadeIn();
    } else {
      $('#WPScrollBottomRedirect').stop().fadeOut();
    }

    //if near bottom
    if (percentage < 7) {

      if(scrollTop < lastScrollTop) {
        $('#WPScrollBottomRedirectColor').animate({ height: $('#WPScrollBottomRedirectColor').height() - 20 }, 0);
      } else {
        $('#WPScrollBottomRedirectColor').animate({ height: $('#WPScrollBottomRedirectColor').height() + 20 }, 0);
      }

      if(distancebottom<2) {
        $('#WPScrollBottomRedirectColor').animate({ height: '100%' }, 250);
        window.location = parameters.home_url;
      }

      lastScrollTop = scrollTop;

  } else {
    $('#WPScrollBottomRedirectColor').animate({ height: 0 }, 0);
  }

  });

});
//–>

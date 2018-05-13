jQuery(document).ready(function($) {
    "use strict";

    console.log("Script Loaded");
    /* :: NAVIGATION */
    $('a.mobile-menu').on('click', function() { mobileMenuPressed() });
    function mobileMenuPressed(){
    	if ( $('#header-menu').hasClass('open') ) {
    		$('#header-menu').removeClass('open');
    	} else {
    		$('#header-menu').addClass('open');
    	}
    }
    function SetbbNotificationDisplay(show){
        if (show==1){
            $('.bb-notification .notification').each(function( index ) {
                $(this).addClass('is-active');
                new Siema({
                    selector: '.bb-notification',
                    duration: 400,
                    easing: 'ease-out',
                    perPage: 1,
                    startIndex: 0,
                    draggable: true,
                    multipleDrag: false,
                    loop: false,
                    rtl: false
                });
            });
        } else { 
            $('.bb-notification .notification').each(function( index ) {
                $(this).removeClass('is-active');
            });
        }
    }

    /* :: HOMEPAGE */

    SetbbNotificationDisplay(1);

    if ($('#homepage-featured').length) {

        /* :: -> Slider - Style 1 */
        if ($('#homepage-slider1').length) {
            var sliderHeight = $('#homepage-slider1 .slider').height();
            // $('#homepage-slider1 .box-wide').height = sliderHeight/2;
            //console.log( "Height: "+sliderHeight+" Box Wide: "+(sliderHeight/2) );
            $('.slider1-content').bxSlider({
                wrapperClass: 'bx-conggiao',
                nextText: '<i class="fa fa-angle-right"></i>',
                prevText: '<i class="fa fa-angle-left"></i>',
            });
        }
        // END Slider - Style 1
        
        /* :: -> Slider - Style 2 */
        if ($('#homepage-slider2').length) {
            var sliderHeight = $('#homepage-slider2 .slider').height();
            // $('#homepage-slider1 .box-wide').height = sliderHeight/2;
            //console.log( "Height: "+sliderHeight+" Box Wide: "+(sliderHeight/2) );
            $('.slider2-content').bxSlider({
                wrapperClass: 'bx-conggiao',
                nextText: '<i class="fa fa-angle-right"></i>',
                prevText: '<i class="fa fa-angle-left"></i>',
            });
        }
        // END Slider - Style 2

    
    } // END HOMEPAGE FEATURED 

    /* :: CONTENT */
    if ($('#primary').hasClass('content-area')) {
        
        $('.single-content-size a.content-size').on('click', function() { 
            var size = $(this).attr('data-size');
            $('.single-content .content').attr('class', 'content '+size);
        });
        
    }  // END CONTENT

    var btnToTop = $('#gototop');

    $(window).scroll(function() {
      if ($(window).scrollTop() > 300) {
        btnToTop.addClass('show');
      } else {
        btnToTop.removeClass('show');
      }
    });
    $('.bb-notification button.delete').on( 'click', function(e){
        e.preventDefault();
        SetbbNotificationDisplay(0);
    });

    btnToTop.on('click', function(e) {
      e.preventDefault();
      $('html, body').animate({scrollTop:0}, '300');
    });

});
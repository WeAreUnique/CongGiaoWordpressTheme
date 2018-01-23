!function() {
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

    /* :: HOMEPAGE */

    if ($('#homepage-featured').length) {

        /* :: -> Slider - Style 1 */
        if ($('#homepage-slider1').length) {
            var sliderHeight = $('#homepage-slider1 .slider').height();
            // $('#homepage-slider1 .box-wide').height = sliderHeight/2;
            //console.log( "Height: "+sliderHeight+" Box Wide: "+(sliderHeight/2) );
            $('.slider1-content').bxSlider({
                wrapperClass: 'bx-conggiao',
                nextText: '<i class="fas fa-chevron-circle-right"></i>',
                prevText: '<i class="fas fa-chevron-circle-left"></i>',
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
                nextText: '<i class="fas fa-chevron-circle-right"></i>',
                prevText: '<i class="fas fa-chevron-circle-left"></i>',
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
}();
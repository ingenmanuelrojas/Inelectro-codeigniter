"use strict";

window.addEventListener('load', function() {
//------------------------------------------------------------------------
//						NAVBAR SLIDE SCRIPT
//------------------------------------------------------------------------
$(window).scroll(function () {
    if ($(window).scrollTop() > $("nav").height()) {
        $("nav.navbar").addClass("show-menu");
    } else {
        $("nav.navbar").removeClass("show-menu");
        $("nav.navbar .navMenuCollapse").collapse({
            toggle: false
        });
        $("nav.navbar .navMenuCollapse").collapse("hide");
    }
});

//------------------------------------------------------------------------
//						NAVBAR HIDE ON CLICK (COLLAPSED) SCRIPT
//------------------------------------------------------------------------
//$('.navbar li a').on('click', function() {
//    $('.collapse.in').collapse('hide');
//});
//------------------------------------------------------------------------
//                      OFFCANVAS MENU SETTINGS
//------------------------------------------------------------------------
$(".off-canvas-toggle, .off-canvas-overlay").click(function () {
    $("body").toggleClass("off-canvas-active");
});







//------------------------------------------------------------------------
//                    MAGNIFIC POPUP(LIGHTBOX) SETTINGS
//------------------------------------------------------------------------

$('.gallery').each(function () { // the containers for all your galleries
    var $this = $(this);
    $this.magnificPopup({
        delegate: 'a.gallery-box:not(.external)', // the selector for gallery item
        type: 'image',
        gallery: {
            enabled: true
        },
        image: {
            titleSrc: function (item) {
                return item.el.find('span.caption').text();
            }
        },
        callbacks: {
            open: function() {
                $this.trigger('stop.owl.autoplay');
            },
            close: function() {
                $this.trigger('play.owl.autoplay');
            }
        }
    });
});

});

//------------------------------------------------------------------------
//                    TABS
//------------------------------------------------------------------------
$(document).ready(function() {
  
  var $wrapper = $('.tab-wrapper'),
      $allTabs = $wrapper.find('.tab-content > div'),
      $tabMenu = $wrapper.find('.tab-menu li'),
      $line = $('<div class="line"></div>').appendTo($tabMenu);
  
  $allTabs.not(':first-of-type').hide();  
  $tabMenu.filter(':first-of-type').find(':first').width('auto') //cambiar el valor de auto por ('100%')
  
  $tabMenu.each(function(i) {
    $(this).attr('data-tab', 'tab'+i);
  });
  
  $allTabs.each(function(i) {
    $(this).attr('data-tab', 'tab'+i);
  });
  
  $tabMenu.on('click', function() {
    
    var dataTab = $(this).data('tab'),
        $getWrapper = $(this).closest($wrapper);
    
    $getWrapper.find($tabMenu).removeClass('active');
    $(this).addClass('active');
    
    $getWrapper.find('.line').width(0);
    $(this).find($line).animate({'width':'100%'}, 'fast');
    $getWrapper.find($allTabs).hide();
    $getWrapper.find($allTabs).filter('[data-tab='+dataTab+']').show();
  });

});//FIN TAB


$('.project-grid').isotope({
  itemSelector: '.project',
  percentPosition: true,
  masonry: {
    columnWidth: '.grid-sizer',
    
  }
});


window.addEventListener('load', function() {
if (!navigator.userAgent.match(/iPhone|iPad|iPod|Android|BlackBerry|IEMobile/i)) {
	var skr = skrollr.init(
		{
		smoothScrolling: false
		, forceHeight: false
		, mobileDeceleration: 0.004
		}
		);
	}
});

$('.single-iframe-popup').magnificPopup({
	type: 'iframe',
	iframe: {
		patterns: {
			youtube: {
				index: 'www.youtube.com/',
				id: 'v=',
				src: 'https://www.youtube.com/embed/%id%?autoplay=1'
			}
			, vimeo: {
				index: 'vimeo.com/',
				id: '/',
				src: 'https://player.vimeo.com/video/%id%?autoplay=1'
			}
		}
	}
});
$('.single-image-popup').magnificPopup({
	type: 'image'
});



//------------------------------------------------------------------------
//                   REENVIO A SECCION ESPECIFICA
//------------------------------------------------------------------------
$(document).ready(function(){
  // Add smooth scrolling to all links
  $(".alfredo").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
  
});



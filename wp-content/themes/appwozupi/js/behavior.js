// Document Before Unload
/* window.onbeforeunload = function(){
	hidePage();
} */

window.addEventListener('pagehide',function(){
	
});

// Menu Button
jQuery('#nav-btn-main').on('click', function() { 
	if ( !jQuery(this).hasClass('active') ) { 
		clearActiveNav();
		toggleBtn(this);
		toggleNav('#nav-menu-main');
	} else { 
		clearActiveNav();
	}
});

jQuery('#nav-btn-qr, #main-nav-qr').on('click', function() { 
	if ( !jQuery(this).hasClass('active') ) { 
		clearActiveNav();
		toggleBtn('#nav-btn-qr');
		toggleNav('#nav-menu-qr');
	} else { 
		clearActiveNav();
	}
});

jQuery('#nav-btn-list, #main-btn-list, #main-nav-list, #main-nav-start').on('click', function() {
	if ( !jQuery(this).hasClass('active') ) { 
		clearActiveNav();
		toggleBtn('#nav-btn-list');
		toggleNav('#nav-menu-list');
	} else { 
		clearActiveNav();
	}
});

jQuery('#footer-nav a.active').on('click', function() {
	clearActiveNav();
});

/* Toggle Menu */
function toggleNav(a) { 
	jQuery(a).toggleClass('nav-menu-hide');
}

/* Toggle Active Button */
function toggleBtn(a) { 
	jQuery(a).toggleClass('active');
}

function clearActiveNav() { 
	jQuery('#footer-nav a').removeClass('active');
	jQuery('.nav-menu').addClass('nav-menu-hide');
}


jQuery("a.transition-link").on("click", function(){
	
	clearActiveNav();
	var href = jQuery(this).attr("href");

	var animDuration = 600;

	// Do animation here; duration = animDuration.
	console.log("this");
	hidePage();

	setTimeout(function () {
	window.location = href;
	}, animDuration);

	return false; // prevent user navigation away until animation's finished
  
});

function pageLoaded() { 
	jQuery('body').toggleClass('page-loaded');
}

function hidePage() { 
	jQuery('.fade-done').removeClass('fade-done');
	jQuery('#footer-nav').removeClass('show-nav');
	jQuery('#top-header').removeClass('show-top');
	jQuery('#primary').removeClass('show-content');
	pageLoaded();
}

// Function to disable "pull-to-refresh" effect present in some browsers.
window.addEventListener('load', function() {
    var lastTouchY = 0 ;
    var maybePreventPullToRefresh = false ;

    // Pull-to-refresh will only trigger if the scroll begins when the
    // document's Y offset is zero.

    var touchstartHandler = function(e) {
        if( e.touches.length != 1 ) {             
            return ;
        }
        lastTouchY = e.touches[0].clientY ;
        // maybePreventPullToRefresh = (preventPullToRefreshCheckbox.checked) && (window.pageYOffset == 0) ;
        maybePreventPullToRefresh = (window.pageYOffset === 0) ;
        //document.getElementById('txtLog').textContent = "maybePreventPullToRefresh: " + maybePreventPullToRefresh;
    };

    // To suppress pull-to-refresh it is sufficient to preventDefault the
    // first overscrolling touchmove.

    var touchmoveHandler = function(e) {
        var touchY = e.touches[0].clientY ;
        var touchYDelta = touchY - lastTouchY ;
        lastTouchY = touchY ;

        if (maybePreventPullToRefresh) {
            maybePreventPullToRefresh = false ;
            //if (touchYDelta > 0) {
                e.preventDefault() ;
                //document.getElementById('txtLog').textContent = "TouchY: " + touchYDelta;
                // console.log("pull-to-refresh event detected") ;
                return ;
            //}
        }

    };
	
	var ignore = document.querySelector('.apple-scroll');
	
    document.addEventListener('touchstart', touchstartHandler, false) ;
    document.addEventListener('touchmove', touchmoveHandler, false) ;
	
	/* ignore.addEventListener('touchstart',function(e) {
		e.stopPropagation();
	}, true); */
	
	ignore.addEventListener('touchmove',function(e) {
		e.stopPropagation();
	}, true);
	
}) ;

function openQRCamera(node) {
  var reader = new FileReader();  
  reader.onload = function() {
	jQuery( ".loading" ).addClass( "show" );
	node.value = "";
	qrcode.callback = function(res) {
	  if(res instanceof Error) {
		alert("No QR code found. Please make sure the QR code is within the camera's frame and try again.");
		jQuery( ".loading" ).removeClass( "show" );
	  } else {
		jQuery( ".loading" ).addClass( "show" );
		node.parentNode.previousElementSibling.value = res;
		// similar behavior as clicking on a link
		window.location.href = res;
	  }
	};
	qrcode.decode(reader.result);
  };
  reader.readAsDataURL(node.files[0]);
}

function pollFunc(fn, timeout, interval) {
    var startTime = (new Date()).getTime();
    interval = interval || 1000;

    (function p() {
        fn();
        if (((new Date).getTime() - startTime ) <= timeout)  {
            setTimeout(p, interval);
        }
    })();
}

// Document Ready
jQuery(document).ready(function(){
	
	//document.documentElement.requestFullscreen();

	browserCheck();
	gridResize();
	pageLoaded();
	pollFunc(contentHeight, 1000, 1000);
	
	jQuery( ".scan-button" ).click(function() {
	  jQuery( ".qrcode-text-btn" ).trigger( "click" );
	});
	
	// Detect when everything is done loading
	jQuery(window).on("load", function() {
		slimMenu();	
		showTopHeader();
		showContent();
		showFooterNav();
		
	});
	
	// Menu Button
	jQuery('#nav-icon').on('click', function() { 
		toggleMenu();
	});
	
	// Search Button
	jQuery('#search-icon').on('click', function() { 
		toggleSearch();
	});
	
	// Mark which button active based on URL
	jQuery(function() {
		jQuery('#footer-nav a[href^="/' + location.pathname.split("/")[1] + '"]').addClass('active');
	});
	
	// Disable button if current page
	jQuery("a").each(function(){
	   if(window.location.href==this.href)
		 this.onclick=function(){return false};
	});
	
	// Trigger plant gallery
	jQuery( "#plant-images" ).click(function() {
	  jQuery( ".plant-slider #first-image" ).trigger( "click" );
	});
	
	// Plant gallery popup
	jQuery('#plant-images').magnificPopup({
		delegate: '.plant-slider a',
		type: 'image',
		tLoading: 'Loading image #%curr%...',
		mainClass: 'mfp-img-mobile',
		removalDelay: 300,
		gallery: {
			enabled: true,
			navigateByImgClick: true,
			preload: [1,1] // Will preload 0 - before current, and 1 after the current image
		}
	});

});
// END Document Ready

//Resize Events
var insidewidth = jQuery(window).innerWidth(); 
jQuery(window).on('resize', function(){  
   if (jQuery(window).innerWidth()==insidewidth) return; 
   insidewidth = jQuery(window).innerWidth();
   
   closeMenu();
   closeSearch();
   gridResize();
   pollFunc(contentHeight, 1000, 1000);
   
   
   // At 770 Real Width 
   if ((insidewidth > 753  )) {

   } else { 

   }
  	  
});
// END Resize Events


// Scroll Events
jQuery(window).scroll(function (event) {
    
    slimMenu();
	
	var scroll = jQuery(window).scrollTop();
	
	// Check if scrolled to top
	if ( scroll != 0 ) { 
		jQuery('body').addClass('not-top');
	} else { 
		jQuery('body').removeClass('not-top');
	}
});
// END Scroll Events

// Functions

/* Content Height */	
function contentHeight() {
	console.log('resizing');
	vpw = jQuery(window).width();
	vph = jQuery(window).height();
	fnh = jQuery('.footer-btn').height();
	fnw = jQuery('#footer-nav').width();
	
	if ( vpw < vph ) { 
		jQuery('#content-inner').css({'height': vph - fnh + 'px'});
		jQuery('#content-inner').css({'width': 100 + '%'});
	}
	
	if ( vpw > vph ) {
		jQuery('#content-inner').css({'height': 100 + '%'});
		jQuery('#content-inner').css({'width': vpw - fnw + 'px'});
	}
	setTimeout(function(){
		gridResize();
	},500);
}

function showTopHeader() {
	jQuery('#top-header').addClass('show-top');
}

function showContent() {
	jQuery('#primary').addClass('show-content');
}

function showFooterNav() {
	jQuery('#footer-nav').addClass('show-nav');
}

/* Match Height */
function gridResize() { 	
	// Get an array of all element heights
	jQuery('.match-height .match-item').removeAttr('style');
	var elementHeights = jQuery('.match-height .match-item').map(function() {
		return jQuery(this).width();
	}).get();
	
	// Math.max takes a variable number of arguments
	// `apply` is equivalent to passing each height as an argument
	var maxHeight = Math.max.apply(null, elementHeights);
	
	// Set each height to the max height
	jQuery('.match-height .match-item').height(maxHeight);
}


/* Slim Menu */
function slimMenu() { 
	var toTheTop = jQuery(window).scrollTop();
	if (toTheTop > 55) {
		jQuery('#header-top').addClass('condensed');
	} else {
		jQuery('#header-top').removeClass('condensed');
	}
}

/* Close Menu */
function closeMenu() {
	jQuery('#nav-icon, .top-navigation').removeClass('active');
	jQuery('#header-top').removeClass('menu-open');
}

/* Toggle Menu */
function toggleMenu() { 
	jQuery('#nav-icon, .top-navigation').toggleClass('active');
	jQuery('#header-top').toggleClass('menu-open');
}

/* Toggle Search */
function closeSearch() { 
	jQuery('#top-search').slideUp("fast","swing", function(){
		//What to do on toggle complete...
	});
}

/* Toggle Search */
function toggleSearch() { 
	jQuery('#top-search').slideToggle("fast","swing", function(){
		//What to do on toggle complete...
	});
}


/* Browser Detection */
function browserCheck() { 
	console.log(navigator.userAgent);
	var android = /Android/i.test(navigator.userAgent);
	var ios = /iPad|iPhone|iPod/i.test(navigator.userAgent);
	var chromeiOS = /CriOS/i.test(navigator.userAgent);
	var windowsphone = /windows phone/i.test(navigator.userAgent);
	var chrome = /chrome/i.test(navigator.userAgent);
	var firefox = /firefox/i.test(navigator.userAgent);
	var safari = /safari/i.test(navigator.userAgent);
	var opera = /OPR/i.test(navigator.userAgent);
	var trident = /trident/i.test(navigator.userAgent); // IE string should include trident
	var msie = /msie/i.test(navigator.userAgent); // IE10 and below
	// Android
	if ( android == true ) { 
		//console.log("Chrome Test: " + chrome);
		jQuery('body').addClass('android');
		jQuery('body').addClass('mobile-device');
		jQuery('body').addClass('not-msie');
	}
	// Chrome
	if ( ios == true ) { 
		//console.log("Chrome Test: " + chrome);
		jQuery('body').addClass('ios');
		jQuery('body').addClass('mobile-device');
		jQuery('body').addClass('not-msie');
	}
	// Chrome IOS
	if ( chromeiOS == true ) { 
		//console.log("Chrome Test: " + chrome);
		jQuery('body').addClass('chromeiOS');
		jQuery('body').addClass('mobile-device');
		jQuery('body').addClass('not-msie');
	}
	// Windows Phone
	if ( windowsphone == true ) { 
		//console.log("Chrome Test: " + chrome);
		jQuery('body').addClass('windowsphone');
		jQuery('body').addClass('mobile-device');
		jQuery('body').addClass('not-msie');
	}
	// Desktop
	if ( android == false && ios == false && windowsphone == false ) { 
		//console.log("Chrome Test: " + chrome);
		jQuery('body').addClass('desktop');
	}
	// Chrome
	if ( chrome == true && opera == false ) { 
		//console.log("Chrome Test: " + chrome);
		jQuery('body').addClass('chrome');
		jQuery('body').addClass('not-msie');
	}
	// Firefox
	if ( firefox == true ) { 
		//console.log("Firefox Test: " + firefox);
		jQuery('body').addClass('firefox');
		jQuery('body').addClass('not-msie');
	}
	// Safari
	if ( safari == true && chrome == false && opera == false ) { 
		//console.log("Safari Test: " + safari);
		jQuery('body').addClass('safari');
		jQuery('body').addClass('not-msie');
	}
	// Opera
	if ( opera == true ) { 
		//console.log("Opera Test: " + opera);
		jQuery('body').addClass('opera');
		jQuery('body').addClass('not-msie');
	}
	// IE
	if ( trident == true && msie == true ) { 
		//console.log("IE10 & Lower Test: " + msie);
		jQuery('body').addClass('msie');
	} else if ( trident == true) {
		//console.log("IE11 Test: " + trident);
		jQuery('body').addClass('ie-11');
	} 
}
/* END Browser Detection */
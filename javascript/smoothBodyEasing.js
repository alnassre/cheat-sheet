(function($) {
	
	// Depency on Jquery + http://gsgd.co.uk/sandbox/jquery/easing/jquery.easing.1.3.js [Must Include]
	 
	if (window.addEventListener) window.addEventListener('DOMMouseScroll', wheel, false);
	window.onmousewheel = document.onmousewheel = wheel;
	 
	function wheel(event) {
	    var delta = 0;
	    if (event.wheelDelta) delta = event.wheelDelta / 50;
	    else if (event.detail) delta = -event.detail / 3;
	 
	    handle(delta);
	    if (event.preventDefault) event.preventDefault();
	    event.returnValue = false;
	}
	 
	function handle(delta) {
	    var time = 500; // delay time
	    var distance = 300; // delta point 
	    // Dom where it will apply 
	    $('html, body').stop().animate({
	        scrollTop: $(window).scrollTop() - (distance * delta)
	    }, time );
	}
    
})(jQuery); // End of use strict

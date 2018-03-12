/**
 *
 * Dependencies: $
 *
 */

//$.noConflict(); 
 
(function($) {
	$(function() { 
		$("#scroller").simplyScroll();
	});
});

$(document).ready(function($) {
	
$(document).load().scrollTop(0);
		/*
		* Fix dropdown menu bootstrap error 
		* ------------------------------------------------- */

		$('.nav').find('li:has(ul)').addClass('dropdown');
		$('.dropdown > a').addClass('dropdown-toggle disabled');
		$('li.dropdown').children('ul.sub-menu').addClass('dropdown-menu');
		
		/*
		* Fix dropdown menu bootstrap error ends
		* --------------------------------------------------------- */	

    $('.dropdown .sub-menu').addClass('dropdown-menu');	
});

$(document).ready(function($) {
    $('.dropdown > a').append('<b class="caret"></b>').dropdown();
    $('.dropdown .sub-menu').addClass('dropdown-menu');
});


$(document).ready(function($) {
  
	$("#tabnav").idTabs(); 	
 
});

/* Swipe menu initial js */
$(document).ready(function($) { 
	$('#responsive-menu-button').sidr({
		name: 'sidr-right',
		speed: 50,
		side: 'right',
		source: '#swipe-menu-responsive'	
	});
}); 
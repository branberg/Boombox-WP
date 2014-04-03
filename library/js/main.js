/***********************************************************

FUNCTIONS

1 - keepSquare
2- mobileMenu
3 - autoMenuLayout

***********************************************************/

(function ($) {

	// 1 - keepSquare
	// helps keep the album sections square and responsive
	$.fn.keepSquare = function(){
		var elementWidth = this.width();
		this.height(elementWidth);
		return this;
	};

	// 2 - mobileMenu
	// creates some mobile menu markup from the main menu links
	$.fn.mobileMenu = function(){
		var menu = this.html();
		$('body').prepend('<div id="mobile_menu">'+menu+'</div>');
		return this;
	};

	// 3 - autoMenuLayout
	// Aligns the menu based on the display of the menu links and social icons
	$.fn.autoMenuLayout = function(){
		var headerNav = this;
		var textMenu = headerNav.find('#menu_links');
		var socialMenu = headerNav.find('#social_links');
		if( textMenu.length > 0 && socialMenu.length > 0 ){
			headerNav.addClass('justified_menus');
		} else {
			headerNav.addClass('centered_menus');
		}
	};

}(jQuery));



jQuery(document).ready(function($) {

	var windowWidth = $(window).width();

	/****************************************************************
	Conditional Menu based on content
	****************************************************************/
	$('#header_nav').autoMenuLayout();

	/****************************************************************
	Build mobile menu
	****************************************************************/
	$('#header_nav').mobileMenu();

	/****************************************************************
	Animate the menu stuff
	****************************************************************/
	var rightOffset = windowWidth - 60;

	$('#mobile_menu_toggle').click(function(){

		if( $('#mobile_menu_toggle').hasClass('expanded') ) {
			
			$('#site_wrap, #mobile_header').animate({
				right: 0
			}, {
				duration: 120,
				specialEasing: "swing"
			});

			$('#mobile_menu_toggle').removeClass('expanded');
			
		} else {
			
			$('#site_wrap, #mobile_header').animate({
				right: -rightOffset
			}, {
				duration: 120,
				specialEasing: "swing"
			});

			$('#mobile_menu_toggle').addClass('expanded');
			
		}
		
		return false;

	});

	/*************************************************************************
	Keep Album dimensions equal no matter what
	*************************************************************************/
	$('.soundcloud_embed').keepSquare();
	if( windowWidth > 768 ){
		$('.album_info_wrapper').keepSquare();
	}
	$(window).resize(function(){
		var windowWidth = $(window).width();
		$('.soundcloud_embed').keepSquare();
		if( windowWidth > 768 ){
			$('.album_info_wrapper').keepSquare();
		} else {
			$('.album_info_wrapper').height('auto');
		}
	});

	/*************************************************************************
	Make video embeds responsive - Youtube, vimeo
	*************************************************************************/
	$(".video_embed").fitVids();


	/*************************************************************************
	LIGHTBOX FOR PHOTOS
	*************************************************************************/
	if( windowWidth < 768 ) {
		$('a.lightbox').swipebox();
	} else {
		$('a.lightbox').nivoLightbox();
	}

});
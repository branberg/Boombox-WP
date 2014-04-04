/***********************************************************

FUNCTIONS

1 - keepSquare
2- mobileMenu
3 - autoMenuLayout

***********************************************************/(function(e){e.fn.keepSquare=function(){var e=this.width();this.height(e);return this};e.fn.mobileMenu=function(){var t=this.html();e("body").prepend('<div id="mobile_menu">'+t+"</div>");return this};e.fn.autoMenuLayout=function(){var e=this,t=e.find("#menu_links"),n=e.find("#social_links");t.length>0&&n.length>0?e.addClass("justified_menus"):e.addClass("centered_menus")}})(jQuery);jQuery(document).ready(function(e){var t=e(window).width();e("#header_nav").autoMenuLayout();e("#header_nav").mobileMenu();e("#mobile_menu_toggle").click(function(){var t=e(window).width(),n=t-60;if(e("#mobile_menu_toggle").hasClass("expanded")){e("#site_wrap, #mobile_header").animate({right:0},{duration:120,specialEasing:"swing"});e("#mobile_menu_toggle").removeClass("expanded")}else{e("#site_wrap, #mobile_header").animate({right:-n},{duration:120,specialEasing:"swing"});e("#mobile_menu_toggle").addClass("expanded")}return!1});e(".soundcloud_embed").keepSquare();t>768&&e(".album_info_wrapper").keepSquare();e(window).resize(function(){var t=e(window).width();e(".soundcloud_embed").keepSquare();t>768?e(".album_info_wrapper").keepSquare():e(".album_info_wrapper").height("auto")});e(".video_embed").fitVids();t<768?e("a.lightbox").swipebox():e("a.lightbox").nivoLightbox()});
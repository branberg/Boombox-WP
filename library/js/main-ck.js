/***********************************************************

FUNCTIONS

1 - keepSquare
2- mobileMenu
3 - autoMenuLayout

***********************************************************/(function(e){e.fn.keepSquare=function(){var e=this.width();this.height(e);return this};e.fn.mobileMenu=function(){var t=this.html();e("body").prepend('<div id="mobile_menu">'+t+"</div>");return this};e.fn.autoMenuLayout=function(){var e=this,t=e.find("#menu_links"),n=e.find("#social_links");t.length>0&&n.length>0?e.addClass("justified_menus"):e.addClass("centered_menus")}})(jQuery);jQuery(document).ready(function(e){var t=e(window).width();e("#header_nav").autoMenuLayout();e("#header_nav").mobileMenu();e("#mobile_menu_toggle").click(function(){var t=e(window).width(),n=t-60;if(e("#mobile_menu_toggle").hasClass("expanded")){e("#site_wrap, #mobile_header").animate({right:0},{duration:120,specialEasing:"swing"});e("#mobile_menu_toggle").removeClass("expanded")}else{e("#site_wrap, #mobile_header").animate({right:-n},{duration:120,specialEasing:"swing"});e("#mobile_menu_toggle").addClass("expanded")}return!1});e(".soundcloud_embed").keepSquare();t>768&&e(".album_info_wrapper").keepSquare();e(window).resize(function(){var t=e(window).width();e(".soundcloud_embed").keepSquare();t>768?e(".album_info_wrapper").keepSquare():e(".album_info_wrapper").height("auto")});e(window).load(function(){e(".album").each(function(){var n=e(this),r=40,i=40,s=n.find(".album_info_wrapper").outerHeight(),o=n.find(".album_type").outerHeight(),u=n.find(".album_title").outerHeight(),a=n.find(".album_button").outerHeight(),f=s-(o+u+a+r*2+i);if(t>768){n.find(".album_description").height(f);f<n.find(".album_description p").height()&&n.find(".album_description p").css("padding-right",20)}})});e(window).resize(function(){var t=e(window).width();e(".album").each(function(){var n=e(this),r=40,i=40,s=n.find(".album_info_wrapper").outerHeight(),o=n.find(".album_type").outerHeight(),u=n.find(".album_title").outerHeight(),a=n.find(".album_button").outerHeight(),f=s-(o+u+a+r*2+i);if(t>768){n.find(".album_description").height(f);f<n.find(".album_description p").height()&&n.find(".album_description p").css("padding-right",20)}else{n.find(".album_description").height("auto");n.find(".album_description p").css("padding-right",0)}})});e(".video_embed").fitVids();t<768?e("a.lightbox").swipebox():e("a.lightbox").nivoLightbox()});
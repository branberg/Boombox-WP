/***********************************************************

FUNCTIONS

1 - keepSquare
2 - mobileMenu
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
  $('#mobile_menu_toggle').click(function(){

    var windowWidth = $(window).width();
    var rightOffset = windowWidth - 60;

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
    //set main album info to square dimensions
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
  Allow album descriptions to be longer and scroll rather than get cut off
  *************************************************************************/
  //do things initial on window load
  $(window).load(function(){

    $('.album').each(function(){

      //set variables
      var album = $(this);
      var albumPadding = 40;
      var extraSpacing = 40;
      var albumHeight = album.find('.album_info_wrapper').outerHeight();
      var typeHeight = album.find('.album_type').outerHeight();
      var titleHeight = album.find('.album_title').outerHeight();
      var buttonHeight = album.find('.album_button').outerHeight();

      //do math to find height value needed
      var descriptionHeight = albumHeight - ( typeHeight + titleHeight + buttonHeight + ( albumPadding * 2 ) + extraSpacing );

      if( windowWidth > 768 ){

        //set initial load height of description
        album.find('.album_description').height(descriptionHeight);

        //if the content is being scrolled, add some padding to it so the text doesn't touch the scroll bars
        if( descriptionHeight < album.find('.album_description p').height() ){
          album.find('.album_description p').css('padding-right', 20);
        }

      }

    });

  });

  $(window).resize(function(){

    //set window width to be a dynamic variable as screen is resized
    var windowWidth = $(window).width();

    $('.album').each(function(){

      //set variables
      var album = $(this);
      var albumPadding = 40;
      var extraSpacing = 40;
      var albumHeight = album.find('.album_info_wrapper').outerHeight();
      var typeHeight = album.find('.album_type').outerHeight();
      var titleHeight = album.find('.album_title').outerHeight();
      var buttonHeight = album.find('.album_button').outerHeight();

      //do math to find height value needed
      var descriptionHeight = albumHeight - ( typeHeight + titleHeight + buttonHeight + ( albumPadding * 2 ) + extraSpacing );

      if( windowWidth > 768 ){

        //set initial load height of description
        album.find('.album_description').height(descriptionHeight);

        //if the content is being scrolled, add some padding to it so the text doesn't touch the scroll bars
        if( descriptionHeight < album.find('.album_description p').height() ){
          album.find('.album_description p').css('padding-right', 20);
        }

      } else {

        // if smaller than 768, reset the vales back to normal to no scrollign happens
        album.find('.album_description').height('auto');
        album.find('.album_description p').css('padding-right', 0);

      }

    });

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

  /****************************************************************
  Keep homepage full height
  ****************************************************************/
  $(window).load(function(){

    var windowHeight = $(window).height();
    var pageHeight = $('#site_wrap').outerHeight();

    //set site_wrap height to window height if site_wrap is smaller
    if( pageHeight < windowHeight ){
      $('#site_wrap').height(windowHeight);
    }

  });

});

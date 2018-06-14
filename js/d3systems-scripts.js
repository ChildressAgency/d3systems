jQuery(document).ready(function($){
  //var headerNav = document.getElementById("header-nav");
  var $headerNav = $('#header-nav');
  var $stickyNav = $('.sticky-nav');
  var headerNavHeight, stickyNavHeight, headerOffset;

  var $window = $(window);

  function setNavHeightAndOffset(){
    headerNavHeight = $headerNav.outerHeight(true);
    stickyNavHeight = $stickyNav.outerHeight(true);

    headerOffset = headerNavHeight + stickyNavHeight;
  }
  setNavHeightAndOffset();
  $window.on('resize', function(){ setNavHeightAndOffset(); });

  //sticky nav
  $window.on('scroll', function(){
    var navbarPosition = $headerNav.offset().top;

    if($window.scrollTop() >= navbarPosition){
      $headerNav.addClass('sticky');
    }
    else{
      $headerNav.removeClass('sticky');
    }
  });

  $('#navbar .dropdown').hover(function(){
    $(this).addClass('open');
  }, function(){
    $(this).removeClass('open');
  });

  if($(window.location.hash).length){
    //$('html,body').animate({
    //  scrollTop:$(window.location.hash).offset().top - headerOffset
    //});

    $('html, body').hide();
    setTimeout(function(){
      $('html, body').scrollTop(0).show();
      $('html, body').animate({
        scrollTop: $(window.location.hash).offset().top - headerOffset
      }, 1000)
    }, 0);
  }

  //smooth scroll anchors
  $('.smooth-scroll').on('click', function (e) {
    e.preventDefault;
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name="' + this.hash.slice(1) + '"]');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top - headerOffset
        }, 1000);
        return false;
      }
    }
  }); 
  
  //grid functions
  $('[href="#"]').on('click', function(e){
    e.preventDefault();
  });
  
  $('#staff_grid').revealer();
  $('#subsidiaries_grid').revealer();

  var $filters = $('#filter-nav').on('click', '.filter', function(e){
    var $filter = $(this).data('filter');
    $('#filter-nav li').removeClass('active');
    $(this).parent().addClass('active');

    $('#staff_grid>.grid-item').fadeOut(400);

    if($filter == '.all'){
      $('#staff_grid>.grid-item').each(function(){
        $(this).fadeIn(400);
      });
    }
    else{
      $('#staff_grid>' + $filter).each(function(){
        $(this).fadeIn(400);
      });
    }
    $filters.removeClass('active');
    $(this).addClass('active');
  });
  //end grid functions

  //affix settings on global reach and our process pages 
  
  var $globalReachNav = $('#global-reach-nav'),
      $globalReachContent = $('.global-reach-content'),
      $pageNavs = $('#page-navs');

  var heroHeight, globalReachNavHeight, pageNavsHeight, superFooterHeight, footerHeight, sidebarHeight;
  var $designsSidebar, $dataSidebar, $decisionsSidebar, designsMainHeight, dataMainHeight, decisionsMainHeight;
  var designsSidebarHeight, dataSidebarHeight, decisionsSidebarHeight;

  function setAffixHeightsAndOffsets(){
    heroHeight = $('.hero').outerHeight(true);
    //globalReachNavHeight = $globalReachNav.outerHeight(true);
    pageNavsHeight = $pageNavs.outerHeight(true);
    
    superFooterHeight = $('#super-footer').outerHeight(true);
    footerHeight = $('#footer').outerHeight(true);

    sidebarHeight = $globalReachContent.outerHeight(true);

    $globalReachContent.css({ 'min-height' : sidebarHeight + 80 });

    $designsSidebar = $('#designs .our-process-sidebar2');
    $dataSidebar = $('#data .our-process-sidebar2');
    $decisionsSidebar = $('#decisions .our-process-sidebar2');

    designsMainHeight = $('#designs-main').outerHeight(true);
    dataMainHeight = $('#data-main').outerHeight(true);
    decisionsMainHeight = $('#decisions-main').outerHeight(true);

    designsSidebarHeight = $designsSidebar.outerHeight(true);
    dataSidebarHeight = $dataSidebar.outerHeight(true);
    decisionsSidebarHeight = $decisionsSidebar.outerHeight(true);
  }

  setAffixHeightsAndOffsets();
  $window.on('resize', function(){ setAffixHeightsAndOffsets(); });
  
  /*$globalReachNav.on('affix.bs.affix', function () {
    $(this).css({ 'top': headerNavHeight });
    $(this).next().css({ 'margin-top': globalReachNavHeight + 40 });//40 for the padding
  });
  $globalReachNav.on('affix-top.bs.affix', function () {
    $(this).next().css({ 'margin-top': 0 });
  });
  $globalReachNav.affix({
    offset:{
      top: function(){
        return heroHeight - headerNavHeight;
      }
    }
  });*/

  $pageNavs.on('affix.bs.affix', function () {
    $(this).css({ 'top': headerNavHeight });
    $(this).next().css({ 'margin-top': pageNavsHeight + 40 });
  });
  $pageNavs.on('affix-top.bs.affix', function () {
    $(this).next().css({ 'margin-top': 0 });
  });
  $pageNavs.affix({
    offset:{
      top: function(){
        return heroHeight - headerNavHeight;
      }
    }
  });

  var $ourWorkNav = $('#our-work-nav');
  $ourWorkNav.on('affix.bs.affix', function(){
    $(this).css({ 'top' : headerNavHeight});
  });
  $ourWorkNav.affix({
    offset:{
      top: function(){
        return heroHeight - headerNavHeight;
      }
    }
  });

  //our-process-affix
/*
  $designsSidebar.on('affix.bs.affix', function(){
    $(this).css({ 'top' : headerOffset + 40 });
  });
  $designsSidebar.affix({
    offset:{
      top: function(){
        return heroHeight - headerOffset +40;
      },
      bottom: function(){
        return this.bottom = footerHeight + superFooterHeight  + decisionsSidebarHeight + dataMainHeight + headerOffset + 80;
        //return this.bottom = footerHeight + superFooterHeight + decisionsSidebarHeight + dataSidebarHeight + headerOffset;
      }
    }
  });

  $dataSidebar.on('affix.bs.affix', function(){
    $(this).css({ 'top' : headerOffset + 40 });
  });
  console.log(designsMainHeight + ', ' + heroHeight + ', ' + stickyNavHeight + ', ' + headerNavHeight);
  console.log($('#data-main').offset().top);
  $dataSidebar.affix({
    offset:{
      top: function(){
        return designsMainHeight + heroHeight + stickyNavHeight - headerNavHeight +80;
      },
      bottom: function(){
        return this.bottom = footerHeight + superFooterHeight + decisionsSidebarHeight + 80;
        //return this.bottom = footerHeight + superFooterHeight + decisionsSidebarHeight + headerOffset;
      }
    }
  });

  $decisionsSidebar.on('affix.bs.affix', function(){
    $(this).css({ 'top' : headerOffset + 40});
  });
  $decisionsSidebar.affix({
    offset:{
      top: function(){
        return designsMainHeight + dataMainHeight + heroHeight + stickyNavHeight - headerNavHeight +80;
      },
      bottom: function(){
        return this.bottom = footerHeight + superFooterHeight + 80;
      }
    }
  });
*/ 
  /*$('#our-process-sidebar').affix({
    offset:{
      top: function(){
        var windowTop = $('.nav-sidebar').offset().top;
        var topMargins = parseInt($('.nav-sidebar').children(0).css("margin-top"), 10);

        return this.top = windowTop - topMargins - headerNavHeight - pageNavsHeight -20;
      },
      bottom: function(){
        return this.bottom = footerHeight + superFooterHeight +40;
      }
    }
  }).on('affix.bs.affix', function(){
    $(this).css({'top':headerNavHeight + pageNavsHeight + 40});
  });*/


  //https://stackoverflow.com/questions/44688708/how-to-create-the-parallax-effect-in-2-uneven-columns-so-they-end-even-at-the-en

  if($('.parallax-scroll').length){
    var $sidebar = $('#left'),
        sidebarHeight = $sidebar.outerHeight(true);
    var $mainContent = $('#right'),
        mainContentHeight = $mainContent.outerHeight(true);
    var $tallColumn, $shortColumn, tallColumnHeight, shortColumnHeight;

    $window.on("load resize scroll", function (e) {
      if(sidebarHeight > mainContentHeight){
        $tallColumn = $sidebar;
        tallColumnHeight = sidebarHeight;

        $shortColumn = $mainContent;
        shortColumnHeight = mainContentHeight;
      }
      else{
        $tallColumn = $mainContent;
        tallColumnHeight = mainContentHeight;

        $shortColumn = $sidebar;
        shortColumnHeight = sidebarHeight;
      }
      var travel = tallColumnHeight - shortColumnHeight;
      
      //top of columns
      var topOfColumns = $('.parallax').offset().top - headerNavHeight - stickyNavHeight;
      var columns = $('.parallax').outerHeight() - $window.innerHeight() + headerOffset;
      var scrollInterval = columns / travel;

      //where the magic happens
      var a = Math.round(($window.scrollTop() - topOfColumns) / scrollInterval);
      //find the bottom of the right column and give a Bool (true)
      var b = $window.scrollTop() >= $shortColumn.offset().top + shortColumnHeight - $window.innerHeight();

      //if the user scrolls to the top of the columns and the user has not scrolled to the bottom of the right column
      if ($window.scrollTop() >= topOfColumns && b === false) {
        $shortColumn.css({
          "-webkit-transform": "translate3d(0px, " + a + "px, 0px)",
          "-moz-transform": "translate3d(0px, " + a + "px, 0px)",
          "-ms-transform": "translateY(" + a + "px)",
          "-o-transform": "translate3d(0px, " + a + "px, 0px)",
          transform: "translate3d(0px, " + a + "px, 0px)"
        });
      }
    });
  }

  //end affix settings

  //scroll indicator on our-process page

  //https://medium.com/talk-like/detecting-if-an-element-is-in-the-viewport-jquery-a6a4405a3ea2
  $.fn.isInViewport = function(){
    var elementTop = $(this).offset().top;
    var elementBottom = elementTop + $(this).outerHeight();

    var viewportTop = $window.scrollTop();
    var viewportBottom = viewportTop + $window.height();

    return elementBottom > (viewportTop + headerOffset) && elementTop < (viewportTop + headerOffset);
  }

  $window.on('resize scroll', function(){
    /*$('.sidebar-sub-section').each(function(){
      var $self = $(this);
      var processSection = $(this).data('process_section');
      
      if($('#' + processSection).isInViewport()){
        $($self).find('.sidebar-section-content').slideDown();
        $($self).find('.sidebar-section-title').removeClass('process-notshown');
      }
      else{
        $($self).find('.sidebar-section-content').slideUp();
        $($self).find('.sidebar-section-title').addClass('process-notshown');
      }
    });*/

    $('.main-section').each(function(){
      var $mainSection = $(this);
      var $mainSectionId = $mainSection.attr('id');
      var elementTop = $mainSection.offset().top;
      var viewportTop = $window.scrollTop();

      if(elementTop < (viewportTop + headerOffset)){
        $('#sub-progress>ul').find('[href="#' + $mainSectionId + '"]').addClass('show-progress');
      }
      else{
        $('#sub-progress>ul').find('[href="#' + $mainSectionId + '"]').removeClass('show-progress');
      }
    });
  });

  //carousel progress bar
  var percent = 0,
      bar = $('.carousel-progress-bar'),
      heroCarousel = $('#hero-carousel');

  function carouselProgressBar(){
    bar.css({ 'width' : percent + "%" });
    percent = percent + 0.5;

    if(percent>100){
      percent = 0;
      heroCarousel.carousel('next');
    }
  }

  heroCarousel.carousel({
    interval:false,
    pause:true
  }).on('slid.bs.carousel', function(){});

  var barInterval = setInterval(carouselProgressBar, 30);
  heroCarousel.hover(
    function(){
      clearInterval(barInterval);
    },
    function(){
      barInterval = setInterval(carouselProgressBar, 30);
    }
  );

  $('.globe-wrapper g').on('click', function(){
    var $pageName = $(this).attr('id');
    var urlBase = location.href.substring(0, location.href.lastIndexOf('/')+1);
    var newLocation = urlBase + $pageName;
    window.location = newLocation;
  });

  if($('#d3-contact-form').length){
    var checkedField = $('input[name="subject"]:checked', '#d3-contact-form').val();
    $('#to-field').text(setToField(checkedField));
  }
  $('#d3-contact-form input[name="subject"]').on('change', function(){
    var checkedField = $(this).val();
    $('#to-field').text(setToField(checkedField));
  });

  function setToField(checkedField){
    switch(checkedField){
      case 'Partner With Us':
        return 'To: Research';
      break;
      case 'Request a Proposal':
        return 'To: General Information';
      break;
      case 'Recruiting Inquiry':
        return 'To: Human Resources';
      break;
      case 'Other':
        return 'To: General Information';
      break;
    }
  }

}); // end document ready

/*
* debouncedresize: special jQuery event that happens once after a window resize
*
* latest version and complete README available on Github:
* https://github.com/louisremi/jquery-smartresize/blob/master/jquery.debouncedresize.js
*
* Copyright 2011 @louis_remi
* Licensed under the MIT license.
*/
var $event = $.event,
  $special,
  resizeTimeout;

$special = $event.special.debouncedresize = {
  setup: function () {
    $(this).on("resize", $special.handler);
  },
  teardown: function () {
    $(this).off("resize", $special.handler);
  },
  handler: function (event, execAsap) {
    // Save the context
    var context = this,
      args = arguments,
      dispatch = function () {
        // set correct event type
        event.type = "debouncedresize";
        $event.dispatch.apply(context, args);
      };

    if (resizeTimeout) {
      clearTimeout(resizeTimeout);
    }

    execAsap ?
      dispatch() :
      resizeTimeout = setTimeout(dispatch, $special.threshold);
  },
  threshold: 250
};

// ======================= imagesLoaded Plugin ===============================
// https://github.com/desandro/imagesloaded

// $('#my-container').imagesLoaded(myFunction)
// execute a callback when all images have loaded.
// needed because .load() doesn't work on cached images

// callback function gets image collection as argument
//  this is the container

// original: MIT license. Paul Irish. 2010.
// contributors: Oren Solomianik, David DeSandro, Yiannis Chatzikonstantinou

// blank image data-uri bypasses webkit log warning (thx doug jones)
var BLANK = 'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw==';

$.fn.imagesLoaded = function (callback) {
  var $this = this,
    deferred = $.isFunction($.Deferred) ? $.Deferred() : 0,
    hasNotify = $.isFunction(deferred.notify),
    $images = $this.find('img').add($this.filter('img')),
    loaded = [],
    proper = [],
    broken = [];

  // Register deferred callbacks
  if ($.isPlainObject(callback)) {
    $.each(callback, function (key, value) {
      if (key === 'callback') {
        callback = value;
      } else if (deferred) {
        deferred[key](value);
      }
    });
  }

  function doneLoading() {
    var $proper = $(proper),
      $broken = $(broken);

    if (deferred) {
      if (broken.length) {
        deferred.reject($images, $proper, $broken);
      } else {
        deferred.resolve($images);
      }
    }

    if ($.isFunction(callback)) {
      callback.call($this, $images, $proper, $broken);
    }
  }

  function imgLoaded(img, isBroken) {
    // don't proceed if BLANK image, or image is already loaded
    if (img.src === BLANK || $.inArray(img, loaded) !== -1) {
      return;
    }

    // store element in loaded images array
    loaded.push(img);

    // keep track of broken and properly loaded images
    if (isBroken) {
      broken.push(img);
    } else {
      proper.push(img);
    }

    // cache image and its state for future calls
    $.data(img, 'imagesLoaded', { isBroken: isBroken, src: img.src });

    // trigger deferred progress method if present
    if (hasNotify) {
      deferred.notifyWith($(img), [isBroken, $images, $(proper), $(broken)]);
    }

    // call doneLoading and clean listeners if all images are loaded
    if ($images.length === loaded.length) {
      setTimeout(doneLoading);
      $images.unbind('.imagesLoaded');
    }
  }

  // if no images, trigger immediately
  if (!$images.length) {
    doneLoading();
  } else {
    $images.bind('load.imagesLoaded error.imagesLoaded', function (event) {
      // trigger imgLoaded
      imgLoaded(event.target, event.type === 'error');
    }).each(function (i, el) {
      var src = el.src;

      // find out if this image has been already checked for status
      // if it was, and src has not changed, call imgLoaded on it
      var cached = $.data(el, 'imagesLoaded');
      if (cached && cached.src === src) {
        imgLoaded(el, cached.isBroken);
        return;
      }

      // if complete is true and browser supports natural sizes, try
      // to check for image status manually
      if (el.complete && el.naturalWidth !== undefined) {
        imgLoaded(el, el.naturalWidth === 0 || el.naturalHeight === 0);
        return;
      }

      // cached images don't fire load sometimes, so we reset src, but only when
      // dealing with IE, or image is complete (loaded) and failed manual check
      // webkit hack from http://groups.google.com/group/jquery-dev/browse_thread/thread/eee6ab7b2da50e1f
      if (el.readyState || el.complete) {
        el.src = BLANK;
        el.src = src;
      }
    });
  }

  return deferred ? deferred.promise($this) : $this;
};

//var Grid = (function () {
$.fn.revealer = function(){
  // list of items
  var $grid = $(this),
    // the items
    $items = $grid.children('.grid-item'),
    // current expanded item's index
    current = -1,
    // position (top) of the expanded item
    // used to know if the preview will expand in a different row
    previewPos = -1,
    // extra amount of pixels to scroll the window
    scrollExtra = 0,
    // extra margin when expanded (between preview overlay and the next items)
    marginExpanded = 40,
    $window = $(window), winsize,
    $body = $('html, body'),
    // transitionend events
    transEndEventNames = {
      'WebkitTransition': 'webkitTransitionEnd',
      'MozTransition': 'transitionend',
      'OTransition': 'oTransitionEnd',
      'msTransition': 'MSTransitionEnd',
      'transition': 'transitionend'
    },
    transEndEventName = transEndEventNames[Modernizr.prefixed('transition')],
    // support for csstransitions
    support = Modernizr.csstransitions,
    // default settings
    settings = {
      minHeight: 425,
      speed: 350,
      easing: 'ease'
    };

//console.log($items);
    init();
  function init(config) {

    //$($grid).find('.management').css('background-color', '#f00');
    // the settings..
    settings = $.extend(true, {}, settings, config);

    // preload all images
    $grid.imagesLoaded(function () {

      // save item´s size and offset
      saveItemInfo(true);
      // get window´s size
      getWinSize();
      // initialize some events
      initEvents();

    });

  }

  // add more items to the grid.
  // the new items need to appended to the grid.
  // after that call Grid.addItems(theItems);
  function addItems($newitems) {

    $items = $items.add($newitems);

    $newitems.each(function () {
      var $item = $(this);
      $item.data({
        offsetTop: $item.offset().top,
        height: $item.height()
      });
    });

    initItemsEvents($newitems);

  }

  // saves the item´s offset top and height (if saveheight is true)
  function saveItemInfo(saveheight) {
    $items.each(function () {
      var $item = $(this);
      $item.data('offsetTop', $item.offset().top);
      if (saveheight) {
        $item.data('height', $item.height());
      }
    });
  }

  function initEvents() {

    // when clicking an item, show the preview with the item´s info and large image.
    // close the item if already expanded.
    // also close if clicking on the item´s cross
    initItemsEvents($items);

    // on window resize get the window´s size again
    // reset some values..
    $window.on('debouncedresize', function () {

      scrollExtra = 0;
      previewPos = -1;
      // save item´s offset
      saveItemInfo();
      getWinSize();
      var preview = $.data(this, 'preview');
      if (typeof preview != 'undefined') {
        hidePreview();
      }

    });

  }

  function initItemsEvents($items) {

    $items.on('click', 'span.details-close', function () {
      //e.preventDefault();
      hidePreview();
      return false;
    }).children('.circle-card-content').on('click', function (e) {
      
      var $item = $(this).parent();
      //console.log($item);
      // check if item already opened
      current === $item.index() ? hidePreview() : showPreview($item);
      return false;

    });
    //$items.children('.grid').css('background-color', 'red');

  }

  function getWinSize() {
    winsize = { width: $window.width(), height: $window.height() };
  }

  function showPreview($item) {

    var preview = $.data(this, 'preview'),
      // item´s offset top
      position = $item.data('offsetTop');

    scrollExtra = 0;

    // if a preview exists and previewPos is different (different row) from item´s top then close it
    if (typeof preview != 'undefined') {

      // not in the same row
      /*if (previewPos !== position) {
        // if position > previewPos then we need to take te current preview´s height in consideration when scrolling the window
        if (position > previewPos) {
          scrollExtra = preview.height;
        }
        hidePreview();
      }
      // same row
      else {
        preview.update($item);
        return false;
      }*/
      hidePreview();
    }

    // update previewPos
    previewPos = position;
    // initialize new preview for the clicked item
    preview = $.data(this, 'preview', new Preview($item));
    // expand preview overlay
    preview.open();

  }

  function hidePreview() {
    current = -1;
    var preview = $.data(this, 'preview');
    preview.close();
    $.removeData(this, 'preview');
  }

  // the preview obj / overlay
  function Preview($item) {
    this.$item = $item;
    this.expandedIdx = this.$item.index();
    this.create();
    this.update();
  }

  Preview.prototype = {

    create: function () {
      this.$staff_team = $('<p class="profile-label staff-team"></p>');
      this.$staff_yearsexp = $('<p class="profile-label staff-yearsexp"></p>');
      this.$staff_languages = $('<p class="profile-label staff-languages"></p>');
      this.$subsidiary_address = $('<p class="profile-label subsidiary-address"></p>');
      this.$subsidiary_phone = $('<p class="profile-label subsidiary-phone"></p>');
      this.$subsidiary_contact = $('<p class="profile-label subsidiary-contact"></p>');

      this.$details_col_one = $('<div class="col-sm-12 col-md-6"></div>').append(this.$staff_team, this.$staff_yearsexp, this.$staff_languages, this.$subsidiary_address, this.$subsidiary_phone, this.$subsidiary_contact);

      this.$staff_countryexp = $('<p class="profile-label staff-countryexp"></p>');
      this.$staff_degrees = $('<p class="profile-label staff-degrees"></p>');

      this.$details_col_two = $('<div class="col-sm-12 col-md-6"></div>').append(this.$staff_countryexp, this.$staff_degrees);

      this.$details_row = $('<div class="row"></div>').append(this.$details_col_one, this.$details_col_two);
      this.$details_col = $('<div class="col-sm-6"></div>').append(this.$details_row);

      this.$bio = $('<div class="bio"></div>');
      this.$bio_col = $('<div class="col-sm-6"></div>').append(this.$bio);

      this.$bio_details_row = $('<div class="row"></div>').append(this.$bio_col, this.$details_col);

      this.$details_name = $('<h3 class="name"></h3>');
      this.$details_title = $('<h3 class="title"></h3>');
      this.$close_details = $('<span class="details-close"></span>');

      this.$details_container = $('<div class="container"></div>').append(this.$close_details, this.$details_name, this.$details_title, this.$bio_details_row);
      this.$details = $('<div id="details" class="details"></div>').append(this.$details_container);

      this.$item.append(this.getEl());
      if (support) {
        this.setTransition();
      }
    },
    update: function ($item) {

      if ($item) {
        this.$item = $item;
      }

      // if already expanded remove class "og-expanded" from current item and add it to new item
      if (current !== -1) {
        var $currentItem = $items.eq(current);
        $currentItem.removeClass('details-expanded');
       this.$item.addClass('details-expanded');
        // position the preview correctly
        this.positionPreview();
      }

      // update current value
      current = this.$item.index();

      // update preview´s content
      var $itemEl = this.$item.children('a'),
        eldata = {
          details_name: $itemEl.data('details_name'),
          details_title: $itemEl.data('details_title'),
          bio: $itemEl.data('details_bio'),
          staff_team: $itemEl.data('staff_team'),
          staff_yearsexp: $itemEl.data('staff_yearsexp'),
          staff_degrees: $itemEl.data('staff_degrees'),
          staff_languages: $itemEl.data('staff_languages'),
          staff_countryexp: $itemEl.data('staff_countryexp'),
          subsidiary_address: $itemEl.data('subsidiary_address'),
          subsidiary_phone: $itemEl.data('subsidiary_phone'),
          subsidiary_contact: $itemEl.data('subsidiary_contact')
        };

      (eldata.details_name != null) ? this.$details_name.html(eldata.details_name) : this.$details_name.html('');
      (eldata.details_title != null) ? this.$details_title.html(eldata.details_title) : this.$details_title.html('');
      (eldata.bio != null) ? this.$bio.html(eldata.bio) : this.$bio.html('');
      (eldata.staff_team != null) ? this.$staff_team.html('Team:<span>' + eldata.staff_team + '</span>') : this.$staff_team.html('');
      (eldata.staff_yearsexp != null) ? this.$staff_yearsexp.html('Years of Experience:<span>' + eldata.staff_yearsexp + '</span>') : this.$staff_yearsexp.html('');
      (eldata.staff_languages != null) ? this.$staff_languages.html('Languages:<span>' + eldata.staff_languages + '</span>') : this.$staff_languages.html('');
      (eldata.staff_countryexp != null) ? this.$staff_countryexp.html('Country Expertise:<span>' + eldata.staff_countryexp + '</span>') : this.$staff_countryexp.html('');
      (eldata.staff_degrees != null) ? this.$staff_degrees.html('Degrees:<span>' + eldata.staff_degrees + '</span>') : this.$staff_degrees.html('');
      (eldata.subsidiary_address != null) ? this.$subsidiary_address.html('Address:<span>' + eldata.subsidiary_address + '</span>') : this.$subsidiary_address.html('');
      (eldata.subsidiary_phone != null) ? this.$subsidiary_phone.html('Telephone:<span>' + eldata.subsidiary_phone + '</span>') : this.$subsidiary_phone.html('');
      (eldata.subsidiary_contact != null) ? this.$subsidiary_contact.html('Contact:<span>' + eldata.subsidiary_contact + '</span>') : this.$subsidiary_contact.html('');

      var self = this;
    },
    open: function () {

      setTimeout($.proxy(function () {
        // set the height for the preview and the item
        this.setHeights();
        // scroll to position the preview in the right place
        this.positionPreview();
      }, this), 25);
    },
    close: function () {

      var self = this;
          self.$item.removeClass('details-expanded');
          self.$item.removeClass('staff-marker');

      var onEndFn = function () {
          if (support) {
            $(this).off(transEndEventName);
          }
          self.$details.remove();
        };

      setTimeout($.proxy(function () {

        if (typeof this.$details !== 'undefined') {
          this.$details.fadeOut('fast');
        }

        this.$details.css('height', 0);
        // the current expanded item (might be different from this.$item)
        var $expandedItem = $items.eq(this.expandedIdx);
        //console.log($expandedItem);
        $expandedItem.css('height', $expandedItem.data('height')).on(transEndEventName, onEndFn);

        if (!support) {
          onEndFn.call();
        }

      }, this), 25);

      return false;

    },
    calcHeight: function () {

      //var heightPreview = winsize.height - this.$item.data('height') - marginExpanded,
      //var staff_details_height = $('#details').height();
      var staff_details_height = this.$details.height();
      //var heightPreview = winsize.height - this.$item.data('height') - marginExpanded;
      var heightPreview = staff_details_height;
      //var itemHeight = winsize.height - this.$item.data('height');
      var itemHeight = this.$item.data('height') + staff_details_height + marginExpanded;
      //console.log(staff_details_height);

      if (heightPreview < settings.minHeight) {
        heightPreview = settings.minHeight;
        //itemHeight = settings.minHeight + this.$item.data('height') + marginExpanded;
        //itemHeight = this.$item.data('height') + marginExpanded + staff_details_height;
      }

      this.height = heightPreview;
      this.itemHeight = itemHeight;

    },
    setHeights: function () {

      var self = this,
        onEndFn = function () {
          if (support) {
            self.$item.off(transEndEventName);
          }
          self.$item.addClass('details-expanded');
        };

      this.calcHeight();
      //this.$staff_details.css('height', this.height);
      //var staff_details_height = $('#details').height();
      //var itemHeight = this.$item.data('height') + marginExpanded + staff_details_height;

      //this.$details.slideDown();
      //this.$details.animate({height : });
      //console.log(staff_details_height);

      self.$item.animate({height: this.itemHeight}, 400, 'linear', function(){
        self.$details.animate({opacity:'1'}, 400, 'linear', function(){
          self.$item.addClass('staff-marker');
        });
      }).on(transEndEventName, onEndFn);
      //this.$details;

      //this.$item.css('height', $('#staff_details').height()).on(transEndEventName, onEndFn);
      //var staff_details_height = this.$item.find('#staff-details');
      //this.$item.css('height', staff_details_height).on(transEndEventName, onEndFn);

      if (!support) {
        onEndFn.call();
      }

    },
    positionPreview: function () {
      var navHeight = $('#header-nav').outerHeight();
      //console.log(navHeight);
      var position = this.$item.data('offsetTop') - (navHeight),
        previewOffsetT = this.$details.offset().top - scrollExtra,
        //scrollVal = this.height + this.$item.data('height') + marginExpanded <= winsize.height ? position : this.height < winsize.height ? previewOffsetT - (winsize.height - this.height) : previewOffsetT;
        scrollVal = position;

      $body.animate({ scrollTop: scrollVal }, settings.speed);

    },
    setTransition: function () {
      this.$details.css('transition', 'height ' + settings.speed + 'ms ' + settings.easing);
      this.$item.css('transition', 'height ' + settings.speed + 'ms ' + settings.easing);
    },
    getEl: function () {
      return this.$details;
    }
  }
};
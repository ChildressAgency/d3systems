jQuery(document).ready(function($){
  //sticky nav
  window.onscroll = function(){ stickNav(); }
  var headerNav = document.getElementById("header-nav");
  var navbarPosition = headerNav.offsetTop;

  function stickNav(){
    if(window.pageYOffset >= navbarPosition){
      headerNav.classList.add('sticky');
    }
    else{
      headerNav.classList.remove('sticky');
    }
  }

  //home-hero continue
  $('#scroll-down').on('click', function (e) {
    e.preventDefault;
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name="' + this.hash.slice(1) + '"]');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top - 120
        }, 1000);
        return false;
      }
    }
  }); 
  
  var $filters = $('#filter-nav').on('click', '.filter', function(e){
    e.preventDefault();
    var $filter = $(this).data('filter');

    if($filter == '.all'){
      $('#grid>.grid-item').each(function(){
        $(this).fadeIn(400);
      });
    }
    else{
      $('#grid>' + $filter).each(function(){
        $(this).fadeIn(400);
      });
      $('#grid>.grid-item').not($filter).hide();
    }
    $filters.removeClass('active');
    $(this).addClass('active');
  });

  //if(typeof $.fn.isotope == 'function'){
    /*var grid = $('.gridder').isotope({
      itemSelector: '.grid-item',
      percentPosition:true,
      layoutMode:'fitRows'
      //masonry:{
      //  columnWidth:'.grid-sizer',
      //}
    });

    $('#filter-nav').on('click', 'a', function(){
      var filterView = $(this).data('filter');
      grid.isotope({
        filter:filterView
      });
    });
  //}*/

  $('#grid').revealer();

/*
  $('.gridder').gridderExpander({
    scroll:false,
    scrollOffset:30,
    scrollTo:'panel',
    animationSpeed:400,
    animationEasing:'easeInOutExpo',
    showNav:false,
    onContent: function(myself){
      //console.log(myself);
      var $staff_info = myself.find('.grid-item-content');
      var staff_name = $staff_info.data('staff_name'),
          staff_title = $staff_info.data('staff_title'),
          staff_bio = $staff_info.data('staff_bio'),
          staff_team = $staff_info.data('staff_team'),
          staff_yearsexp = $staff_info.data('staff_yearsexp'),
          staff_degrees = $staff_info.data('staff_degrees'),
          staff_languages = $staff_info.data('staff_languages'),
          staff_countryexp = $staff_info.data('staff_countryexp');

      var $staff_details = $('#staff-details');
      $staff_details.find('.staff-name').text(staff_name);
      $staff_details.find('.staff-title').text(staff_title);
      $staff_details.find('.staff_bio').html(staff_bio);
      $staff_details.find('.staff-team').html('Team:<span>' + staff_team + '</span>');
      $staff_details.find('.staff-yearsexp').html('Years of Experience:<span>' + staff_yearsexp + '</span>');
      $staff_details.find('.staff-languages').html('Languages:<span>' + staff_languages + '</span>');
      $staff_details.find('.staff-coutryexp').html('Country Experience:<span>' + staff_countryexp + '</span>');
      $staff_details.find('.staff-degrees').html('Degrees:<span>' + staff_degrees + '</span>');
    }
  });*/

  //$(function(){
    //Grid.init();
  //});
});

/*
 *  Gridder - v1.4.2
 *  A jQuery plugin that displays a thumbnail grid expanding preview similar to the effect seen on Google Images.
 *  http://www.oriongunning.com/
 *
 *  Made by Orion Gunning
 *  Under MIT License
 */
/*
; (function ($) {

  //Ensures there will be no 'console is undefined' errors in IE
  window.console = window.console || (function () {
    var c = {}; c.log = c.warn = c.debug = c.info = c.error = c.time = c.dir = c.profile = c.clear = c.exception = c.trace = c.assert = function () { };
    return c;
  })();

  /* Custom Easing */
/*  $.fn.extend($.easing, {
    def: "easeInOutExpo", easeInOutExpo: function (e, f, a, h, g) { if (f === 0) { return a; } if (f === g) { return a + h; } if ((f /= g / 2) < 1) { return h / 2 * Math.pow(2, 10 * (f - 1)) + a; } return h / 2 * (-Math.pow(2, -10 * --f) + 2) + a; }
  });

  /* KEYPRESS LEFT & RIGHT ARROW */
  /* This will work only if a current gridder is opened. */
/*  $(document).keydown(function (e) {
    var keycode = e.keyCode;
    var $current_gridder = $(".currentGridder");
    var $current_target = $current_gridder.find(".gridder-show");
    if ($current_gridder.length) {
      if (keycode === 37) {
        //console.log("Pressed Left Arrow");
        $current_target.prev().prev().trigger("click");
        e.preventDefault();
      }
      if (keycode === 39) {
        //console.log("Pressed Right Arrow");
        $current_target.next().trigger("click");
        e.preventDefault();
      }
    } else {
      //console.log("No active gridder.");
    }
  });

  $.fn.gridderExpander = function (options) {

    /* GET DEFAULT OPTIONS OR USE THE ONE PASSED IN THE FUNCTION  */
/*    var settings = $.extend({}, $.fn.gridderExpander.defaults, options);

    return this.each(function () {

      var mybloc;
      var _this = $(this);
      var visible = false;

      // START CALLBACK
      settings.onStart(_this);

      // CLOSE FUNCTION
      function closeExpander(base) {

        // SCROLL TO CORRECT POSITION FIRST
        if (settings.scroll) {
          $("html, body").animate({
            scrollTop: base.find(".selectedItem").offset().top - settings.scrollOffset
          }, {
              duration: 200,
              easing: settings.animationEasing
            });
        }

        _this.removeClass("hasSelectedItem");

        // REMOVES GRIDDER EXPAND AREA
        visible = false;
        base.find(".selectedItem").removeClass("selectedItem");

        base.find(".gridder-show").slideUp(settings.animationSpeed, settings.animationEasing, function () {
          base.find(".gridder-show").remove();
          settings.onClosed(base);
        });

        /* REMOVE CURRENT ACTIVE GRIDDER */
/*        $(".currentGridder").removeClass("currentGridder");
      }

      // OPEN EXPANDER
      function openExpander(myself) {

        /* CURRENT ACTIVE GRIDDER */
/*        $(".currentGridder").removeClass("currentGridder");
        _this.addClass("currentGridder");

        /* ENSURES THE CORRECT BLOC IS ACTIVE */
/*        if (!myself.hasClass("selectedItem")) {
          _this.find(".selectedItem").removeClass("selectedItem");
          myself.addClass("selectedItem");
        } else {
          // THE SAME IS ALREADY OPEN, LET"S CLOSE IT
          closeExpander(_this, settings);
          return;
        }

        /* REMOVES PREVIOUS BLOC */
/*        _this.find(".gridder-show").remove();


        /* ADD CLASS TO THE GRIDDER CONTAINER
         * So you can apply global style when item selected. 
         */
/*        if (!_this.hasClass("hasSelectedItem")) {
          _this.addClass("hasSelectedItem");
        }

        /* ADD LOADING BLOC */
/*        var $htmlcontent = $("<div class=\"gridder-show loading\"></div>");
        mybloc = $htmlcontent.insertAfter(myself);

        /* GET CONTENT VIA AJAX OR #ID*/
/*        var thecontent = "";

        if (myself.data("griddercontent").indexOf("#") === 0) {

          // Load #ID Content
          thecontent = $(myself.data("griddercontent")).html();
          processContent(myself, thecontent);
        } else {

          // Load AJAX Content
          $.ajax({
            type: "GET",
            url: myself.data("griddercontent"),
            success: function (data) {
              thecontent = data;
              processContent(myself, thecontent);
            },
            error: function (request) {
              thecontent = request.responseText;
              processContent(myself, thecontent);
            }
          });
        }
      }

      // PROCESS CONTENT
      function processContent(myself, thecontent) {

        /* FORMAT OUTPUT */
/*        var htmlcontent = "<div class=\"gridder-padding\">";

        if (settings.showNav) {

          /* CHECK IF PREV AND NEXT BUTTON HAVE ITEMS */
/*          var prevItem = ($(".selectedItem").prev());
          var nextItem = ($(".selectedItem").next().next());

          htmlcontent += "<div class=\"gridder-navigation\">";
          htmlcontent += "<a href=\"#\" class=\"gridder-close\">" + settings.closeText + "</a>";
          htmlcontent += "<a href=\"#\" class=\"gridder-nav prev " + (!prevItem.length ? "disabled" : "") + "\">" + settings.prevText + "</a>";
          htmlcontent += "<a href=\"#\" class=\"gridder-nav next " + (!nextItem.length ? "disabled" : "") + "\">" + settings.nextText + "</a>";
          htmlcontent += "</div>";
        }

        htmlcontent += "<div class=\"gridder-expanded-content\">";
        htmlcontent += thecontent;
        htmlcontent += "</div>";
        htmlcontent += "</div>";

        // IF EXPANDER IS ALREADY EXPANDED 
        if (!visible) {
          mybloc.hide().append(htmlcontent).slideDown(settings.animationSpeed, settings.animationEasing, function () {
            visible = true;
            /* AFTER EXPAND CALLBACK */
/*            if ($.isFunction(settings.onContent)) {
              //settings.onContent(mybloc);
              settings.onContent(myself);
            }
          });
        } else {
          mybloc.html(htmlcontent);
          mybloc.find(".gridder-padding").fadeIn(settings.animationSpeed, settings.animationEasing, function () {
            visible = true;
            /* CHANGED CALLBACK */
/*            if ($.isFunction(settings.onContent)) {
              //settings.onContent(mybloc);
              settings.onContent(myself);
            }
          });
        }

        /* SCROLL TO CORRECT POSITION AFTER */
/*        if (settings.scroll) {
          var offset = (settings.scrollTo === "panel" ? myself.offset().top + myself.height() - settings.scrollOffset : myself.offset().top - settings.scrollOffset);
          $("html, body").animate({
            scrollTop: offset
          }, {
              duration: settings.animationSpeed,
              easing: settings.animationEasing
            });
        }

        /* REMOVE LOADING CLASS */
/*        mybloc.removeClass("loading");
      }

      /* CLICK EVENT */
/*      _this.on("click", ".gridder-list", function (e) {
        e.preventDefault();
        var myself = $(this);
        openExpander(myself);
      });

      /* NEXT BUTTON */
/*      _this.on("click", ".gridder-nav.next", function (e) {
        e.preventDefault();
        $(this).parents(".gridder-show").next().trigger("click");
      });

      /* PREVIOUS BUTTON */
/*      _this.on("click", ".gridder-nav.prev", function (e) {
        e.preventDefault();
        $(this).parents(".gridder-show").prev().prev().trigger("click");
      });

      /* CLOSE BUTTON */
/*      _this.on("click", ".gridder-close", function (e) {
        e.preventDefault();
        closeExpander(_this);
      });
    });
  };

  // Default Options
  $.fn.gridderExpander.defaults = {
    scroll: true,
    scrollOffset: 30,
    scrollTo: "panel", // panel or listitem
    animationSpeed: 400,
    animationEasing: "easeInOutExpo",
    showNav: true,
    nextText: "Next",
    prevText: "Previous",
    closeText: "Close",
    onStart: function () { },
    onContent: function () { },
    onClosed: function () { }
  };

})(jQuery);*/

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
  var $grid = $('#grid'),
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
    marginExpanded = 10,
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
      minHeight: 300,
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

    $items.on('click', 'span.staff-details-close', function () {
      //e.preventDefault();
      hidePreview();
      return false;
    }).children('.grid-item-content').on('click', function (e) {
      
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
      if (previewPos !== position) {
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
      }

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
    /*create: function () {
      // create Preview structure:
      
      this.$title = $('<h3></h3>');
      this.$description = $('<p></p>');
      this.$href = $('<a href="#">Visit website</a>');
      this.$details = $('<div class="og-details"></div>').append(this.$title, this.$description, this.$href);
      this.$loading = $('<div class="og-loading"></div>');
      this.$fullimage = $('<div class="og-fullimg"></div>').append(this.$loading);
      this.$closePreview = $('<span class="og-close"></span>');
      this.$previewInner = $('<div class="og-expander-inner"></div>').append(this.$closePreview, this.$fullimage, this.$details);
      this.$previewEl = $('<div class="og-expander"></div>').append(this.$previewInner);
      // append preview element to the item
      this.$item.append(this.getEl());
      // set the transitions for the preview and the item
      if (support) {
        this.setTransition();
      }
    },*/

    create: function () {
      this.$staff_team = $('<p class="staff-profile-label staff-team"></p>');
      this.$staff_yearsexp = $('<p class="staff-profile-label staff-yearsexp"></p>');
      this.$staff_languages = $('<p class="staff-profile-label staff-languages"></p>');
      this.$staff_details_col_one = $('<div class="col-sm-12 col-md-6"></div>').append(this.$staff_team, this.$staff_yearsexp, this.$staff_languages);

      this.$staff_countryexp = $('<p class="staff-profile-label staff-countryexp"></p>');
      this.$staff_degrees = $('<p class="staff-profile-label staff-degrees"></p>');
      this.$staff_details_col_two = $('<div class="col-sm-12 col-md-6"></div>').append(this.$staff_countryexp, this.$staff_degrees);

      this.$staff_details_row = $('<div class="row"></div>').append(this.$staff_details_col_one, this.$staff_details_col_two);
      this.$staff_details_col = $('<div class="col-sm-6"></div>').append(this.$staff_details_row);

      this.$staff_bio = $('<div class="staff-bio"></div>');
      this.$staff_bio_col = $('<div class="col-sm-6"></div>').append(this.$staff_bio);

      this.$staff_bio_details_row = $('<div class="row"></div>').append(this.$staff_bio_col, this.$staff_details_col);

      this.$staff_name = $('<h3 class="staff-name"></h3>');
      this.$staff_title = $('<h3 class="staff-title"></h3>');
      this.$staff_close_details = $('<span class="staff-details-close"></span>');

      this.$staff_details_container = $('<div class="container"></div>').append(this.$staff_close_details, this.$staff_name, this.$staff_title, this.$staff_bio_details_row);
      this.$staff_details = $('<div class="staff-details"></div>').append(this.$staff_details_container);

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
        $currentItem.removeClass('staff-details-expanded');
        this.$item.addClass('staff-details-expanded');
        // position the preview correctly
        this.positionPreview();
      }

      // update current value
      current = this.$item.index();

      // update preview´s content
      var $itemEl = this.$item.children('a'),
        eldata = {
          //href: $itemEl.attr('href'),
          //largesrc: $itemEl.data('largesrc'),
          //title: $itemEl.data('title'),
          //description: $itemEl.data('description')
          staff_name: $itemEl.data('staff_name'),
          staff_title: $itemEl.data('staff_title'),
          staff_bio: $itemEl.data('staff_bio'),
          staff_team: $itemEl.data('staff_team'),
          staff_yearsexp: $itemEl.data('staff_yearsexp'),
          staff_degrees: $itemEl.data('staff_degrees'),
          staff_languages: $itemEl.data('staff_languages'),
          staff_countryexp: $itemEl.data('staff_countryexp')
        };

      //this.$title.html(eldata.title);
      //this.$description.html(eldata.description);
      //this.$href.attr('href', eldata.href);

      this.$staff_team.html('Team:<span>' + eldata.staff_team + '</span>');
      this.$staff_yearsexp.html('Years of Experience:<span>' + eldata.staff_yearsexp + '</span>');
      this.$staff_languages.html('Languages:<span>' + eldata.staff_languages + '</span>');
      this.$staff_countryexp.html('Country Expertise:<span>' + eldata.staff_countryexp + '</span>');
      this.$staff_degrees.html('Degrees:<span>' + eldata.staff_degrees + '</span>');
      this.$staff_bio.html(eldata.staff_bio);
      this.$staff_name.html(eldata.staff_name);
      this.$staff_title.html(eldata.staff_title);

      var self = this;

      // remove the current image in the preview
      //if (typeof self.$largeImg != 'undefined') {
      //  self.$largeImg.remove();
      //}

      // preload large image and add it to the preview
      // for smaller screens we don´t display the large image (the media query will hide the fullimage wrapper)
      /*if (self.$fullimage.is(':visible')) {
        this.$loading.show();
        $('<img/>').load(function () {
          var $img = $(this);
          if ($img.attr('src') === self.$item.children('a').data('largesrc')) {
            self.$loading.hide();
            self.$fullimage.find('img').remove();
            self.$largeImg = $img.fadeIn(350);
            self.$fullimage.append(self.$largeImg);
          }
        }).attr('src', eldata.largesrc);
      }*/

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

      var self = this,
        onEndFn = function () {
          if (support) {
            $(this).off(transEndEventName);
          }
          self.$item.removeClass('staff-details-expanded');
          self.$staff_details.remove();
        };

      setTimeout($.proxy(function () {

        if (typeof this.$largeImg !== 'undefined') {
          this.$largeImg.fadeOut('fast');
        }
        this.$staff_details.css('height', 0);
        // the current expanded item (might be different from this.$item)
        var $expandedItem = $items.eq(this.expandedIdx);
        $expandedItem.css('height', $expandedItem.data('height')).on(transEndEventName, onEndFn);

        if (!support) {
          onEndFn.call();
        }

      }, this), 25);

      return false;

    },
    calcHeight: function () {

      var heightPreview = winsize.height - this.$item.data('height') - marginExpanded,
        itemHeight = winsize.height;

      if (heightPreview < settings.minHeight) {
        heightPreview = settings.minHeight;
        itemHeight = settings.minHeight + this.$item.data('height') + marginExpanded;
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
          self.$item.addClass('staff-details-expanded');
        };

      this.calcHeight();
      this.$staff_details.css('height', this.height);
      this.$item.css('height', this.itemHeight).on(transEndEventName, onEndFn);

      if (!support) {
        onEndFn.call();
      }

    },
    positionPreview: function () {

      // scroll page
      // case 1 : preview height + item height fits in window´s height
      // case 2 : preview height + item height does not fit in window´s height and preview height is smaller than window´s height
      // case 3 : preview height + item height does not fit in window´s height and preview height is bigger than window´s height
      var position = this.$item.data('offsetTop'),
        previewOffsetT = this.$staff_details.offset().top - scrollExtra,
        scrollVal = this.height + this.$item.data('height') + marginExpanded <= winsize.height ? position : this.height < winsize.height ? previewOffsetT - (winsize.height - this.height) : previewOffsetT;

      $body.animate({ scrollTop: scrollVal }, settings.speed);

    },
    setTransition: function () {
      this.$staff_details.css('transition', 'height ' + settings.speed + 'ms ' + settings.easing);
      this.$item.css('transition', 'height ' + settings.speed + 'ms ' + settings.easing);
    },
    getEl: function () {
      return this.$staff_details;
    }
  }

  //return {
  //  init: init,
  //  addItems: addItems
  //};

};
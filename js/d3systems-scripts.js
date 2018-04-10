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
  
  var staff_grid = $('#staff_grid').revealer();

  var $filters = $('#filter-nav').on('click', '.filter', function(e){
    e.preventDefault();
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
      //$('#grid>.grid-item').not($filter).hide();
    }
    $filters.removeClass('active');
    $(this).addClass('active');
  });

});

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
    marginExpanded = 85,
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
      this.$staff_details_col_two = $('<div class="col-sm-12 col-md-6"></div>').append(this.$staff_countryexp, this.$staff_degrees);

      this.$staff_details_row = $('<div class="row"></div>').append(this.$staff_details_col_one, this.$staff_details_col_two);
      this.$staff_details_col = $('<div class="col-sm-6"></div>').append(this.$staff_details_row);

      this.$staff_bio = $('<div class="bio"></div>');
      this.$staff_bio_col = $('<div class="col-sm-6"></div>').append(this.$staff_bio);

      this.$staff_bio_details_row = $('<div class="row"></div>').append(this.$staff_bio_col, this.$staff_details_col);

      this.$staff_name = $('<h3 class="name"></h3>');
      this.$staff_title = $('<h3 class="title"></h3>');
      this.$staff_close_details = $('<span class="details-close"></span>');

      this.$staff_details_container = $('<div class="container"></div>').append(this.$staff_close_details, this.$staff_name, this.$staff_title, this.$staff_bio_details_row);
      this.$staff_details = $('<div id="details" class="details"></div>').append(this.$staff_details_container);

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
        //this.positionPreview();
      }

      // update current value
      current = this.$item.index();

      // update preview´s content
      var $itemEl = this.$item.children('a'),
        eldata = {
          staff_name: $itemEl.data('staff_name'),
          staff_title: $itemEl.data('staff_title'),
          staff_bio: $itemEl.data('staff_bio'),
          staff_team: $itemEl.data('staff_team'),
          staff_yearsexp: $itemEl.data('staff_yearsexp'),
          staff_degrees: $itemEl.data('staff_degrees'),
          staff_languages: $itemEl.data('staff_languages'),
          staff_countryexp: $itemEl.data('staff_countryexp')
        };

      this.$staff_team.html('Team:<span>' + eldata.staff_team + '</span>');
      (eldata.staff_yearsexp != null) ? this.$staff_yearsexp.html('Years of Experience:<span>' + eldata.staff_yearsexp + '</span>') : this.$staff_yearsexp.html('');
      this.$staff_languages.html('Languages:<span>' + eldata.staff_languages + '</span>');
      this.$staff_countryexp.html('Country Expertise:<span>' + eldata.staff_countryexp + '</span>');
      this.$staff_degrees.html('Degrees:<span>' + eldata.staff_degrees + '</span>');
      this.$staff_bio.html(eldata.staff_bio);
      this.$staff_name.html(eldata.staff_name);
      this.$staff_title.html(eldata.staff_title);

      var self = this;
    },
    open: function () {

      setTimeout($.proxy(function () {
        // set the height for the preview and the item
        this.setHeights();
        // scroll to position the preview in the right place
        //this.positionPreview();
      }, this), 25);

    },
    close: function () {

      var self = this;
          self.$item.removeClass('details-expanded');

      var onEndFn = function () {
          if (support) {
            $(this).off(transEndEventName);
          }
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

      //var heightPreview = winsize.height - this.$item.data('height') - marginExpanded,
      var heightPreview = winsize.height - this.$item.data('height') - marginExpanded,
        itemHeight = winsize.height;
        //console.log();

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
          self.$item.addClass('details-expanded');
        };

      //this.calcHeight();
      //this.$staff_details.css('height', this.height);
      var staff_details_height = $('#details').height();
      var itemHeight = this.$item.data('height') + marginExpanded + staff_details_height;

      this.$staff_details.slideDown();
      //console.log(staff_details_height);
      this.$item.css('height', itemHeight).on(transEndEventName, onEndFn);
      this.$staff_details.animate({'opacity':'1'}, 400);

      //this.$item.css('height', $('#staff_details').height()).on(transEndEventName, onEndFn);
      //var staff_details_height = this.$item.find('#staff-details');
      //this.$item.css('height', staff_details_height).on(transEndEventName, onEndFn);

      if (!support) {
        onEndFn.call();
      }

    },
    positionPreview: function () {
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
};
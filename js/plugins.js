/*!
 * $.fn.bronyconRotator
 * http://imjoshdean.tumblr.com/
 *
 * Date: Sun Oct 21 11:10:00 2012 -600 
 */
(function($) {
  var defaults = {
    bannerSelector : '.banner',
    previewSelector : '.banner-preview > div',
    currentClass : 'current',
    rotateTime : 5000,
    intervalID : 0,
    index : -1,

  },
  settings = { },
  methods = {
    init: function(options) {
      settings = options ? $.extend(true, {}, defaults, options ) : defaults,
        $thisSelector = $(this).selector,
        $banners = $($thisSelector + ' ' + settings.bannerSelector),
        $bannerPreviews = $($thisSelector + ' ' + settings.previewSelector);

      settings.bannerLength = $banners.length;
      settings.$me = $(this);

      $banners.filter(':first').addClass(settings.currentClass);
      $bannerPreviews.filter(':first').addClass(settings.currentClass).end()
        .bind('click', methods.previewClick);

      settings.intervalID = setInterval(methods.autoRotate, settings.rotateTime);
    },
    previewClick: function(e) {
      var $this = $(this),
        index = $this.index();

      methods.rotateBanner(index);
      clearInterval(settings.intervalID);

      settings.intervalID = setInterval(methods.autoRotate, settings.rotateTime);
    },
    autoRotate: function() {
      settings.index++;
      console.log('settings.index', settings.index);

      if(settings.index >= settings.bannerLength) {
        settings.index = 0;
      }

      methods.rotateBanner(settings.index);
    },
    left: function() {
      var $this = $(this),
        index = $this.index();
      
      settings.index--;


      if(settings.index < 0) {
        settings.index = settings.bannerLength - 1;
      }

      methods.rotateBanner(index);
      clearInterval(settings.intervalID);

      settings.intervalID = setInterval(methods.autoRotate, settings.rotateTime);
      methods.rotateBanner(settings.index);
    },

    right: function() {
      var $this = $(this),
        index = $this.index();
      
      settings.index++;

      if(settings.index >= settings.bannerLength) {
        settings.index = 0;
      }

      methods.rotateBanner(index);
      clearInterval(settings.intervalID);

      settings.intervalID = setInterval(methods.autoRotate, settings.rotateTime);
      methods.rotateBanner(settings.index);
    },
    rotateBanner: function(index) {
      settings.$me.find(settings.bannerSelector + ', ' + settings.previewSelector).removeClass(settings.currentClass);
      settings.$me.find(settings.bannerSelector + ':eq(' + index + '), ' + settings.previewSelector + ':eq(' + index + ')').addClass(settings.currentClass);
    }
  };
  $.fn.bronyconRotator = function(method) {
    if ( methods[method] ) {
      return methods[method].apply( this, Array.prototype.slice.call( arguments, 1 ));
    } else if ( typeof method === 'object' || ! method ) {
      return methods.init.apply( this, arguments );
    } else {
      $.error( 'Method ' +  method + ' does not exist on jQuery.bronyconRotator' );
    }
  };
})(jQuery)
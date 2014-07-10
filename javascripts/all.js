(function() {

  (function($) {
    var $articles, $body, $content, $frames, $header, $html, $images, $mainMenu, $maps, $menuItems, $menuToggler, $sidebar, $subMenu, $window, add_marker, center_map, changeBackground, changeHeight, contentHeight, debug, headerIn, height, isMobile, map_style, openMenu, pages, render_map, scrollSpy, sidebarHeight, width, xx;
    xx = function(t) {
      return console.log(t);
    };
    $window = $(window);
    $html = $('html');
    $body = $('body');
    $header = $('#header');
    $mainMenu = $header.find('#menu-main-menu');
    $subMenu = $header.find('.sub-menu');
    $menuToggler = $header.find('#menu-toggler');
    $content = $('#content');
    $articles = $content.find('> article');
    $sidebar = $('#sidebar');
    $menuItems = $sidebar.find('li');
    $maps = $('.acf-map');
    $frames = $('.frames');
    $images = $('img');
    height = 0;
    width = 0;
    isMobile = false;
    sidebarHeight = $sidebar.height();
    contentHeight = 0;
    map_style = [
      {
        "stylers": [
          {
            "hue": "#00c3ff"
          }, {
            "lightness": -4
          }, {
            "gamma": 0.89
          }
        ]
      }, {
        "featureType": "road",
        "elementType": "geometry.stroke",
        "stylers": [
          {
            "visibility": "off"
          }
        ]
      }, {
        "featureType": "road",
        "elementType": "geometry",
        "stylers": [
          {
            "saturation": -81
          }
        ]
      }, {
        "featureType": "water",
        "stylers": [
          {
            "saturation": -70
          }
        ]
      }
    ];
    pages = ['about', 'private-party', 'info', 'news', 'food'];
    headerIn = function() {
      return $header.addClass('active');
    };
    openMenu = function() {
      var isOpen;
      isOpen = $(this).is(':checked');
      $html.toggleClass('menu-open');
      return $mainMenu.height(height - 100);
    };
    changeBackground = function(e) {
      var id, page, _i, _len;
      id = $(e.currentTarget).attr('id').replace('frame-', '');
      for (_i = 0, _len = pages.length; _i < _len; _i++) {
        page = pages[_i];
        $body.removeClass("page-" + page);
      }
      return $body.addClass("page-" + id);
    };
    debug = function(e) {
      if (e.which !== 192) {
        return;
      }
      return $('#background').toggleClass('debug');
    };
    render_map = function($el) {
      var $markers, args, map;
      $markers = $el.find('.marker');
      args = {
        zoom: 16,
        center: new google.maps.LatLng(0, 0),
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        scrollwheel: false,
        disableDoubleClickZoom: true,
        draggable: !isMobile,
        styles: map_style
      };
      map = new google.maps.Map($el[0], args);
      map.markers = [];
      $markers.each(function() {
        return add_marker($(this), map);
      });
      return center_map(map);
    };
    add_marker = function($marker, map) {
      var infowindow, latlng, marker;
      latlng = new google.maps.LatLng($marker.attr('data-lat'), $marker.attr('data-lng'));
      marker = new google.maps.Marker({
        position: latlng,
        map: map
      });
      map.markers.push(marker);
      if ($marker.html()) {
        infowindow = new google.maps.InfoWindow({
          content: $marker.html()
        });
        return google.maps.event.addListener(marker, 'click', function() {
          return infowindow.open(map, marker);
        });
      }
    };
    center_map = function(map) {
      var bounds;
      bounds = new google.maps.LatLngBounds();
      $.each(map.markers, function(i, marker) {
        var latlng;
        latlng = new google.maps.LatLng(marker.position.lat(), marker.position.lng());
        return bounds.extend(latlng);
      });
      if (map.markers.length === 1) {
        map.setCenter(bounds.getCenter());
        return map.setZoom(16);
      } else {
        return map.fitBounds(bounds);
      }
    };
    changeHeight = function() {
      height = $window.height();
      width = $window.width();
      isMobile = width < 600;
      contentHeight = isMobile ? 'auto' : height - 280;
      if (contentHeight < sidebarHeight - 40) {
        contentHeight = sidebarHeight - 40;
      }
      return $content.css('height', contentHeight);
    };
    scrollSpy = function() {
      var $article, i, scrollTop, _i, _ref;
      scrollTop = $content.scrollTop();
      for (i = _i = 0, _ref = $articles.length; _i < _ref; i = _i += 1) {
        $article = $articles.eq(i);
        if ($article.position().top + $article.outerHeight() - contentHeight / 2 > 0 || i === $articles.length - 1) {
          $menuItems.removeClass('active').eq(i).addClass('active');
          return;
        }
      }
    };
    $window.on('resize', changeHeight);
    $content.on('scroll', scrollSpy);
    $frames.on('mouseover', 'a', changeBackground);
    $images.on('dragstart', function(e) {
      return e.preventDefault();
    });
    $window.on('keydown', debug);
    $menuToggler.on('change', openMenu);
    $subMenu.on('click', 'a', function() {
      return $menuToggler.trigger('click');
    });
    $window.resize();
    scrollSpy();
    headerIn();
    return $maps.each(function() {
      if ($maps.length) {
        return render_map($(this));
      }
    });
  })(jQuery);

}).call(this);

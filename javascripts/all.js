(function() {

  (function($) {
    var $content, $maps, $sidebar, $window, add_marker, center_map, map_style, render_map, sidebarHeight;
    $window = $(window);
    $content = $('#content');
    $sidebar = $('#sidebar');
    $maps = $('.acf-map');
    sidebarHeight = $sidebar.height();
    map_style = [
      {
        "stylers": [
          {
            "saturation": -33
          }, {
            "hue": "#ff0000"
          }, {
            "gamma": 1.37
          }
        ]
      }
    ];
    render_map = function($el) {
      var $markers, args, map;
      $markers = $el.find('.marker');
      args = {
        zoom: 16,
        center: new google.maps.LatLng(0, 0),
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        scrollwheel: false,
        disableDoubleClickZoom: true,
        draggable: false,
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
    $maps.each(function() {
      return render_map($(this));
    });
    $window.on('resize', function() {
      var fix, height, width;
      height = $window.height();
      width = $window.width();
      fix = width < 600 ? 'auto' : height - 290;
      if (fix < sidebarHeight - 80) {
        fix = sidebarHeight - 80;
      }
      return $content.css('height', fix);
    });
    return $window.resize();
  })(jQuery);

}).call(this);

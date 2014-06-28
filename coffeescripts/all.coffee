(($) ->
  $window  = $(window)
  $content = $('#content')
  $sidebar = $('#sidebar')
  $maps    = $('.acf-map')

  sidebarHeight = $sidebar.height()

  map_style = [
      "stylers": [
        { "saturation": -33 }
        { "hue": "#00aadd" }
        { "lightness": -3 }
        { "gamma": 0.8 }
      ]
  ]

  render_map = ( $el ) ->
    $markers = $el.find('.marker')

    args =
      zoom                   : 16
      center                 : new google.maps.LatLng(0, 0)
      mapTypeId              : google.maps.MapTypeId.ROADMAP
      scrollwheel            : false
      disableDoubleClickZoom : true
      draggable              : false
      styles                 : map_style

    map = new google.maps.Map($el[0], args)

    map.markers = []

    $markers.each -> add_marker($(@), map)
    center_map map

  add_marker = ( $marker, map ) ->
    latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') )
    marker = new google.maps.Marker
      position : latlng,
      map      : map

    map.markers.push marker

    if $marker.html()
      infowindow = new google.maps.InfoWindow
        content: $marker.html()

      google.maps.event.addListener(marker, 'click', -> infowindow.open( map, marker ))

  center_map = ( map ) ->
    bounds = new google.maps.LatLngBounds()
    $.each( map.markers, ( i, marker ) ->
      latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() )
      bounds.extend( latlng )
    )

    if map.markers.length == 1
      map.setCenter( bounds.getCenter() )
      map.setZoom( 16 )
    else
      map.fitBounds( bounds )

  $maps.each -> render_map( $(@) )

  $window.on 'resize', ->
    height = $window.height()
    width  = $window.width()
    fix = if( width < 600 ) then 'auto' else height - 330
    fix = sidebarHeight - 80 if fix < sidebarHeight - 80
    $content.css 'height', fix
  $('img').on 'dragstart', (e) ->
    e.preventDefault()

  $window.resize()
)(jQuery)
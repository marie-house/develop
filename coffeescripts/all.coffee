(($) ->
  xx = (t) ->
    console.log(t)

  $window    = $(window)
  $body      = $('body')
  $header    = $('#header')
  $content   = $('#content')
  $articles  = $content.find('> article')
  $sidebar   = $('#sidebar')
  $menuItems = $sidebar.find('li')
  $maps      = $('.acf-map')
  $frames    = $('.frames')
  $images    = $('img')

  sidebarHeight = $sidebar.height()
  contentHeight = 0

  map_style = [
      "stylers": [
        { "saturation": -33 }
        { "hue": "#00aadd" }
        { "lightness": -3 }
        { "gamma": 0.8 }
      ]
  ]

  pages = ['about', 'private-party', 'info', 'news', 'food']

  headerIn = -> $header.addClass 'active'

  changeBackground = (e) ->
    id = $(e.currentTarget).attr('id').replace('frame-', '')
    for page in pages
      $body.removeClass("page-#{page}")
    $body.addClass("page-#{id}")

  ############################################
  # Map
  ############################################

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

  ############################################
  # Resize
  ############################################

  changeHeight = ->
    height = $window.height()
    width  = $window.width()
    contentHeight = if( width < 600 ) then 'auto' else height - 280
    contentHeight = sidebarHeight - 40 if contentHeight < sidebarHeight - 40
    $content.css 'height', contentHeight

  ############################################
  # Scroll
  ############################################

  scrollSpy = ->
    scrollTop = $content.scrollTop()
    for i in [0...$articles.length] by 1
      $article = $articles.eq(i)
      if $article.position().top + $article.outerHeight() - contentHeight/2 > 0 || i == $articles.length - 1
        $menuItems.removeClass('active').eq(i).addClass('active')
        return

  ############################################
  # Binding
  ############################################

  $window.on 'resize', changeHeight
  $content.on 'scroll', scrollSpy
  $frames.on 'mouseover', 'a', changeBackground
  $images.on 'dragstart', (e) -> e.preventDefault()

  ############################################
  # Init
  ############################################

  do $window.resize
  do scrollSpy
  do headerIn
)(jQuery)
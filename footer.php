  </div><!-- end of #container -->
  <footer id="footer"></footer>
</div><!-- end of #wrapper -->
<div id="fb-root"></div>
<?php wp_footer(); ?>
<?php
//<script src="http://192.168.0.10:35729/livereload.js?snipver=1"></script>
?>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=565427826820895&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-52996255-1', 'auto');
  ga('send', 'pageview');
</script>
<script src="<?php echo get_stylesheet_directory_uri() ?>/javascripts/all.js?hi"></script>
</body>
</html>
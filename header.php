<!DOCTYPE html>
<html <?php language_attributes(); ?> style="margin-top: 0 !important;">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui" />
<title><?php wp_title( ' | ', true, 'right' ); ?></title>
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
<?php
$Path=$_SERVER['REQUEST_URI'];
$URI='http://www.marieshouse.com'.$Path;
?>
<meta content="<?php wp_title( ' | ', true, 'right' ); ?>" property="og:title">
<meta content="<?php echo bloginfo('name') ?>" property="og:site_name">
<meta content="<?php echo $URI ?>" property="og:url">
<meta content="<?php echo get_bloginfo('template_url') ?>/images/fb600.jpg" property="og:image">
<meta content="<?php echo bloginfo('description') ?>" property="og:description">
<meta content="website" property="og:type">
<meta content="1450988334" property="fb:admins">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="background"></div>
<div id="wrapper" class="hfeed">
  <header id="header" class="clearfix" role="banner">
    <div class="container">
      <label id="menu-label" class="pull-right" for="menu-toggler">Menu</label>
      <input type="checkbox" id="menu-toggler">
      <h1 id="site-title">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php esc_attr_e( get_bloginfo( 'name' ), 'mhouse' ); ?>" rel="home"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a>
      </h1>
      <nav id="menu" role="navigation">
        <?php wp_nav_menu(); ?>
      </nav>
    </div>
  </header>
  <div id="container" class="container">
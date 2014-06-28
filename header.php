<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui" />
<title><?php wp_title( ' | ', true, 'right' ); ?></title>
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="background"></div>
<div id="wrapper" class="hfeed">
  <header id="header" class="clearfix" role="banner">
    <div class="container">
      <label id="menu-label" class="pull-right" for="menu-toggler">Menu</label>
      <h1 id="site-title">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php esc_attr_e( get_bloginfo( 'name' ), 'mhouse' ); ?>" rel="home"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a>
      </h1>
      <input type="checkbox" id="menu-toggler">
      <nav id="menu" role="navigation">
        <?php wp_nav_menu(); ?>
      </nav>
    </div>
  </header>
  <div id="container" class="container">
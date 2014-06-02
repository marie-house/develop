<?php get_header(); ?>
<?php get_sidebar('page'); ?>
<main id="content" role="main">
<?php

if( have_rows('paragraph') ):
  while ( have_rows('paragraph') ) : the_row();
?>
<article id="<?php the_sub_field('slug'); ?>">
  <h2 class="article-title"><?php the_sub_field('title'); ?></h2>
  <?php
    $symbol = get_sub_field('symbol');
    if( $symbol ) {
  ?>
  <img class="symbol" src="<?php echo $symbol['url'] ?>" width="<?php echo $symbol['width']/2 ?>" height="<?php echo $symbol['height']/2 ?>">
  <?php }?>
  <div class="innertext"><?php the_sub_field('innertext');?></div>
</article>
<?php
  endwhile;
endif;
?>

<?php $map = get_field('map') ?>
<?php if( $map ): ?>
  <article id="map">
    <h2 class="article-title">地圖</h2>
    <div class="acf-map">
      <div class="marker" data-lat="<?php echo $map['lat']; ?>" data-lng="<?php echo $map['lng']; ?>">
        <h4>瑪麗洋房</h4>
        <p class="address"><?php echo $map['address']; ?></p>
      </div>
    </div>
  </article>
<?php endif; ?>

<?php if( have_rows('group') ): ?>
  <article id="group">
    <h2 class="article-title">關係企業</h2>
    <ul>
      <?php while( have_rows('group') ) : the_row();
        $link         = get_sub_field('link');
        $cover        = get_sub_field('cover');
        $name         = get_sub_field('name');
        $english_name = get_sub_field('english_name');
      ?>
        <li>
          <img src="<?php echo $cover['url'] ?>" alt="<?php echo $name ?>">
          <a href="<?php echo $link ?>" target="_blank">
            <?php echo $name ?><br>
            <?php echo $english_name ?>
          </a>
        </li>
      <?php endwhile; ?>
    </ul>
  </article>
<?php endif; ?>

</main>
<?php get_footer(); ?>
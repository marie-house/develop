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
</main>
<?php get_footer(); ?>
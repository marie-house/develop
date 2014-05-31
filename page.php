<?php get_header(); ?>
<main id="content" role="main">
<?php

if( have_rows('paragraph') ):
  while ( have_rows('paragraph') ) : the_row();
?>
<article>
  <h2 class="article-title"><?php the_sub_field('title'); ?></h2>
  <div class="innertext"><?php the_sub_field('innertext');?></div>
</article>
<?php
  endwhile;
endif;
?>
</main>
<?php get_sidebar('page'); ?>
<?php get_footer(); ?>


<?php get_header(); ?>
<?php get_sidebar('food'); ?>
<main id="content" role="main">
<?php

if( have_rows('features') ):
  while ( have_rows('features') ) : the_row();
?>
<article id="<?php the_sub_field('slug'); ?>">
  <h2 class="article-title"><?php the_sub_field('title'); ?></h2>
  <?php
    $symbol = get_sub_field('symbol');
    if( $symbol ):
  ?>
  <img class="symbol" src="<?php echo $symbol['url'] ?>" width="<?php echo $symbol['width']/2 ?>" height="<?php echo $symbol['height']/2 ?>">
  <?php endif; ?>
  <div class="innertext"><p><?php the_sub_field('intro');?></p></div>
  <section>
    <h3>『我們所選用的進口食材』</h3>
    <? if( have_rows('meterial') ): ?>
    <ul class="meterials-list">
    <? while ( have_rows('meterial') ) : the_row(); ?>
      <li>
        <h4><? the_sub_field('name') ?></h4>
        <sub><? the_sub_field('subtitle') ?></sub>
        <?php
          $image = get_sub_field('image');
          if( $image ):
        ?>
          <img src="<?php echo $image['url'] ?>" width="<?php echo $image['width']/2 ?>" height="<?php echo $image['height']/2 ?>">
        <? endif; ?>
        <p><? the_sub_field('introduction') ?></p>
      </li>
    <? endwhile; ?>
    </ul>
    <? endif; ?>
  </section>
  <p>
    <?php the_sub_field('brief');?>
  </p>
</article>
<?php
  endwhile;
endif;
?>

<?php
  $cat = get_category_by_slug('menus');
  $categories = get_categories( array('child_of' => $cat->term_id) );
  foreach($categories as $category): $slug = $category->slug; ?>
  <?php query_posts( array ( 'category_name' => $slug, 'posts_per_page' => 1 ) ); ?>
  <article id="<?php echo $slug ?>">
      <h2 class="article-title"><?php single_cat_title(); ?></h2>
    <img src="<?php echo get_stylesheet_directory_uri() ?>/fire/stylesheets/images/symbol-<?php echo $category->slug ?>.png" width="55" height="auto">
    <?php while (have_posts()) : the_post(); ?>
    <div class="post" id="post-<?php the_ID(); ?>">
      <span class="entry-date"><?php the_time( get_option( 'date_format' ) ); ?></span>
      <? if($slug == 'season'): ?>
        <h3>『<?php the_title(); ?>』</h3>
      <? endif; ?>
      <div class="entry">
        <?php the_content('Read more &raquo;'); ?>
      </div>
    </div>
    <?php endwhile; ?>
  </article>
<?php endforeach ?>


</main>
<?php get_footer(); ?>
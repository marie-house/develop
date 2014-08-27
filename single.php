<?php get_header(); ?>
<?php get_sidebar('news'); ?>
<main id="content" role="main">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php $category = get_the_category($post->ID); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <h2 class="article-title"><?php echo $category[1]->cat_name ?></h2>
  <div class="post" id="post-<?php the_ID(); ?>">
    <span class="entry-date"><?php the_time( get_option( 'date_format' ) ); ?></span>
    <h3><a href="<?php echo get_permalink() ?>">『<?php the_title(); ?>』</a></h3>
    <?php the_content(); ?>
  </div>
</article>
<?php endwhile; endif; ?>
<?php get_footer(); ?>
<?php get_header(); ?>
<?php get_sidebar('news'); ?>
<main id="content" role="main">

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <?php the_title(); ?>
  <?php the_content(); ?>
</article>
<?php endwhile; endif; ?>

</main>
<?php get_footer(); ?>
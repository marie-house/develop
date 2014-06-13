<?php get_header(); ?>
<?php get_sidebar('news'); ?>
<main id="content" role="main">
<?php
  $cat = get_category_by_slug('news');
  $categories = get_categories( array('child_of' => $cat->term_id) );
  foreach($categories as $category): ?>
  <?php query_posts( array ( 'category_name' => $category->slug, 'posts_per_page' => 1 ) ); ?>
  <article id="<?php echo $category->slug ?>">
    <h2 class="article-title"><?php single_cat_title(); ?></h2>
    <img src="<?php echo get_stylesheet_directory_uri() ?>/stylesheets/images/symbol-<?php echo $category->slug ?>.png" width="55" height="auto">
    <?php while (have_posts()) : the_post(); ?>
    <div class="post" id="post-<?php the_ID(); ?>">
      <span class="entry-date"><?php the_time( get_option( 'date_format' ) ); ?></span>
      <h3>『<?php the_title(); ?>』</h3>
      <div class="entry">
        <?php the_content('Read more &raquo;'); ?>
      </div>
    </div>
    <?php endwhile; ?>
  </article>
<?php endforeach ?>

<?php get_footer(); ?>
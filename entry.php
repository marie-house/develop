<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<h2 class="article-title"></h2>

<div class="post" id="post-<?php the_ID(); ?>">
  <span class="entry-date"><?php the_time( get_option( 'date_format' ) ); ?></span>
  <h3><a href="<?php echo get_permalink() ?>">『<?php the_title(); ?>』</a></h3>
  <?php the_content(); ?>
</div>

</article>
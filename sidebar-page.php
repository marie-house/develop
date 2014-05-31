<aside id="sidebar" role="complementary">
<?php if( have_rows('paragraph') ): ?>
  <?php $cover = get_field('cover'); ?>
  <?php if( $cover ): ?>
    <img src="<?php echo $cover['url'] ?>" width="<?php echo $cover['width']/2 ?>" height="<?php echo $cover['height']/2 ?>">
  <?php endif; ?>
  <ul>
    <?php while ( have_rows('paragraph') ) : the_row(); ?>
      <li>
        <a href="#"><?php the_sub_field('title'); ?></a>
      </li>
    <?php endwhile; ?>
  </ul>
<?php endif; ?>
</aside>
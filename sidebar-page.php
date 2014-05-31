<aside id="sidebar" class="pull-left" role="complementary">
<?php if( have_rows('paragraph') ): ?>
  <?php $cover = get_field('cover'); ?>
  <?php if( $cover ): ?>
    <img class="cover" src="<?php echo $cover['url'] ?>">
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
<aside id="sidebar" class="pull-left" role="complementary">
<?php $cover = get_field('cover'); ?>
<?php if( $cover ): ?>
  <img class="cover" src="<?php echo $cover['url'] ?>">
<?php endif; ?>
<?php if( have_rows('paragraph') ): ?>
  <ul>
    <?php while ( have_rows('paragraph') ) : the_row(); ?>
      <li>
        <a href="#<?php the_sub_field('slug'); ?>"><?php the_sub_field('title'); ?></a>
      </li>
    <?php endwhile; ?>
    <?php if( get_field('map') ): ?>
      <li>
        <a href="#map">地圖</a>
      </li>
    <?php endif; ?>
    <?php if( get_field('group') ): ?>
      <li>
        <a href="#group">關係企業</a>
      </li>
    <?php endif; ?>
  </ul>
<?php endif; ?>
</aside>
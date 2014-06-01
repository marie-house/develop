<aside id="sidebar" class="pull-left" role="complementary">
<?php $cover = get_field('cover'); ?>
<?php if( $cover ): ?>
  <img class="shadow-light cover" src="<?php echo $cover['url'] ?>">
<?php endif; ?>
<?php if( have_rows('paragraph') ): ?>
  <ul>
    <?php while ( have_rows('paragraph') ) : the_row(); ?>
      <li class="shadow-light">
        <a href="#<?php the_sub_field('slug'); ?>"><?php the_sub_field('title'); ?></a>
      </li>
    <?php endwhile; ?>
  </ul>
<?php endif; ?>
</aside>
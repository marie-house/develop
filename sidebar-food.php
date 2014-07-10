<aside id="sidebar" class="pull-left" role="complementary">
<?php $cover = get_field('cover'); ?>
<?php if( $cover ): ?>
  <img class="cover" src="<?php echo $cover['url'] ?>">
<?php endif; ?>
<ul>
  <?php while ( have_rows('features') ) : the_row(); ?>
    <li>
      <a href="#<?php the_sub_field('slug'); ?>"><?php the_sub_field('title'); ?></a>
    </li>
  <?php endwhile; ?>
  <?php
    $cat = get_category_by_slug('menus');
    $categories = get_categories( array('child_of' => $cat->term_id, 'orderby' => 'id', 'order' => 'ASC') );
    foreach($categories as $category): ?>
    <?php query_posts( array ( 'category_name' => $category->slug ) ); ?>
    <li class="li-<?php echo $category->slug ?>">
      <a href="#<?php echo $category->slug ?>"><?php single_cat_title(); ?></a>
    </li>
  <?php endforeach ?>
</ul>
</aside>
<aside id="sidebar" class="pull-left" role="complementary">
<?php
  $page  = get_posts( array( 'name' => 'news', 'post_type' => 'page' ) );
  $cover = get_field('cover', $page[0]->ID);
?>
<?php if( $cover ): ?>
  <img class="cover" src="<?php echo $cover['url'] ?>">
<?php endif; ?>
<ul>
  <?php
    $cat = get_category_by_slug('news');
    $categories = get_categories( array('child_of' => $cat->term_id) );
    foreach($categories as $category):?>
      <li>
        <!-- <a href="<?php echo get_category_link( $category->term_id ) ?>"><?php echo $category->name ?></a> -->
        <a href="#<?php echo $category->slug ?>"><?php echo $category->name ?></a>
      </li>
  <?php endforeach ?>
</ul>
</aside>
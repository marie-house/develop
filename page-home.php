<?php get_header(); ?>
<div class="frames">
<?php
if( have_rows('frames') ):
  while ( have_rows('frames') ) : the_row();
  $cover = get_sub_field('cover');
  $link  = get_sub_field('link');
  $slug  = get_sub_field('slug');

  if( $link):
?>
<a class="frame" id="frame-<?php echo $slug ?>" href="<?php echo $link ?>">
  <img class="shadow" src="<?php echo $cover['url'] ?>" width="<?php echo $cover['width']/2.2 ?>" height="<?php echo $cover['height']/2.2 ?>">
</a>
<?php else: ?>
  <img class="shadow frame frame-deco" id="frame-<?php echo $slug ?>" src="<?php echo $cover['url'] ?>" width="<?php echo $cover['width']/2.2 ?>" height="<?php echo $cover['height']/2.2 ?>">
<?php
    endif;
  endwhile;
endif;
?>
</div>
<?php get_footer(); ?>
<?php
/*
Template Name:  Campagne Tematiche
*/
?>
<?php get_header(); ?>
<?php
// Loop Campagne Tematiche  
$custom_query_args = array(
'post_type' => 'campagne-tematiche',
'orderby' => 'menu_order',
'order' => 'ASC',
);
$custom_query = new WP_Query( $custom_query_args );
?>
<div class="content-no-sidebar grid">
  <?php if ( $custom_query->have_posts() ) : while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <?php the_post_thumbnail('icc_category', array('class' => 'img-res','alt' => get_the_title())); ?>
      <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
      <?php the_excerpt();?>
    </article>
  <?php endwhile; endif; wp_reset_postdata(); ?>
</div> <!-- .content 	-->
<?php get_footer(); ?>

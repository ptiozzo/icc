<?php get_header(); ?>
<div class="content-no-sidebar">
<?php if( have_posts() ) : ?>
  <?php
    while(have_posts() ) : the_post();
?>

<h1><?php echo get_the_title(); ?></h1>

<?php echo the_content(); ?>

<?php
    endwhile;
else:
echo "Non ho trovato nulla";
endif;
?>

<div class="grid">

<?php
//loop campagne tematiche
$custom_query_args = array(
'post_type' => 'rassegna-stampa',
'orderby' => 'menu_order',
'order' => 'ASC',
);
$custom_query = new WP_Query( $custom_query_args );
 if ( $custom_query->have_posts() ) : while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <?php the_post_thumbnail('icc_category', array('class' => 'img-res','alt' => get_the_title())); ?>
      <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
      <?php the_excerpt();?>
    </article>
  <?php endwhile; endif; wp_reset_postdata(); ?>
  </div> <!-- .grid 	-->
</div> <!-- .content 	-->
<?php get_footer(); ?>

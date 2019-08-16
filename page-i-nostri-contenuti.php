<?php get_header(); ?>
<div class="content">
  <?php if( have_posts() ) : ?>
      <h2><?php echo single_cat_title();?></h2>
    <?php
      while(have_posts() ) : the_post();
  ?>

  <a href="<?php echo the_permalink();?>"><?php echo get_the_title(); ?></a><br />

  <?php
      endwhile;
  else:
  ?>

  <p>Non ho trovato nulla</p>

  <?php
  endif;
  ?>
</div> <!-- .content 	-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>

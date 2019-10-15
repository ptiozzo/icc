<?php get_header(); ?>
<div class="container">
  <?php if( have_posts() ) : ?>
    <?php
      while(have_posts() ) : the_post();
  ?>

  <h1><?php echo get_the_title(); ?></h1>

  <?php echo the_content(); ?>

  <?php
      endwhile;
  else:
  ?>

  <p>Non ho trovato nulla</p>

  <?php
  endif;
  ?>
</div> <!-- .content 	-->
<?php get_footer(); ?>

<?php get_header(); ?>

<div class="container pt-4 contattaci">
  <?php if( have_posts() ) : ?>
    <?php
      while(have_posts() ) : the_post();
  ?>


  <h1><?php echo get_the_title(); ?></h1>

  <?php echo the_content(); ?>

  <?php
      endwhile;
      ?>
      <div class="row justify-content-center">
        <div class="col-8">
          <?php include 'form-contattaci.php'; ?>
        </div>
      </div>
      <?php
  else:
  ?>

  <p>Non ho trovato nulla</p>

  <?php
  endif;
  ?>
</div> <!-- .content 	-->
<?php get_footer(); ?>

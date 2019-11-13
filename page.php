<?php get_header(); ?>
<?php
  //controllo le pagina è figlia di Liguria
  if ( $post->post_parent == '58464' ) {
    get_template_part('menu','liguria');
  }
?>
<div class="container pt-4">
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

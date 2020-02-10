<?php get_header(); ?>
<?php

  icc_contribuisci_db_add_data($_POST['fullname'],$_POST['fullsurname'],$_POST['email'],$_POST['telephone'],$_POST['cap'],$_POST['amount'],$_POST['frequenza']);

  //controllo le pagina è figlia di una regione
  if ( $post->post_parent == '58464' ) {
    get_template_part('liguria/menu','liguria');
  } elseif ( $post->post_parent == '44546' ) {
    get_template_part('piemonte/menu','piemonte');
  } elseif ( $post->post_parent == '44548' ) {
    get_template_part('casentino/menu','casentino');
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

<?php get_header(); ?>
<?php
  if($_POST['fullname'] != "" &&
    $_POST['fullsurname'] != "" &&
    $_POST['email'] != "" &&
    $_POST['telephone'] != "" &&
    $_POST['indirizzo'] != "" &&
    $_POST['citta'] != "" &&
    $_POST['provincia'] != "" &&
    $_POST['cap'] != "" &&
    $_POST['amount'] != "" &&
    $_POST['frequenza'] != "" &&
    $_POST['metodoPagamento'] &&
    $_POST['destinazione']
  ){
    icc_contribuisci_db_add_data($_POST['fullname'],$_POST['fullsurname'],$_POST['email'],$_POST['telephone'],$_POST['indirizzo'],$_POST['citta'],$_POST['provincia'],$_POST['cap'],$_POST['amount'],$_POST['frequenza'],$_POST['metodoPagamento'],$_POST['destinazione']);

  } else {?>
    <div class="alert alert-danger" role="alert">
      Alcuni dei dati inseriti non sono corretti, <a href="/contattaci/" class="alert-link">contatta la redazione<a/>, grazie
    </div>
    <?php
  }
  //controllo le pagina è figlia di una regione
  if ( $post->post_parent == '58464' ) {
    get_template_part('liguria/menu','liguria');
  } elseif ( $post->post_parent == '44546' ) {
    get_template_part('piemonte/menu','piemonte');
  } elseif ( $post->post_parent == '44548' ) {
    get_template_part('casentino/menu','casentino');
  }
?>
<!--
<?php
echo "Nome ".$_POST['fullname']." -- ";
echo "Cognome ".$_POST['fullsurname']." -- ";
echo "eMail ".$_POST['email']." -- ";
echo "telephone ".$_POST['telephone']." -- ";
echo "indirizzo ".$_POST['indirizzo']." -- ";
echo "citta ".$_POST['citta']." -- ";
echo "provincia ".$_POST['provincia']." -- ";
echo "cap ".$_POST['cap']." -- ";
echo "amount ".$_POST['amount']." -- ";
echo "frequenza ".$_POST['frequenza']." -- ";
echo "metodoPagamento ".$_POST['metodoPagamento']." -- ";
echo "destinazione ".$_POST['destinazione']." -- ";

?> -->
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

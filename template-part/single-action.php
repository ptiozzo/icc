<div class="single__action d-flex d-md-block justify-content-around text-center">
  <div class="my-1 d-flex flex-column justify-content-center position-relative">
    <i class="fas fa-map-marker-alt fa-2x my-auto"></i>
    <?php
      if( !empty (get_post_meta( $icc_article_ID, 'MappaProgetto',true))){
        echo '<a href="'.get_post_meta( $icc_article_ID, 'MappaProgetto',true).'" class="stretched-link"></a>';
      } else {
        echo '<a href="mappa" class="stretched-link"></a>';
      }
    ?>
    <p>Mappa</p>
  </div>
  <div class="my-1 d-flex flex-column justify-content-center position-relative">
    <button href="#" class="stretched-link btn btn-link" data-toggle="modal" data-target="#IscrizioneNewsletter">
      <i class="far fa-envelope fa-2x my-auto"></i>
    </button>
    <p>Newsletter</p>
  </div>
  <div class="my-1 d-flex flex-column justify-content-center position-relative">
    <i class="fas fa-search fa-2x my-auto"></i>
    <a href="<?php echo $icc_visione; ?>" class="stretched-link"></a>
    <p>Visione2040</p>
  </div>
  <div class="my-1 d-flex flex-column justify-content-center position-relative">
    <button href="#" class="stretched-link btn btn-link" data-toggle="modal" data-target="#IscrizioneFB">
      <i class="fab fa-facebook-f fa-2x my-auto"></i>
    </button>
    <p>Mi piace</p>
  </div>
</div>

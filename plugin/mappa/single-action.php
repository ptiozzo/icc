<div class="single__action d-flex d-md-block justify-content-around text-center">
  <script type="text/javascript">
  $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })
  </script>

  <?php if( !empty (get_post_meta( $icc_article_ID, 'Mappa_Indirizzo',true))){ ?>
    <div class="my-1 mb-3 d-flex flex-column justify-content-center position-relative" data-toggle="tooltip" data-placement="right" title="<?php echo get_post_meta( $icc_article_ID, 'Mappa_Indirizzo',true);?>">
      <i class="fas fa-location-arrow my-auto"></i>
      <p>Indirizzo</p>
    </div>
  <?php } ?>

  <?php if( !empty (get_post_meta( $icc_article_ID, 'Mappa_Sito',true))){ ?>
    <div class="my-1 mb-3 d-flex flex-column justify-content-center position-relative" data-toggle="tooltip" data-placement="right" title="<?php echo get_post_meta( $icc_article_ID, 'Mappa_Sito',true);?>">
      <i class="fas fa-globe my-auto"></i>
      <p>Sito</p>
      <a rel="nofollow" target="_blank"  rel="nofollow" target="_blank" href="<?php echo get_post_meta( $icc_article_ID, 'Mappa_Sito',true)?>" class="stretched-link"></a>
    </div>
  <?php } ?>

  <?php if( !empty (get_post_meta( $icc_article_ID, 'Mappa_Email',true))){ ?>
    <div class="my-1 mb-3 d-flex flex-column justify-content-center position-relative" data-toggle="tooltip" data-placement="right" title="<?php echo get_post_meta( $icc_article_ID, 'Mappa_Email',true);?>">
      <i class="fas fa-at my-auto"></i>
      <p>Email</p>
      <a rel="nofollow" target="_blank"  href="mailto:<?php echo get_post_meta( $icc_article_ID, 'Mappa_Email',true)?>" class="stretched-link"></a>
    </div>
  <?php } ?>

  <?php if( !empty (get_post_meta( $icc_article_ID, 'Mappa_Telefono',true))){ ?>
    <div class="my-1 mb-3 d-flex flex-column justify-content-center position-relative" data-toggle="tooltip" data-placement="right" title="<?php echo get_post_meta( $icc_article_ID, 'Mappa_Telefono',true);?>">
      <i class="fas fa-phone my-auto mt-2"></i>
      <p>Telefono</p>
      <a rel="nofollow" target="_blank"  href="tel:<?php echo get_post_meta( $icc_article_ID, 'Mappa_Telefono',true)?>" class="stretched-link"></a>
    </div>
  <?php } ?>

  <?php if( !empty (get_post_meta( $icc_article_ID, 'Mappa_FB',true))){ ?>
    <div class="my-1 mb-3 d-flex flex-column justify-content-center position-relative">
      <i class="fab fa-facebook-f my-auto"></i>
      <p>Facebook</p>
      <a rel="nofollow" target="_blank"  href="<?php echo get_post_meta( $icc_article_ID, 'Mappa_FB',true)?>" class="stretched-link"></a>
    </div>
  <?php } ?>

  <?php if( !empty (get_post_meta( $icc_article_ID, 'Mappa_IG',true))){ ?>
    <div class="my-1 mb-3 d-flex flex-column justify-content-center position-relative">
      <i class="fab fa-instagram my-auto"></i>
      <p>Instagram</p>
      <a rel="nofollow" target="_blank"  href="<?php echo get_post_meta( $icc_article_ID, 'Mappa_IG',true)?>" class="stretched-link"></a>
    </div>
  <?php } ?>

  <?php if( !empty (get_post_meta( $icc_article_ID, 'Mappa_YT',true))){ ?>
    <div class="my-1 mb-3 d-flex flex-column justify-content-center position-relative">
      <i class="fab fa-youtube my-auto"></i>
      <p>Youtube</p>
      <a rel="nofollow" target="_blank"  href="<?php echo get_post_meta( $icc_article_ID, 'Mappa_YT',true)?>" class="stretched-link"></a>
    </div>
  <?php } ?>

  <?php if( !empty (get_post_meta( $icc_article_ID, 'Mappa_IN',true))){ ?>
    <div class="my-1 mb-3 d-flex flex-column justify-content-center position-relative">
      <i class="fab fa-linkedin-in my-auto"></i>
      <p>Linkedin</p>
      <a rel="nofollow" target="_blank"  href="<?php echo get_post_meta( $icc_article_ID, 'Mappa_IN',true)?>" class="stretched-link"></a>
    </div>
  <?php } ?>

  <?php if( !empty (get_post_meta( $icc_article_ID, 'Mappa_TW',true))){ ?>
    <div class="my-1 mb-3 d-flex flex-column justify-content-center position-relative">
      <i class="fab fa-twitter my-auto"></i>
      <p>Twitter</p>
      <a rel="nofollow" target="_blank"  href="<?php echo get_post_meta( $icc_article_ID, 'Mappa_TW',true)?>" class="stretched-link"></a>
    </div>
  <?php } ?>

</div>

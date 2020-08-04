<p class="single__action text-center m-0 mt-2 d-md-none"><strong>Contatta la realtà</strong></p>
<div class="single__action d-flex d-md-block justify-content-around text-center">
  <script type="text/javascript">
  $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })
  </script>

  <?php if( !empty (get_post_meta( $icc_article_ID, 'Mappa_Indirizzo',true))){ ?>
    <input type="text" class="" style="position: absolute; left: -9999px;" value="<?php echo get_post_meta( $icc_article_ID, 'Mappa_Indirizzo',true);?>" id="ShareLink" readonly>
    <div id="indirizzo" onclick="CopiaLink()" class="my-1 mb-3 d-flex flex-column justify-content-center position-relative" data-toggle="tooltip" data-placement="right" title="<?php echo get_post_meta( $icc_article_ID, 'Mappa_Indirizzo',true);?>">
        <i class="fas fa-location-arrow my-auto"></i>
        <p class="d-none d-sm-block">Indirizzo</p>
    </div>
  <?php } ?>

  <script>
  function CopiaLink() {
    /* Get the text field */
    var copyText = document.getElementById("ShareLink");

    /* Select the text field */
    copyText.select();
    copyText.setSelectionRange(0, 99999); /*For mobile devices*/

    /* Copy the text inside the text field */
    document.execCommand("copy");

    /* Alert the copied text */
    alert("Indirizzo copiato");
  }
  </script>

  <?php if( !empty (get_post_meta( $icc_article_ID, 'Mappa_Sito',true))){ ?>
    <div class="my-1 mb-3 d-flex flex-column justify-content-center position-relative" data-toggle="tooltip" data-placement="right" title="<?php echo get_post_meta( $icc_article_ID, 'Mappa_Sito',true);?>">
      <i class="fas fa-globe my-auto"></i>
      <p class="d-none d-sm-block">Sito</p>
      <a rel="nofollow" target="_blank"  rel="nofollow" target="_blank" href="<?php echo get_post_meta( $icc_article_ID, 'Mappa_Sito',true)?>" class="stretched-link"></a>
    </div>
  <?php } ?>

  <?php if( !empty (get_post_meta( $icc_article_ID, 'Mappa_Email',true))){ ?>
    <div class="my-1 mb-3 d-flex flex-column justify-content-center position-relative" data-toggle="tooltip" data-placement="right" title="<?php echo get_post_meta( $icc_article_ID, 'Mappa_Email',true);?>">
      <i class="fas fa-at my-auto"></i>
      <p class="d-none d-sm-block">Email</p>
      <a rel="nofollow" target="_blank"  href="mailto:<?php echo get_post_meta( $icc_article_ID, 'Mappa_Email',true)?>" class="stretched-link"></a>
    </div>
  <?php } ?>

  <?php if( !empty (get_post_meta( $icc_article_ID, 'Mappa_Telefono',true))){ ?>
    <div class="my-1 mb-3 d-flex flex-column justify-content-center position-relative" data-toggle="tooltip" data-placement="right" title="<?php echo get_post_meta( $icc_article_ID, 'Mappa_Telefono',true);?>">
      <i class="fas fa-phone my-auto mt-2"></i>
      <p class="d-none d-sm-block">Telefono</p>
      <a rel="nofollow" target="_blank"  href="tel:<?php echo get_post_meta( $icc_article_ID, 'Mappa_Telefono',true)?>" class="stretched-link"></a>
    </div>
  <?php } ?>

  <?php if( !empty (get_post_meta( $icc_article_ID, 'Mappa_FB',true))){ ?>
    <div class="my-1 mb-3 d-flex flex-column justify-content-center position-relative">
      <i class="fab fa-facebook-f my-auto"></i>
      <p class="d-none d-sm-block">Facebook</p>
      <a rel="nofollow" target="_blank"  href="<?php echo get_post_meta( $icc_article_ID, 'Mappa_FB',true)?>" class="stretched-link"></a>
    </div>
  <?php } ?>

  <?php if( !empty (get_post_meta( $icc_article_ID, 'Mappa_IG',true))){ ?>
    <div class="my-1 mb-3 d-flex flex-column justify-content-center position-relative">
      <i class="fab fa-instagram my-auto"></i>
      <p class="d-none d-sm-block">Instagram</p>
      <a rel="nofollow" target="_blank"  href="<?php echo get_post_meta( $icc_article_ID, 'Mappa_IG',true)?>" class="stretched-link"></a>
    </div>
  <?php } ?>

  <?php if( !empty (get_post_meta( $icc_article_ID, 'Mappa_YT',true))){ ?>
    <div class="my-1 mb-3 d-flex flex-column justify-content-center position-relative">
      <i class="fab fa-youtube my-auto"></i>
      <p class="d-none d-sm-block">Youtube</p>
      <a rel="nofollow" target="_blank"  href="<?php echo get_post_meta( $icc_article_ID, 'Mappa_YT',true)?>" class="stretched-link"></a>
    </div>
  <?php } ?>

  <?php if( !empty (get_post_meta( $icc_article_ID, 'Mappa_IN',true))){ ?>
    <div class="my-1 mb-3 d-flex flex-column justify-content-center position-relative">
      <i class="fab fa-linkedin-in my-auto"></i>
      <p class="d-none d-sm-block">Linkedin</p>
      <a rel="nofollow" target="_blank"  href="<?php echo get_post_meta( $icc_article_ID, 'Mappa_IN',true)?>" class="stretched-link"></a>
    </div>
  <?php } ?>

  <?php if( !empty (get_post_meta( $icc_article_ID, 'Mappa_TW',true))){ ?>
    <div class="my-1 mb-3 d-flex flex-column justify-content-center position-relative">
      <i class="fab fa-twitter my-auto"></i>
      <p class="d-none d-sm-block">Twitter</p>
      <a rel="nofollow" target="_blank"  href="<?php echo get_post_meta( $icc_article_ID, 'Mappa_TW',true)?>" class="stretched-link"></a>
    </div>
  <?php } ?>
</div>

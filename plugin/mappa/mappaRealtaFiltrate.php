<?php
if($filtro == 0){
  $argsMappaArchive = array(
    'post_type' => 'contenuti-speciali',
    'posts_per_page' => 1,
    'tax_query' => array(
      array(
          'taxonomy'=> 'contenuti_speciali_filtri',
          'field'   => 'slug',
          'terms'		=> 'mappa-archivio',
      ),
    ),
  );
  $loopMappaArchive = new WP_Query( $argsMappaArchive );
  if( $loopMappaArchive->have_posts()) :
    while( $loopMappaArchive->have_posts() ) : $loopMappaArchive->the_post();
      echo "<hr>";
      the_content();
    endwhile;
  endif;
  wp_reset_postdata();
} else {
  //filtri presi da scriptArchiveMappa.php
  $argsMappaArchivio = array(
    'post_type' => array('mappa'),
    'posts_per_page' => 4,
    's' => $Realta1,
    'tax_query' => array(
        'relation' => 'AND',
        $filtroCategoria,
        $filtroRete,
        $filtroRegione,
        $filtroTipologia,
        $filtroUtente,
      ),
    'meta_query' => array(
        $filtroLatLong,
      )
  );
  $loopMappaArchivio = new WP_Query( $argsMappaArchivio );

  if($loopMappaArchivio->have_posts()){
    ?>
    <div class='head'>
      <div class='title'>
        <h5>PROGETTI IN EVIDENZA</h5>
      </div>
    </div>
    <div class="row">
        <?php
          while ($loopMappaArchivio->have_posts()) {
            $loopMappaArchivio->the_post();
            ?>
            <div class="col-6 col-md-6 mb-2">
              <div class="card h-100">
                <img src="<?php if(has_post_thumbnail()){echo get_the_post_thumbnail_url();} else {echo "https://via.placeholder.com/535x170?text=Mappa+Italia+Che+Cambia";} ?>" class="card-img-top p-0" alt="<?php echo get_the_title(); ?>">
                <div class="card-body pt-0">
                  <h5 class="card-title"><?php echo get_the_title(); ?></h5>
                  <!--<p class="card-text"><?php echo get_the_excerpt(); ?></p>-->
                  <a href="<?php the_permalink() ?>" class="stretched-link">Approfondisci</a>
                </div>
              </div>
            </div>
            <?php
          }
        ?>
    </div>
    <form class="text-center mt-3" action="<?php echo get_pagenum_link(); ?>" method="post">
      <input type="hidden" name="categoria-dropdown" value="<?php echo $Categoria1; ?>">
      <input type="hidden" name="rete-dropdown" value="<?php echo $Rete1; ?>">
      <input type="hidden" name="regione-dropdown" value="<?php echo $Regione1; ?>">
      <input type="hidden" name="provincia-dropdown" value="<?php echo $Provincia1; ?>">
      <input type="hidden" name="tipologia-dropdown" value="<?php echo $Tipologia1; ?>">
      <input type="hidden" name="nome-realta" value="<?php echo $Realta1; ?>">
      <input name="submit_tutte_le_realta" type="Submit" value="Vedi tutte le realtà" class="btn btn-primary">
    </form>
    <?php
  }
  wp_reset_postdata();
}
?>

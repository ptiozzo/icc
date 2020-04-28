<header class="menu_regioni">

  <nav class="navbar navbar-dark navbar-expand-xl">
    <button class="navbar-toggler" style="border:none;" type="button" data-toggle="collapse" data-target="#bs4navbar" aria-controls="bs4navbar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand text-white" href="/casentino/">
     <img src='<?php echo get_template_directory_uri();?>/assets/img/modules/casentino/casentino.svg' class="d-none d-sm-inline-block" alt='' title=''>
     CASENTINO CHE CAMBIA
    </a>
    <div  id="bs4navbar" class="collapse navbar-collapse">
     <?php
     wp_nav_menu([
       'menu'            => 'menu-casentino',
       'theme_location'  => 'menu-casentino',
       'container'       => '',
       'container_id'    => '',
       'container_class' => '',
       'menu_id'         => false,
       'menu_class'      => 'navbar-nav ml-2',
       'depth'           => 0,
       'fallback_cb'     => 'bs4navwalker::fallback',
       'walker'          => new bs4navwalker()
     ]);
     ?>

    </div>
  </nav>
</header>

<?php
$argsPiemSegnalaProgetto = array(
  'post_type' => 'contenuti-speciali',
  'posts_per_page' => 1,
  'tax_query' => array(
    array(
        'taxonomy'=> 'contenuti_speciali_filtri',
        'field'   => 'slug',
        'terms'		=> 'casentino-segnala-progetto',
    ),
  ),
);
$loopPiemSegnalaProgetto = new WP_Query( $argsPiemSegnalaProgetto );
if($loopPiemSegnalaProgetto->have_posts()):
 ?>
<div class="modal fade" id="CasentinoSegnalaProgetto" tabindex="-1" role="dialog" aria-labelledby="CasentinoAccediTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="CasentinoAccediTitle">Segnala un progetto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body pcc-pianfut">
        <?php
          while($loopPiemSegnalaProgetto->have_posts()) :  $loopPiemSegnalaProgetto->the_post();
            the_content();
          endwhile;
          ?>
        <a href="https://Casentino.pianetafuturo.it">Vai a PianetaFuturo</a>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>
<?php
$argsCasentinoSegnalaEvento = array(
  'post_type' => 'contenuti-speciali',
  'posts_per_page' => 1,
  'tax_query' => array(
    array(
        'taxonomy'=> 'contenuti_speciali_filtri',
        'field'   => 'slug',
        'terms'		=> 'casentino-segnala-evento',
    ),
  ),
);
$loopCasentinoSegnalaEvento = new WP_Query( $argsCasentinoSegnalaEvento );
if($loopCasentinoSegnalaEvento->have_posts()):
 ?>
<div class="modal fade" id="CasentinoSegnalaEvento" tabindex="-1" role="dialog" aria-labelledby="CasentinoAccediTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="CasentinoAccediTitle">Segnala un evento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body pcc-pianfut">
        <?php
          while($loopCasentinoSegnalaEvento->have_posts()) :  $loopCasentinoSegnalaEvento->the_post();
            the_content();
          endwhile;
          ?>
        <a href="https://Casentino.pianetafuturo.it">Vai a PianetaFuturo</a>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>
<?php
$argsCasentinoScendiPiazza = array(
  'post_type' => 'contenuti-speciali',
  'posts_per_page' => 1,
  'tax_query' => array(
    array(
        'taxonomy'=> 'contenuti_speciali_filtri',
        'field'   => 'slug',
        'terms'		=> 'casentino-scendi-piazza',
    ),
  ),
);
$loopCasentinoScendiPiazza = new WP_Query( $argsCasentinoScendiPiazza );
if($loopCasentinoScendiPiazza->have_posts()):
 ?>
<div class="modal fade" id="CasentinoScendiPiazza" tabindex="-1" role="dialog" aria-labelledby="CasentinoAccediTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="CasentinoAccediTitle">Scendi in piazza</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body pcc-pianfut">
        <?php
          while($loopCasentinoScendiPiazza->have_posts()) :  $loopCasentinoScendiPiazza->the_post();
            the_content();
          endwhile;
          ?>
        <a href="https://Casentino.pianetafuturo.it">Vai a PianetaFuturo</a>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>

<?php
$argsCasentinoBacheca = array(
  'post_type' => 'contenuti-speciali',
  'posts_per_page' => 1,
  'tax_query' => array(
    array(
        'taxonomy'=> 'contenuti_speciali_filtri',
        'field'   => 'slug',
        'terms'		=> 'casentino-bacheca',
    ),
  ),
);
$loopCasentinoBacheca = new WP_Query( $argsCasentinoBacheca );
if($loopCasentinoBacheca->have_posts()):
 ?>
<div class="modal fade" id="CasentinoBacheca" tabindex="-1" role="dialog" aria-labelledby="CasentinoBacheca" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="CasentinoAccediTitle">Inserisci un annuncio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body pcc-pianfut">
        <?php
          while($loopCasentinoBacheca->have_posts()) :  $loopCasentinoBacheca->the_post();
            the_content();
          endwhile;
          ?>
        <a href="https://Casentino.pianetafuturo.it">Vai a PianetaFuturo</a>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>

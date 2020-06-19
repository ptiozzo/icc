<header class="menu_regioni">

  <nav class="navbar navbar-dark navbar-expand-xl">
    <button class="navbar-toggler" style="border:none;" type="button" data-toggle="collapse" data-target="#bs4navbar" aria-controls="bs4navbar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand text-white" href="/liguria/">
      <img src='<?php echo get_template_directory_uri();?>/assets/img/modules/liguria/liguria.svg' class="d-none d-sm-inline-block" alt='' title=''>
      LIGURIA CHE CAMBIA
   </a>
   <div  id="bs4navbar" class="collapse navbar-collapse">

     <?php
     wp_nav_menu([
       'menu'            => 'menu-liguria',
       'theme_location'  => 'menu-liguria',
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
$argsLiguriaSegnalaProgetto = array(
  'post_type' => 'contenuti-speciali',
  'posts_per_page' => 1,
  'tax_query' => array(
    array(
        'taxonomy'=> 'contenuti_speciali_filtri',
        'field'   => 'slug',
        'terms'		=> 'liguria-segnala-progetto',
    ),
  ),
);
$loopLiguriaSegnalaProgetto = new WP_Query( $argsLiguriaSegnalaProgetto );
if($loopLiguriaSegnalaProgetto->have_posts()):
 ?>
<div class="modal fade" id="LiguriaSegnalaProgetto" tabindex="-1" role="dialog" aria-labelledby="LiguriaAccediTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="LiguriaAccediTitle">Segnala un progetto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body pcc-pianfut">
        <?php
          while($loopLiguriaSegnalaProgetto->have_posts()) :  $loopLiguriaSegnalaProgetto->the_post();
            the_content();
          endwhile;
          ?>
        <a href="https://liguria.pianetafuturo.it">Vai a PianetaFuturo</a>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>
<?php
$argsLiguriaSegnalaEvento = array(
  'post_type' => 'contenuti-speciali',
  'posts_per_page' => 1,
  'tax_query' => array(
    array(
        'taxonomy'=> 'contenuti_speciali_filtri',
        'field'   => 'slug',
        'terms'		=> 'liguria-segnala-evento',
    ),
  ),
);
$loopLiguriaSegnalaEvento = new WP_Query( $argsLiguriaSegnalaEvento );
if($loopLiguriaSegnalaEvento->have_posts()):
 ?>
<div class="modal fade" id="LiguriaSegnalaEvento" tabindex="-1" role="dialog" aria-labelledby="LiguriaAccediTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="LiguriaAccediTitle">Segnala un evento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body pcc-pianfut">
        <?php
          while($loopLiguriaSegnalaEvento->have_posts()) :  $loopLiguriaSegnalaEvento->the_post();
            the_content();
          endwhile;
          ?>
        <a href="https://liguria.pianetafuturo.it">Vai a PianetaFuturo</a>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>
<div class="modal fade" id="LiguriaAggiungiAnnuncio" tabindex="-1" role="dialog" aria-labelledby="LiguriaAggiungiAnnuncio" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="LiguriaAccediTitle">Aggiungi un annuncio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body pcc-pianfut">
        <p>Per aggiungere un annuncio vai sulla seguente pagina:</p>
        <a href="/nuovocercooffro/">Crea un nuovo annuncio</a>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

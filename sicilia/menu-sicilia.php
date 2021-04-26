<header class="menu_regioni">

  <nav class="navbar navbar-dark navbar-expand-xl">
    <button class="navbar-toggler" style="border:none;" type="button" data-toggle="collapse" data-target="#bs4navbar" aria-controls="bs4navbar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
   <a class="navbar-brand text-white" href="/sicilia/">
     <img src='<?php echo get_template_directory_uri();?>/assets/img/regioni/sicilia.svg' class="d-none d-sm-inline-block" alt='' title=''>
     SICILIA CHE CAMBIA
   </a>
   <div  id="bs4navbar" class="collapse navbar-collapse">


     <?php
     wp_nav_menu([
       'menu'            => 'menu-sicilia',
       'theme_location'  => 'menu-sicilia',
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
$argsSiciliaSegnalaEvento = array(
  'post_type' => 'contenuti-speciali',
  'posts_per_page' => 1,
  'tax_query' => array(
    array(
        'taxonomy'=> 'contenuti_speciali_filtri',
        'field'   => 'slug',
        'terms'		=> 'sicilia-segnala-evento',
    ),
  ),
);
$loopSiciliaSegnalaEvento = new WP_Query( $argsSiciliaSegnalaEvento );
if($loopSiciliaSegnalaEvento->have_posts()):
 ?>
<div class="modal fade" id="SiciliaSegnalaEvento" tabindex="-1" role="dialog" aria-labelledby="SiciliaAccediTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="SiciliaAccediTitle">Segnala un evento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body pcc-pianfut">
        <?php
          while($loopSiciliaSegnalaEvento->have_posts()) :  $loopSiciliaSegnalaEvento->the_post();
            the_content();
          endwhile;
          ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>


<?php
$argsSiciliaCollaboraConNoi = array(
  'post_type' => 'contenuti-speciali',
  'posts_per_page' => 1,
  'tax_query' => array(
    array(
        'taxonomy'=> 'contenuti_speciali_filtri',
        'field'   => 'slug',
        'terms'		=> 'sicilia-collabora-con-noi',
    ),
  ),
);
$loopSiciliaCollaboraConNoi = new WP_Query( $argsSiciliaCollaboraConNoi );
if($loopSiciliaCollaboraConNoi->have_posts()):
 ?>
<div class="modal fade" id="SiciliaCollaboraConNoi" tabindex="-1" role="dialog" aria-labelledby="SiciliaCollaboraConNoi" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="SiciliaCollaboraConNoiTitle">Collabora con noi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body pcc-pianfut">
        <?php
          while($loopSiciliaCollaboraConNoi->have_posts()) :  $loopSiciliaCollaboraConNoi->the_post();
            the_content();
          endwhile;
          ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>


<?php
$argsSiciliaDonazione = array(
  'post_type' => 'contenuti-speciali',
  'posts_per_page' => 1,
  'tax_query' => array(
    array(
        'taxonomy'=> 'contenuti_speciali_filtri',
        'field'   => 'slug',
        'terms'		=> 'sicilia-donazione',
    ),
  ),
);
$loopSiciliaDonazione = new WP_Query( $argsSiciliaDonazione );
if($loopSiciliaDonazione->have_posts()):
 ?>
<div class="modal fade" id="SiciliaDonazione" tabindex="-1" role="dialog" aria-labelledby="SiciliaDonazione" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="SiciliaDonazione">Donazione</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body pcc-pianfut">
        <?php
          while($loopSiciliaDonazione->have_posts()) :  $loopSiciliaDonazione->the_post();
            the_content();
          endwhile;
          ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>

<?php
$argsSiciliaDiventaPartner = array(
  'post_type' => 'contenuti-speciali',
  'posts_per_page' => 1,
  'tax_query' => array(
    array(
        'taxonomy'=> 'contenuti_speciali_filtri',
        'field'   => 'slug',
        'terms'		=> 'sicilia-diventa-partner',
    ),
  ),
);
$loopSiciliaDiventaPartner = new WP_Query( $argsSiciliaDiventaPartner );
if($loopSiciliaDiventaPartner->have_posts()):
 ?>
<div class="modal fade" id="SiciliaDiventaPartner" tabindex="-1" role="dialog" aria-labelledby="SiciliaDiventaPartner" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="SiciliaDiventaPartner">Diventa partner</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body pcc-pianfut">
        <?php
          while($loopSiciliaDiventaPartner->have_posts()) :  $loopSiciliaDiventaPartner->the_post();
            the_content();
          endwhile;
          ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>

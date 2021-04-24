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

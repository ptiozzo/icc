<header class="menu_regioni">

  <nav class="navbar navbar-dark navbar-expand-xl">
    <button class="navbar-toggler" style="border:none;" type="button" data-toggle="collapse" data-target="#bs4navbar" aria-controls="bs4navbar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
   <a class="navbar-brand text-white" href="/piemonte/">
     <img src='<?php echo get_template_directory_uri();?>/assets/img/modules/piemonte/piemonte.svg' class="d-none d-sm-inline-block" alt='' title=''>
     PIEMONTE CHE CAMBIA
   </a>
   <div  id="bs4navbar" class="collapse navbar-collapse">


     <?php
     wp_nav_menu([
       'menu'            => 'menu-piemonte',
       'theme_location'  => 'menu-piemonte',
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
$argsPiemonteSegnalaEvento = array(
  'post_type' => 'contenuti-speciali',
  'posts_per_page' => 1,
  'tax_query' => array(
    array(
        'taxonomy'=> 'contenuti_speciali_filtri',
        'field'   => 'slug',
        'terms'		=> 'piemonte-segnala-evento',
    ),
  ),
);
$loopPiemonteSegnalaEvento = new WP_Query( $argsPiemonteSegnalaEvento );
if($loopPiemonteSegnalaEvento->have_posts()):
 ?>
<div class="modal fade" id="PiemonteSegnalaEvento" tabindex="-1" role="dialog" aria-labelledby="PiemonteAccediTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="PiemonteAccediTitle">Segnala un evento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body pcc-pianfut">
        <?php
          while($loopPiemonteSegnalaEvento->have_posts()) :  $loopPiemonteSegnalaEvento->the_post();
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

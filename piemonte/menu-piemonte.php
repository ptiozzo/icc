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
   <div class="mx-auto mr-md-0 p-2">
     <img class="ml-2" src="<?php echo get_template_directory_uri();?>/assets/img/modules/pianetafuturo/pfuturo_logo_grigio_32.png" width="32px" height="32px" alt="Accedi">
     <button type="button" class="btn btn-outline-pf border-0 mr-2" data-toggle="modal" data-target="#PiemonteAccedi">
        Accedi
     </button>

     <button type="button" class="btn btn-region mr-2 text-white" data-toggle="modal" data-target="#PiemonteIscriviti">
      Iscriviti
     </button>
   </div>
 </nav>



</header>

<div class="modal fade" id="PiemonteAccedi" tabindex="-1" role="dialog" aria-labelledby="PiemonteAccediTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="PiemonteAccediTitle">Accedi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <iframe src="https://api.pianetafuturo.it/widget/account/ext_login.php?a=2" class="border-0" height="245px" width="100%"></iframe>
        <button type="button" class="btn btn-link-pf" data-dismiss="modal" data-toggle="modal" data-target="#PiemonteIscriviti">Non sei ancora registrato? ISCRIVITI!</button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="PiemonteIscriviti" tabindex="-1" role="dialog" aria-labelledby="PiemonteIscrivitiTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="PiemonteIscrivitiTitle">Iscriviti</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <iframe src="https://api.pianetafuturo.it/widget/account/ext_register.php?a=2" class="border-0" height="400px" width="100%"></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
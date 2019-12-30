<header class="menu_regioni">

  <nav class="navbar navbar-dark navbar-expand-xl">
    <button class="navbar-toggler" style="border:none;" type="button" data-toggle="collapse" data-target="#bs4navbar" aria-controls="bs4navbar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
   <a class="navbar-brand text-white" href="/piemonte">
     <img src='<?php echo get_template_directory_uri();?>/assets/img/modules/piemonte/piemonte.svg' class="d-none d-sm-inline-block" alt='' title=''>
     PIEMONTE CHE CAMBIA
   </a>
   <?php
   wp_nav_menu([
     'menu'            => 'menu-piemonte',
     'theme_location'  => 'menu-piemonte',
     'container'       => 'div',
     'container_id'    => 'bs4navbar',
     'container_class' => 'collapse navbar-collapse',
     'menu_id'         => false,
     'menu_class'      => 'navbar-nav mr-auto',
     'depth'           => 0,
     'fallback_cb'     => 'bs4navwalker::fallback',
     'walker'          => new bs4navwalker()
   ]);
   ?>
   <button type="button" class="btn btn-outline-dark border-0 mr-2 text-white" data-toggle="modal" data-target="#PiemonteAccedi">
     <img src="https://www.pianetafuturo.it/uploads/favicon.png" width="32px" height="32px" alt="Accedi"> Accedi
   </button>

   <button type="button" class="btn btn-region mr-2" data-toggle="modal" data-target="#PiemonteIscriviti">
    Iscriviti
   </button>
</nav>

<div class="modal fade" id="PiemonteAccedi" data-backdrop="false" tabindex="-1" role="dialog" aria-labelledby="PiemonteAccediTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="PiemonteAccediTitle">Accedi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <iframe src="https://api.pianetafuturo.it/widget/account/ext_login.php?a=21" class="border-0" height="300px" width="100%"></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="PiemonteIscriviti" data-backdrop="false" tabindex="-1" role="dialog" aria-labelledby="PiemonteIscrivitiTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="PiemonteIscrivitiTitle">Iscriviti</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <iframe src="https://api.pianetafuturo.it/widget/account/ext_register.php?a=21" class="border-0" height="400px" width="100%"></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

</header>

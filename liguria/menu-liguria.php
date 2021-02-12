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

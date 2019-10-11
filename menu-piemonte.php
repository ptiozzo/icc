<header class="menu_regioni">

  <nav class="navbar navbar-expand-xl">
    <button class="navbar-toggler" style="border:none;" type="button" data-toggle="collapse" data-target="#bs4navbar" aria-controls="bs4navbar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
   <a class="navbar-brand text-white" href="/piemonte"><img src='<?php echo get_template_directory_uri();?>/assets/img/modules/piemonte/piemonte.svg' alt='' title=''>
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
</nav>

</header>

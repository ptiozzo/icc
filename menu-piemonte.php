<section class="page-head">

  <nav class="navbar navbar-expand-md navbar-white">
   <a class="navbar-brand text-white" href="#"><img src='<?php echo get_template_directory_uri();?>/assets/img/modules/piemonte/piemonte.svg' alt='' title=''>
     PIEMONTE CHE CAMBIA
   </a>
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs4navbar" aria-controls="bs4navbar" aria-expanded="false" aria-label="Toggle navigation">
     <span class="navbar-toggler-icon"></span>
   </button>
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

<div class='right-section'>
    <ul class='actions'>
      <li class='border'>
        <a href=''>
          <figure>
            <img src='<?php echo get_template_directory_uri();?>/assets/img/icons/signup.svg' alt='' title=''>
          </figure>
          <span>Registrati</span>
        </a>
      </li>
      <li class='border'>
        <a href=''>
          <figure>
            <img src='<?php echo get_template_directory_uri();?>/assets/img/icons/signin.svg' alt='' title=''>
          </figure>
          <span>Accedi</span>
        </a>
      </li>
    </ul>
  </div>

</section>

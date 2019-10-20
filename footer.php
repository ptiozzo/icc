</div>

<footer>
<div class="d-flex flex-xl-row flex-sm-column justify-content-between align-items-center">
  <div class="d-flex flex-sm-column flex-md-row align-items-center">
    <figure class="pr-5">
      <img src='<?php echo get_template_directory_uri();?>/assets/img/logo/italia-che-cambia-footer.svg' title='' alt=''>
    </figure>

    <article>
      <b>ITALIA CHE CAMBIA</b> <br>
      <b>Associazione di promozione sociale</b> <br>
      Via Aldo Banzi, 88 - 00128, Roma (RM) <br>
      CF: 97761390588 | P. IVA: 12511651007 <br>
    </article>
  </div>
  <div class="d-flex flex-column">
    <?php
    wp_nav_menu([
      'menu'            => 'menu-social',
      'theme_location'  => 'menu-social',
      'container'       => '',
      'container_id'    => 'bs4navbar',
      'container_class' => '',
      'menu_id'         => false,
      'menu_class'      => 'nav ml-md-auto mx-sm-auto mx-md-0',
      'depth'           => 0,
      'fallback_cb'     => 'bs4navwalker::fallback',
      'walker'          => new bs4navwalker()
    ]);
    ?>



   <?php
   wp_nav_menu([
     'menu'            => 'menu-footer',
     'theme_location'  => 'menu-footer',
     'container'       => '',
     'container_id'    => 'bs4navbar',
     'container_class' => '',
     'menu_id'         => false,
     'menu_class'      => 'nav ml-auto',
     'depth'           => 0,
     'fallback_cb'     => 'bs4navwalker::fallback',
     'walker'          => new bs4navwalker()
   ]);
   ?>




  </div>
</div>
</footer>
<?php wp_footer();?>
</body>
</html>

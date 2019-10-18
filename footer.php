</div>

<footer class="d-flex justify-content-between">
<section class='left-col'>
<figure>
  <img src='<?php echo get_template_directory_uri();?>/assets/img/logo/italia-che-cambia-footer.svg' title='' alt=''>
</figure>
<article>
  <b>ITALIA CHE CAMBIA</b> <br>
  <b>Associazione di promozione sociale</b> <br>
  Via Aldo Banzi, 88 - 00128, Roma (RM) <br>
  CF: 97761390588 | P. IVA: 12511651007 <br>
</article>
</section>
<section class='right-col'>

  <?php
  wp_nav_menu([
    'menu'            => 'menu-social',
    'theme_location'  => 'menu-social',
    'container'       => 'nav',
    'container_id'    => 'bs4navbar',
    'container_class' => '',
    'menu_id'         => false,
    'menu_class'      => 'nav',
    'depth'           => 0,
    'fallback_cb'     => 'bs4navwalker::fallback',
    'walker'          => new bs4navwalker()
  ]);
  ?>



 <?php
 wp_nav_menu([
   'menu'            => 'menu-footer',
   'theme_location'  => 'menu-footer',
   'container'       => 'nav',
   'container_id'    => 'bs4navbar',
   'container_class' => '',
   'menu_id'         => false,
   'menu_class'      => 'nav',
   'depth'           => 0,
   'fallback_cb'     => 'bs4navwalker::fallback',
   'walker'          => new bs4navwalker()
 ]);
 ?>




</section>
</footer>
<?php wp_footer();?>
</body>
</html>

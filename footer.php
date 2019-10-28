</div>

<footer>
<div class="d-flex flex-lg-row flex-column justify-content-between align-items-center">
  <div class="d-flex flex-column flex-xl-row align-items-center">
    <figure class="pr-xl-5 mx-auto">
      <img src='<?php echo get_template_directory_uri();?>/assets/img/logo/italia-che-cambia-footer.svg' title='' alt=''>
    </figure>

    <article class="text-center text-xl-left">
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
      'menu_class'      => 'nav mx-auto mx-lg-0 ml-lg-auto ',
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
<script type="text/javascript">
		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-17261523-11']);
		  _gaq.push(['_trackPageview']);

		  (function() {
		    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();

</script>
</body>
</html>

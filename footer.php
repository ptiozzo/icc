<?php get_template_part('loop/custom','contribuisci'); ?>

</div> <!--wrapper -->
<!-- </div> swup -->
<?php
if (!is_page(array(69021))){ //escludo la pagina contribuisci
  get_template_part('loop/loop','newsbar');
}
?>
<footer>
<div class="row">
  <div class="col-12 col-md-4 text-center">
    <figure>
      <img src='<?php echo get_template_directory_uri();?>/assets/img/logo/italia-che-cambia-footer.svg' title='' alt=''>
    </figure>
  </div>
  <div class="col-12 col-md-4 text-center">
    <article class="text-center">
      <b>ITALIA CHE CAMBIA</b> <br>
      <b>Associazione di promozione sociale</b> <br>
      Via Aldo Banzi, 88 - 00128, Roma (RM) <br>
      CF: 97761390588 | P. IVA: 12511651007 <br>
    </article>
  </div>
  <div class="col-12 col-md-4 text-center">
    <article>
      <b>“Italia che Cambia”</b> è una testata giornalistica registrata al Tribunale di Roma n. 65/2015 del 28 aprile 2015.
      Iscrizione ROC n. 24323 ©2012-<?php echo date("Y"); ?> Associazione Italia Che Cambia.
    </article>
  </div>
  <div class="col-12">
    <?php
    wp_nav_menu([
      'menu'            => 'menu-social',
      'theme_location'  => 'menu-social',
      'container'       => '',
      'container_id'    => 'bs4navbar',
      'container_class' => '',
      'menu_id'         => false,
      'menu_class'      => 'nav justify-content-center',
      'depth'           => 0,
      'fallback_cb'     => 'bs4navwalker::fallback',
      'walker'          => new bs4navwalker()
    ]);
    ?>
  </div>
  <div class="col-12">


   <?php
   wp_nav_menu([
     'menu'            => 'menu-footer',
     'theme_location'  => 'menu-footer',
     'container'       => '',
     'container_id'    => 'bs4navbar',
     'container_class' => '',
     'menu_id'         => false,
     'menu_class'      => 'nav justify-content-center',
     'depth'           => 0,
     'fallback_cb'     => 'bs4navwalker::fallback',
     'walker'          => new bs4navwalker()
   ]);
   ?>
  </div>
</div>
  <div class="row mt-4">
    <div class="col-12 text-center">
      <?php dynamic_sidebar('footer1'); ?>
    </div>
    <div class="col-12 col-lg-6 text-center">
      <?php dynamic_sidebar('footer2'); ?>
    </div>
    <div class="col-12 col-lg-6 text-center">
      <?php dynamic_sidebar('footer3'); ?>
    </div>
  </div>
   <div class="text-center theme_switchers">
     <form name="theme_switcher_form" class="m-0 p-0">
       <div class="btn-group btn-group-toggle"  data-toggle="buttons">
         <label class="btn sun">
           <input type="radio" name="theme_switcher" value="light"><i class="fas fa-sun"></i>
         </label>
         <label class="btn moon">
           <input type="radio" name="theme_switcher" value="dark"><i class="fas fa-moon"></i>
         </label>
         <label class="btn">
           <input type="radio" name="theme_switcher" value="system"><i class="fas fa-laptop"></i>
         </label>
       </div>
     </form>
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

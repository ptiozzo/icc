<?php
/*
Template Name: Piemonte mappa
*/
?>
<?php get_header(); ?>
<main class="piemonte-che-cambia">
  <?php get_template_part('menu','piemonte'); ?>
</main>




<!-- CONTENUTO -->
<div style="margin-top: 80px;"><iframe style="border: 0px; width:100%; height: 80vh;" src="http://api.pianetafuturo.it/widget/map/std2.php?a=2&tagoverride=1&sidebar=1&nored=1"></iframe></div>



<!-- carico footer -->
<?php get_footer(); ?>
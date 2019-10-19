<?php
/*
Template Name: Piemonte calendario
*/
?>
<?php get_header(); ?>
<main class="piemonte-che-cambia">
  <?php get_template_part('menu','piemonte'); ?>
</main>




<!-- CONTENUTO -->
<div style="margin-top: 80px; padding: 20px;"><iframe style="border: 0px; width:100%; height: 1000px;" src="http://api.pianetafuturo.it/widget/calendar/calendar.php?a=2"></iframe></div>



<!-- carico footer -->
<?php get_footer(); ?>

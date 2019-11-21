<?php
/*
Template Name: Piemonte calendario
*/
?>
<?php get_header(); ?>
<?php get_template_part('menu','piemonte'); ?>

<!-- CONTENUTO -->
<div style="margin-top: 5px; padding: 20px;"><iframe style="border: 0px; width:100%; height: 1000px;" src="https://api.pianetafuturo.it/widget/calendar/calendar.php?a=2"></iframe></div>

<!-- carico footer -->
<?php get_footer(); ?>

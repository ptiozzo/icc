<?php
/*
Template Name: Liguria mappa
*/
?>
<?php get_header(); ?>
<?php get_template_part('menu','liguria'); ?>





<!-- CONTENUTO -->
<div style="margin-top: 5px;"><iframe style="border: 0px; width:100%; height: 80vh;" src="https://api.pianetafuturo.it/widget/map/std2.php?a=8&tagoverride=1&sidebar=1&nored=1"></iframe></div>



<!-- carico footer -->
<?php get_footer(); ?>

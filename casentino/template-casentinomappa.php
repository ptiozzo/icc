<?php
/*
Template Name: Casentino mappa
*/
?>
<?php get_header(); ?>
<?php get_template_part('casentino/menu','casentino'); ?>

<!-- CONTENUTO -->
<div style="margin-top: 5px;"><iframe style="border: 0px; width:100%; height: 80vh;" src="https://api.pianetafuturo.it/widget/map/std2.php?a=21&tagoverride=1&sidebar=1&nored=1"></iframe></div>

<!-- carico footer -->
<?php get_footer(); ?>

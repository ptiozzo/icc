<?php
/*
Template Name: Liguria bacheca
*/
?>
<?php get_header(); ?>
<?php get_template_part('liguria/menu','liguria'); ?>

<!-- CONTENUTO -->
<div style="margin-top: 5px; padding: 20px;"><iframe style="border: 0px; width:100%; height: 1000px;" src="https://api.pianetafuturo.it/widget/pinboard/pinboard.php?a=8"></iframe></div>

<!-- carico footer -->
<?php get_footer(); ?>
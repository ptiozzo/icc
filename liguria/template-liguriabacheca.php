<?php
/*
Template Name: liguria bacheca
*/
?>
<?php get_header(); ?>
<?php get_template_part('liguria/menu','liguria'); ?>

<!-- CONTENUTO -->
<div class="row no-gutters">
  <div class="col-lg-home-reg">
      <div style="margin-top: 5px; padding: 20px;"><iframe style="border: 0px; width:100%; height: 1000px;" src="https://api.pianetafuturo.it/widget/pinboard/pinboard.php?a=2"></iframe></div>
  </div>
  <div class="col-lg-home3">
    <aside class="sidebar">
      <div class="pcc-pianfut">
        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#liguriaSegnalaProgetto">
           Segnala un progetto
        </button>
        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#liguriaSegnalaEvento">
           Segnala un evento
        </button>
        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#liguriaBacheca">
           Inserisci un annuncio
        </button>
      </div>
    </aside>
    <aside class="sidebar">
      <?php dynamic_sidebar('liguria'); ?>
    </aside>
  </div>

</div>
<!-- carico footer -->
<?php get_footer(); ?>

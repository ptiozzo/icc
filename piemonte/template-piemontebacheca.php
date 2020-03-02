<?php
/*
Template Name: Piemonte bacheca
*/
?>
<?php get_header(); ?>
<?php get_template_part('piemonte/menu','piemonte'); ?>

<!-- CONTENUTO -->
<div class="row no-gutters">
  <div class="col-lg-home-reg">
      <div style="margin-top: 5px; padding: 20px;"><iframe style="border: 0px; width:100%; height: 1000px;" src="https://api.pianetafuturo.it/widget/pinboard/pinboard.php?a=2"></iframe></div>
  </div>
  <div class="col-lg-home3">
    <aside class="sidebar">
      <div class="pcc-pianfut">
        <h3>Pianeta Futuro</h3>
        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#PiemonteSegnalaProgetto">
           Segnala un progetto
        </button>
        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#PiemonteSegnalaEvento">
           Segnala un evento
        </button>
        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#PiemonteScendiPiazza">
           Scendi in piazza
        </button>
        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#PiemonteBacheca">
           Inserisci un annuncio
        </button>
      </div>
    </aside>
    <aside class="sidebar">
      <?php dynamic_sidebar('piemonte'); ?>
    </aside>
  </div>

</div>
<!-- carico footer -->
<?php get_footer(); ?>

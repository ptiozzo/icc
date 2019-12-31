<?php get_header(); ?>

<div class="container pt-4">
  <?php if( have_posts() ) : ?>
    <?php
      while(have_posts() ) : the_post();
  ?>
  <?php
    if ($_POST['submit_button']){
      echo $_POST['inlineRadioOptions'];
    }
  ?>
  <div class="row">
    <div class="col-12 col-md-6">
      <form class="form-contribuisci" action="<?php echo get_pagenum_link(); ?>" method="post">
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="singola">
          <label class="form-check-label" for="inlineRadio1">Singola</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="mensile" checked>
          <label class="form-check-label" for="inlineRadio2">Mensile</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="annuale">
          <label class="form-check-label" for="inlineRadio3">Annuale</label>
        </div>
        <input name="submit_button" type="Submit" value="Contribuisci" class="btn btn-secondary">
      </form>
    </div>
    <div class="col-12 col-md-6">
      <h1><?php echo get_the_title(); ?></h1>
      <?php echo the_content(); ?>
    </div>
  </div>


  <?php
      endwhile;
  else:
  ?>

  <p>Non ho trovato nulla</p>

  <?php
  endif;
  ?>
</div> <!-- .content 	-->
<!-- carico footer -->
<?php get_footer(); ?>

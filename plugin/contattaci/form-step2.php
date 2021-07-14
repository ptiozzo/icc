<?php

$args = array(
  'post_type' => 'contenuti-speciali',
  'posts_per_page' => 1,
  'tax_query' => array(
    array(
        'taxonomy'=> 'contenuti_speciali_filtri',
        'field'   => 'slug',
        'terms'		=> 'contattaci-'.$_POST['desidero'],
    ),
  ),
);
$loop = new WP_Query( $args );
//var_dump($args);
if($loop->have_posts()){
  while ($loop->have_posts()) {
    $loop->the_post();

    the_content();
    // code

  }
}


if ($_POST['desidero'] == 'segnalareunprogettoperlamappadiicc' && icc_is_region_active($_POST['mapparegione'])){
  ?>
  <br>
  <a href="/nuovarealtasegnalata/?regionemappa=<?php echo $_POST['mapparegione']; ?>" class="btn btn-primary">Segnala una realtà</a>
  <br>
  <?php
}
?>

<form id="form_contattaci_step2" class="form-inline mb-4" action="<?php echo get_pagenum_link(); ?>" method="post">
  <input type="hidden" name="sonoun" value="<?php echo $_POST['sonoun']; ?>">
  <input type="hidden" name="desidero" value="<?php echo $_POST['desidero']; ?>">
  <input type="hidden" name="submit_step2" value="submit_step2">
  <input type="submit" name="submit_step2" value="Continua con la richiesta" class="mt-3 btn btn-primary">
</form>

<?php
if(!$loop->have_posts() && !icc_is_region_active($_POST['mapparegione'])){
  ?>
  <script type="text/javascript">
    //document.getElementById("form_contattaci_step2").submit();
  </script>
  <?php
}
?>

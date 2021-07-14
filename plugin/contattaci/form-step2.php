<?php

//var_dump($_POST);

echo "Sono un ".$_POST['sonoun'];
echo " e desidero ". $_POST['desidero'];

$args = array(
  'post_type' => 'contenuti-speciali',
  'posts_per_page' => 1,
  'tax_query' => array(
    array(
        'taxonomy'=> 'contenuti_speciali_filtri',
        'field'   => 'slug',
        'terms'		=> 'contattaci-'.$_POST['sonoun']."-".$_POST['desidero'],
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
?>
<form id="form_contattaci_step2" class="form-inline mb-4" action="<?php echo get_pagenum_link(); ?>" method="post">
  <input type="hidden" name="sonoun" value="<?php echo $_POST['sonoun']; ?>">
  <input type="hidden" name="desidero" value="<?php echo $_POST['desidero']; ?>">
  <input type="hidden" name="submit_step2" value="submit_step2">
  <input type="submit" name="submit_step2" value="Continua" class="mt-3 btn btn-primary">
</form>

<?php
if(!$loop->have_posts()){
  ?>
  <script type="text/javascript">
    //document.getElementById("form_contattaci").submit();
  </script>
  <?php
}
?>

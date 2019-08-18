<?php get_header(); ?>
<div class="content">

<script>

function iNostriContenuti(selectObject) {
  var cat = selectObject.value;
  sessionStorage.setItem('iNostriContenutiCateg', cat);
  location.reload();
}

</script>

<select name="event-dropdown" onchange="iNostriContenuti(this)">
    <option value=""><?php echo 'Mostra tutte le categorie'; ?></option>
    <?php
    $categories = get_categories('child_of=2294');
    foreach ($categories as $category) {
        $option = '<option value="'.$category->category_nicename.'">';
        $option .= $category->cat_name;
        $option .= '</option>';
        echo $option;
    }
    ?>
</select>

<br />

<?php

  $cat = 'i-nostri-contenuti';

  $args = array(
      'category_name' => $cat,
      'posts_per_page' => 20
  );
  $loop = new WP_Query( $args );
  if( $loop->have_posts() ) :
    ?>
    <?php
      while( $loop->have_posts() ) : $loop->the_post();
  ?>

  <a href="<?php echo the_permalink();?>"><?php echo get_the_title(); ?></a><br />

  <?php
      endwhile;
  else:
  ?>

  <p>Non ho trovato nulla</p>

  <?php
  endif;
  wp_reset_query();
?>

</div> <!-- .content 	-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>

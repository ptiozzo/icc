<?php get_header(); ?>
<div class="content">

<script>
//scrittura cookie per impostazione menu' a tendina e ricarica della pagina
function iNostriContenuti(selectObject,link) {
  var cat = selectObject.value;
  sessionStorage.setItem('iNostriContenutiCateg', cat);
  document.cookie = "iNostriContenutiCateg="+ cat +";path=/";
  document.cookie = "iNostriContenutiPage=0;path=/";
  window.open(link,'_self');
}
</script>


<?php
//lettura cookie per impostazione select
  if(!isset($_COOKIE['iNostriContenutiCateg']) || $_COOKIE['iNostriContenutiCateg'] == 'i-nostri-contenuti') {
      $cat = 'i-nostri-contenuti';
      echo '<h1>I Nostri contenuti</h1>';
  } else {
      $cat = $_COOKIE['iNostriContenutiCateg'];
      echo '<h2>I Nostri contenuti</h2>';
      echo '<h1>'.get_category_by_slug($cat)->name.'</h1>';
  }
//lettura cookie per impostazione $paged
  if(isset($_COOKIE['iNostriContenutiPage']) && $_COOKIE['iNostriContenutiCateg'] == 0)
  {
    $paged = 0;
    ?>
    <script>
      document.cookie = "iNostriContenutiPage=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    </script>
    <?php
  }


?>

<!-- Dropdown per selezione categoria -->
<select name="event-dropdown" onchange="iNostriContenuti(this,'<?php echo get_pagenum_link();?>')">
    <option value="i-nostri-contenuti" <?php if ($cat == 'i-nostri-contenuti') {echo 'selected';}?> ><?php echo 'I nostri contenuti'; ?></option>
    <?php
    $categories = get_categories('child_of=2294');
    foreach ($categories as $category) {
        $option = '<option value="'.$category->category_nicename.'" ';
        if ($cat == $category->category_nicename) {$option .= 'selected ';};
        $option .= '>'.$category->cat_name;
        $option .= '</option>';
        echo $option;
    }
    ?>
</select>
<!-- eliminazione cookie
<script>
document.cookie = "iNostriContenutiCateg=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
</script>
-->
<br /><br />

<!-- query personalizzata -->
<?php

  $args = array(
      'category_name' => $cat,
      'posts_per_page' => 20,
      'paged'          => $paged
  );
  $loop = new WP_Query( $args );

  $wp_query = NULL;
  $wp_query = $loop;
  if( $loop->have_posts() ) :
    ?>
    <?php
      while( $loop->have_posts() ) : $loop->the_post();
    ?>

  <a href="<?php echo the_permalink();?>"><?php echo get_the_title(); ?></a> - <?php the_time('j M , Y') ?> - <?php the_category(', '); ?><br />

<?php endwhile; ?>

      <div class="pagination">
        <br />
      			<?php

            /* Pagination */
      			$big = 999999999; // need an unlikely integer
      			echo paginate_links( array(
      				'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
      				'format' => '?paged=%#%',
      				'current' => max( 1, get_query_var('paged') ),
      				'total' => $loop->max_num_pages
      			) );




      			?>

        </div>

  <?php else: ?>

  <p>Non ho trovato nulla</p>

  <?php
  endif;
  wp_reset_query();
?>
<!-- fine loop -->

</div> <!-- .content 	-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>

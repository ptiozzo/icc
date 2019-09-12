<?php get_header(); ?>
<?php
  $ParentCat1='i-nostri-contenuti';
  $ParentCat2='tematica';
?>
<div class="content-no-sidebar">
  <div class="category-<?php echo get_term_by('name', single_cat_title('',false), 'category')->slug; ?> clearfix">
  <?php
  // Verifico se ho premuto submit e setto le categorie
  // il paged e salvo tutto in sessione
  if ($_POST['submit_button']){
    $Cat1 = $_POST['contenuti-dropdown'];
    $Cat2 = $_POST['tematica-dropdown'];
    $ord = $_POST['order-dropdown'];
    $paged = 0;
    $_SESSION['cat1'] = $Cat1;
    $_SESSION['cat2'] = $Cat2;
    $_SESSION['ord'] = $ord;
  } else {
    //Se non ho premuto submit verifico se ho qualcosa in sesisone,
    //altrimenti vado ai valori di default
    if(isset($_SESSION['cat1'])) {
        $Cat1 = $_SESSION['cat1'];
    } else {
      $Cat1=$ParentCat1;
    }
    if(isset($_SESSION['cat2'])) {
        $Cat2 = $_SESSION['cat2'];
    } else {
      $Cat2=$ParentCat2;
    }
    if(isset($_SESSION['ord'])) {
        $ord = $_SESSION['ord'];
    } else {
      $ord="DESC";
    }
  }
  if(!is_category('i-nostri-contenuti')){
    $Cat1 = get_term_by('name', single_cat_title('',false), 'category')->slug;
  }
  if ($Cat1 == $ParentCat1){
    echo "<h1>".get_category_by_slug($ParentCat1)->name."</h1>";
  }
  else {
    echo "<h2>".get_category_by_slug($ParentCat1)->name."</h2>";
    echo "<h1>".get_category_by_slug($Cat1)->name."</h1>";
  }
 ?>
  <!-- Dropdown per selezione contenuto -->
  <form method="post" action="<?php echo get_pagenum_link(); ?>">
    <?php
      if(is_category('i-nostri-contenuti')){
        ?>
        <select name="contenuti-dropdown">
          <option value="i-nostri-contenuti" <?php if ($Cat1 == 'i-nostri-contenuti') {echo 'selected';}?> ><?php echo 'I nostri contenuti'; ?></option>
          <?php
            $categories = get_categories('child_of='.get_category_by_slug($ParentCat1)->term_id);
            foreach ($categories as $category) {
              $option = '<option value="'.$category->category_nicename.'" ';
              if ($Cat1 == $category->category_nicename) {$option .= 'selected ';};
              $option .= '>'.$category->cat_name;
              $option .= '</option>';
              echo $option;
            }
          ?>
          <option value="nostri-libri" <?php if ($Cat1 == 'nostri-libri') {echo 'selected';}?>>I nostri libri</option>
        </select>
        <?php
        }
        ?>
      <!-- Dropdown per selezione tematica -->
      <select name="tematica-dropdown">
        <option value="tematica" <?php if ($Cat2 == 'tematica') {echo 'selected';}?> ><?php echo 'Tematica'; ?></option>
        <?php
          $categories = get_categories('child_of='.get_category_by_slug($ParentCat2)->term_id);
          foreach ($categories as $category) {
            $option = '<option value="'.$category->category_nicename.'" ';
            if ($Cat2 == $category->category_nicename) {$option .= 'selected ';};
            $option .= '>'.$category->cat_name;
            $option .= '</option>';
            echo $option;
          }
          ?>
      </select>
    <!-- Dropdown per ordinemento post -->
    <select name="order-dropdown">
        <option value="DESC" <?php if ($ord == 'DESC') {echo 'selected';}?> >Ordina per data più recente</option>
        <option value="ASC" <?php if ($ord == 'ASC') {echo 'selected';}?> >Ordina per data meno recente</option>
    </select>
    <input name="submit_button" type="Submit" value="Filtra">
  </form>

  <br /><br />

  <?php
    /* Personalizzo query */
    if($Cat1 != "nostri-libri"){
      $args = array(
          'category_name' => $Cat1."+".$Cat2,
          'posts_per_page' => 20,
          'paged'          => $paged,
          'order'         => $ord
      );
    } else {
      $args = array(
      'post_type' => 'nostri-libri',
      'orderby' => 'menu_order',
      'paged'          => $paged,
      'order' => $ord,
      );
    }
    /*eseguo la query */
    $loop = new WP_Query( $args );

    if( $loop->have_posts() ) :
      /* Eseguo qualcosa se ho post nel loop */
      ?>
      <div class="grid">
      <?php
      while( $loop->have_posts() ) : $loop->the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <!-- Immagine in evidenza -->
          <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail('icc_inostricontenuti', array('class' => 'img-res','alt' => get_the_title())); ?>
			    </a>
          <!-- Autore o autori -->
          <?php
            echo "<p>Scritto da ".get_the_author();
            /* controllo se esiste un secondo autore */
            if( !empty (get_post_meta( get_the_ID(), 'SecondoAutore',true))){
              echo " e ". get_post_meta( get_the_ID(), 'SecondoAutore',true);
            }
            echo "</p>";
          ?>
          <!-- Titolo -->
          <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			    <?php the_excerpt();?>
          <!-- Leggi tutto -->
          <a href="<?php the_permalink(); ?>">Leggi tutto</a>
        </article>
        <?php
      endwhile;
        ?>
      </div> <!-- .grid -->
        <!-- paginazione -->
        <div class="clearfix"></div>
        <div class="pagination">
        <br />
        	<?php
        		$big = 999999999; // need an unlikely integer
        		echo paginate_links( array(
        			'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        			'format' => '?paged=%#%',
        			'current' => max( 1, get_query_var('paged') ),
        			'total' => $loop->max_num_pages
        		) );
          ?>
        </div>
        <?php
      else:
        ?>
        <p>Spiacente, ma la tua ricerca non ha prodotto nessun risultato</p>
        <?php
      endif;
    wp_reset_query();
  ?>
  <!-- fine loop -->
</div><!-- .category -->
</div><!-- .content 	-->
<!-- carico footer -->
<?php get_footer(); ?>

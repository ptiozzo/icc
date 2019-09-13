<?php get_header(); ?>
<?php
  $ParentCat1='i-nostri-contenuti';
  $ParentCat2='tematica';
?>
<div class="content-no-sidebar">
  <div class="category-<?php echo get_term_by('name', single_cat_title('',false), 'category')->slug; ?> clearfix">
<div class="contenuti_header">
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
</div><!-- contenuti_header -->
<?php if ($Cat1 != $ParentCat1){ ?>
  <div class="cat2 category-<?php echo $Cat1 ?>">
    <?php if ($Cat1 != "nostri-libri"){ ?>
      <h1><?php echo get_category_by_slug($Cat1)->name ?></h1>
    <?php } else { ?>
      <h1>I nostri libri</h1>
    <?php } ?>
  </div>
<?php } ?>


  <?php

    $CatTerm = $Cat1."+".$Cat2;
    ?>
    <!--
    <?php
    echo "Contenuto ".$Cat1;
    echo " - Tematica ".$Cat2;
    echo " - Categoria di Ricerca ".$CatTerm;
    echo " - Ordinamento ".$ord;
    ?>
    -->
    <?php
    /* Personalizzo query */
    if($Cat1 != "nostri-libri"){
      $args = array(
          'category_name' => $CatTerm,
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
          <a href='<?php the_permalink(); ?>'>
            <?php
            if ($Cat1 == $ParentCat1) { ?>
              <div class='category'>
                <span><?php the_time('j M') ?></span>
                <span>
                  <?php
                    if (in_category('documentari')) {
                      echo 'I documentari';
                    } elseif (in_category('le-storie')) {
                      echo 'Le storie';
                    }elseif (in_category('meme')) {
                      echo 'I meme';
                    }elseif (in_category('rubriche')) {
                      echo 'Le rubriche';
                    }elseif (in_category('salute-che-cambia')) {
                      echo 'Salute';
                    }elseif (in_category('articoli')) {
                      echo 'Gli Articoli';
                    }
                  ?>
                </span>
              </div>
            <?php } ?>
            <!-- Immagine in evidenza -->
            <figure>
              <?php
                if ($Cat1 != "nostri-libri"){
                  the_post_thumbnail('icc_category', array('class' => 'img-res','alt' => get_the_title()));
                } else {
                  the_post_thumbnail('icc_libri', array('class' => 'img-res','alt' => get_the_title()));
                }
              ?>
            </figure>
            <!-- Autore o autori -->
            <?php
            if ($Cat1 != "nostri-libri"){
              echo "<div class='autore'>Scritto da <b>".get_the_author();
              /* controllo se esiste un secondo autore */
              if( !empty (get_post_meta( get_the_ID(), 'SecondoAutore',true))){
                echo " e ". get_post_meta( get_the_ID(), 'SecondoAutore',true);
              }
              echo "</b></div>";
            }
            ?>
            <!-- Titolo -->
            <div class='title'>
              <h3><?php the_title(); ?></h3>
            </div>

              <?php the_excerpt();?>

            <div class='cta'>LEGGI DI PIÙ</div>
          </a>
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
          <br /><br /><br /><br /><br /><p>Spiacente, ma la tua ricerca non ha prodotto nessun risultato</p>
        <?php
      endif;
    wp_reset_query();
  ?>
  <!-- fine loop -->
</div><!-- .category -->
</div><!-- .content 	-->
<!-- carico footer -->
<?php get_footer(); ?>

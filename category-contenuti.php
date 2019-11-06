<?php get_header(); ?>
<?php
  $ParentCat1='contenuti';
  $ParentCat2='tematica';
?>
<div class="container-fluid contenuti">
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
  if(!is_category('contenuti')){
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
  <form class="pt-2 text-center" method="post" action="<?php echo get_pagenum_link(); ?>">
    <?php
      if(is_category('contenuti')){
        ?>
        <select name="contenuti-dropdown">
          <option value="contenuti" <?php if ($Cat1 == 'contenuti') {echo 'selected';}?> ><?php echo 'Tutti i contenuti'; ?></option>
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
          <option value="rassegna-stampa" <?php if ($Cat1 == 'rassegna-stampa') {echo 'selected';}?>>Io non mi rassegno</option>
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
    if( ($Cat1 == $ParentCat1) && ($Cat2 == $ParentCat2)){
      $CatTerm = '';
    } elseif ($Cat1 == $ParentCat1) {
      $CatTerm = $Cat2;
    } elseif ($Cat2 == $ParentCat2) {
      $CatTerm = $Cat1;
    } else {
      $CatTerm = $Cat1.'+'.$Cat2;
    }

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
    if ($Cat1 == "nostri-libri") {
      $args = array(
      'post_type' => 'nostri-libri',
      'orderby' => 'menu_order',
      'paged'          => $paged,
      'order' => $ord,
      );
    } elseif ($Cat1 == "rassegna-stampa") {
      $args = array(
        'post_type' => 'rassegna-stampa',
        'orderby' => 'menu_order',
        'paged'          => $paged,
        'order' => $ord,
      );
    }else {
      $args = array(
          'category_name' => $CatTerm,
          'posts_per_page' => 20,
          'ignore_sticky_posts' => 1,
          'paged'          => $paged,
          'order'         => $ord,
          'cat' => array(-2298),
      );
    }
    /*eseguo la query */
    $loop = new WP_Query( $args );

    if( $loop->have_posts() ) :
      /* Eseguo qualcosa se ho post nel loop */
      ?>
      <div class="row">
      <?php
      while( $loop->have_posts() ) : $loop->the_post(); ?>
        <div class="col-xl-5ths col-lg-3 col-md-4 col-sm-6">
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
                      } elseif (in_category('io-faccio-cosi')) {
                        echo 'Io faccio così';
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
                    if ( has_post_thumbnail() ) {
      								the_post_thumbnail('icc_ultimenewshome', array('class' => 'img-fluid card-img-top mx-auto d-block p-1','alt' => get_the_title()));
      							}
      							else{
      								echo '<img class="img-fluid card-img-top mx-auto d-block p-1" src="'.catch_that_image().'" />';
      							}
                  } else {
                    the_post_thumbnail('icc_libri', array('class' => 'img-fluid','alt' => get_the_title()));
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
        </div>
        <?php
      endwhile;
        ?>
      </div> <!-- .grid -->
        <!-- paginazione -->

      <?php echo bootstrap_pagination($loop); ?>

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

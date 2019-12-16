<?php get_header(); ?>
<?php
  $ParentCat1='contenuti';
  $ParentCat2='tematica';
  $ParentReg='regioni';
?>
<div class="container-fluid contenuti">
  <div class="category-<?php echo get_term_by('name', single_cat_title('',false), 'category')->slug; ?> clearfix">
<div class="contenuti_header">
  <?php
  // Verifico se ho premuto submit e setto le categorie
  // il paged e salvo tutto in sessione
  //echo "TRAN PRIMA: ".get_transient('icc_contenutiCat1_'.(string) $_COOKIE['PHPSESSID'])."-".get_transient('icc_contenutiCat2_'.(string) $_COOKIE['PHPSESSID'])."-".get_transient('icc_contenutiOrd_'.(string) $_COOKIE['PHPSESSID'])."<br>";
  if ($_POST['submit_button']){
    $Cat1 = $_POST['contenuti-dropdown'];
    $Cat2 = $_POST['tematica-dropdown'];
    $reg = $_POST['regione-dropdown'];
    $ord = $_POST['order-dropdown'];
    set_transient('icc_contenutiCat1_'.(string) $_COOKIE['PHPSESSID'],$Cat1,12 * HOUR_IN_SECONDS);
    set_transient('icc_contenutiCat2_'.(string) $_COOKIE['PHPSESSID'],$Cat2,12 * HOUR_IN_SECONDS);
    set_transient('icc_contenutiReg_'.(string) $_COOKIE['PHPSESSID'],$reg,12 * HOUR_IN_SECONDS);
    set_transient('icc_contenutiOrd_'.(string) $_COOKIE['PHPSESSID'],$ord,12 * HOUR_IN_SECONDS);
    $paged = 0;
  } else {
    //Se non ho premuto submit verifico se ho qualcosa in sesisone,
    //altrimenti vado ai valori di default
    if(get_transient('icc_contenutiCat1_'.(string) $_COOKIE['PHPSESSID'])) {
        $Cat1 = get_transient('icc_contenutiCat1_'.(string) $_COOKIE['PHPSESSID']);
    } else {
      $Cat1 = $ParentCat1;
    }
    if(get_transient('icc_contenutiCat2_'.(string) $_COOKIE['PHPSESSID'])) {
        $Cat2 = get_transient('icc_contenutiCat2_'.(string) $_COOKIE['PHPSESSID']);
    } else {
      $Cat2 = $ParentCat2;
    }
    if(get_transient('icc_contenutiReg_'.(string) $_COOKIE['PHPSESSID'])) {
        $reg = get_transient('icc_contenutiReg_'.(string) $_COOKIE['PHPSESSID']);
    } else {
      $reg = $ParentReg;
    }
    if(get_transient('icc_contenutiOrd_'.(string) $_COOKIE['PHPSESSID'])) {
        $ord = get_transient('icc_contenutiOrd_'.(string) $_COOKIE['PHPSESSID']);
    } else {
      $ord = "DESC";
    }
  }
  //echo "TRAN DOPO: ".get_transient('icc_contenutiCat1_'.(string) $_COOKIE['PHPSESSID'])."-".get_transient('icc_contenutiCat2_'.(string) $_COOKIE['PHPSESSID'])."-".get_transient('icc_contenutiOrd_'.(string) $_COOKIE['PHPSESSID'])."<br>";
  //echo "VAR: ".$Cat1."-".$Cat2."-".$ord."<br>";
  if ($Cat1 == $ParentCat1){
    echo "<h1>".get_category_by_slug($ParentCat1)->name."</h1>";
  }
  else {
    echo "<h2>".get_category_by_slug($ParentCat1)->name."</h2>";
  }
 ?>
  <!-- Dropdown per selezione contenuto -->
  <form class="pt-2 form-inline" method="post" action="<?php echo get_pagenum_link(); ?>" data-swup-form>
        <select name="contenuti-dropdown" class="custom-select">
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
          <option value="rassegna-stampa" <?php if ($Cat1 == 'rassegna-stampa') {echo 'selected';}?>>Rassegna stampa</option>
          <option value="nostri-libri" <?php if ($Cat1 == 'nostri-libri') {echo 'selected';}?>>I nostri libri</option>
        </select>
      <!-- Dropdown per selezione tematica -->
      <select name="tematica-dropdown"  class="custom-select">
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
      <!-- Dropdown per selezione regione -->
      <select name="regione-dropdown"  class="custom-select">
        <option value="regioni" <?php if ($reg == 'regioni') {echo 'selected';}?> ><?php echo 'Nazionale'; ?></option>
        <?php
          $categories = get_categories('child_of='.get_category_by_slug($ParentReg)->term_id);
          foreach ($categories as $category) {
            $option = '<option value="'.$category->category_nicename.'" ';
            if ($reg == $category->category_nicename) {$option .= 'selected ';};
            $option .= '>'.$category->cat_name;
            $option .= '</option>';
            echo $option;
          }
          ?>
      </select>
    <!-- Dropdown per ordinemento post -->
    <select name="order-dropdown"  class="custom-select">
        <option value="DESC" <?php if ($ord == 'DESC') {echo 'selected';}?> >Ordina per data più recente</option>
        <option value="ASC" <?php if ($ord == 'ASC') {echo 'selected';}?> >Ordina per data meno recente</option>
    </select>
    <input name="submit_button" type="Submit" value="Filtra" class="btn btn-secondary">

  </form>
</div><!-- contenuti_header -->
<?php if ($Cat1 != $ParentCat1){ ?>
  <div class="cat2 category-<?php echo $Cat1 ?>">
    <?php
    if ($Cat1 == "nostri-libri"){
      echo "<h1>I nostri libri</h1>";
    }elseif ($Cat1 == "rassegna-stampa"){
      echo "<h1>Rassegna stampa</h1>";
    }else {
      echo "<h1>". get_category_by_slug($Cat1)->name. "</h1>";
    } ?>
  </div>
<?php } ?>


  <?php
    $CatTerm = '';
    if($Cat1 != $ParentCat1) {
      $CatTerm .= $Cat1;
    }
    if($Cat2 != $ParentCat2) {
      if($CatTerm == ''){
        $CatTerm = $Cat2;
      }else{
        $CatTerm .= "+".$Cat2;
      }
    }
    if($reg != $ParentReg) {
      if($CatTerm == ''){
        $CatTerm = $reg;
      }else{
        $CatTerm .= "+".$reg;
      }
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
      'paged'          => $paged,
      'order' => $ord,
      );
    } elseif ($Cat1 == "rassegna-stampa") {
      $args = array(
        'post_type' => 'rassegna-stampa',
        'paged'          => $paged,
        'order' => $ord,
      );
    } elseif($reg != $ParentReg) {
      $args = array(
          'post_type' => array('post','rassegna-stampa','nostri-libri'),
          'category_name' => $CatTerm,
          'posts_per_page' => 20,
          'ignore_sticky_posts' => 1,
          'paged'          => $paged,
          'order'         => $ord,
      );
    } else {
      $args = array(
          'post_type' => array('post','rassegna-stampa','nostri-libri'),
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
        <div class="col-xl-5ths col-lg-3 col-md-4 col-sm-6 text-break">
          <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <a href='<?php the_permalink(); ?>'>
                <div class='category'>
                  <span><?php the_time('j M Y') ?></span>
                  <span>
                    <?php get_template_part('inc/post','etichetta'); ?>
                  </span>
                </div>
              <!-- Immagine in evidenza -->
              <figure>
                <?php

                  if ($Cat1 != "nostri-libri"){
                    if ( has_post_thumbnail() ) {
      								the_post_thumbnail('icc_ultimenewshome', array('class' => 'img-fluid card-img-top mx-auto d-block p-1','alt' => get_the_title()));
      							}else{
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
      </div>
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

<?php get_header(); ?>
<?php
  $ParentCat1='rubriche';
?>
<div class="container-fluid contenuti">
  <div class="category-<?php echo get_term_by('name', single_cat_title('',false), 'category')->slug; ?> clearfix">
<div class="contenuti_header">
  <?php
  // Verifico se ho premuto submit e setto le categorie
  // il paged e salvo tutto in sessione
  if ($_POST['submit_button']){
    $RubricheCat1 = $_POST['rubriche-dropdown'];
    $ord = $_POST['order-dropdown'];
    $paged = 0;
    set_transient('icc_rubricheCat1_'.(string) $_COOKIE['PHPSESSID'],$RubricheCat1,12 * HOUR_IN_SECONDS);
  } else {
    //Se non ho premuto submit verifico se ho qualcosa in sesisone,
    //altrimenti vado ai valori di default
    if(get_transient('icc_rubricheCat1_'.(string) $_COOKIE['PHPSESSID'])) {
        $RubricheCat1 = get_transient('icc_rubricheCat1_'.(string) $_COOKIE['PHPSESSID']);
    } else {
      $RubricheCat1 = $ParentCat1;
    }
  }
  if(!is_category('rubriche')){
    $RubricheCat1 = get_term_by('name', single_cat_title('',false), 'category')->slug;
  }
  if ($RubricheCat1 == $ParentCat1){
    echo "<h1>".get_category_by_slug($ParentCat1)->name."</h1>";
  }
  else {
    echo "<h2>".get_category_by_slug($ParentCat1)->name."</h2>";
  }
 ?>
  <!-- Dropdown per selezione contenuto -->
  <form class="pt-2 form-inline" method="post" action="<?php echo get_pagenum_link(); ?>" data-swup-form>

        <select name="rubriche-dropdown" class="custom-select">
          <option value="rubriche" <?php if ($RubricheCat1 == 'rubriche') {echo 'selected';}?> ><?php echo 'Tutte le rubriche'; ?></option>
          <?php
            $categories = get_categories('child_of='.get_category_by_slug($ParentCat1)->term_id);
            foreach ($categories as $category) {
              $option = '<option value="'.$category->category_nicename.'" ';
              if ($RubricheCat1 == $category->category_nicename) {$option .= 'selected ';};
              $option .= '>'.$category->cat_name;
              $option .= '</option>';
              echo $option;
            }
          ?>
        </select>

    <input name="submit_button" type="Submit" value="Filtra" class="btn btn-secondary">
  </form>
</div><!-- contenuti_header -->
<?php if ($RubricheCat1 != $ParentCat1){ ?>
  <div class="cat2 category-rubriche">
      <h1><?php echo get_category_by_slug($RubricheCat1)->name ?></h1>
  </div>
<?php } ?>



  <?php

    if ($RubricheCat1 == $ParentCat1){
      $CatTerm = 'rubriche';
    } else {
      $CatTerm = $RubricheCat1;
    }

    ?>
    <!--
    <?php
    echo "Rubrica ".$RubricheCat1;
    echo " - Categoria di Ricerca ".$CatTerm;
    ?>
    -->
    <?php
    /* Personalizzo query */
      $args = array(
          'category_name' => $CatTerm,
          'posts_per_page' => 20,
          'ignore_sticky_posts' => 1,
          'paged'          => $paged,
          'cat'            => array(-2298),
      );

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
              <?php
              if ($RubricheCat1 == $ParentCat1) { ?>
                <div class='category'>
                  <span><?php the_time('j M Y') ?></span>
                  <span>
                    <?php get_template_part('inc/post','etichetta'); ?>
                  </span>
                </div>
              <?php } ?>
              <!-- Immagine in evidenza -->
              <figure>
                <?php
                  if ($RubricheCat1 != "nostri-libri"){
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
              if ($RubricheCat1 != "nostri-libri"){
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

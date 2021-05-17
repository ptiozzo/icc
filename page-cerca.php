<?php get_header(); ?>
<?php
  $ParentCat1='tutte-le-categorie';
  $ParentTag='tutti-i-tag';
  $ParentReg='territori';

  if ($_SERVER['REQUEST_URI'] == "/cerca/"){
    delete_transient('icc_termineCercato_'.(string) $_COOKIE['PHPSESSID']);
    delete_transient('icc_searchCat1_'.(string) $_COOKIE['PHPSESSID']);
    delete_transient('icc_SearchTag_'.(string) $_COOKIE['PHPSESSID']);
    delete_transient('icc_searchOrd_'.(string) $_COOKIE['PHPSESSID']);
    delete_transient('icc_searchAutore_'.(string) $_COOKIE['PHPSESSID']);
    delete_transient('icc_searchReg_'.(string) $_COOKIE['PHPSESSID']);
  }
?>
<div class="container-fluid content-no-sidebar cerca">
  <div class="category-<?php echo get_term_by('name', single_cat_title('',false), 'category')->slug; ?> clearfix">
    <h1 class="pt-4">Cerca</h1>
    <div class="contenuti_header text-center ">
  <?php
  // Verifico se ho premuto submit e setto le categorie
  // il paged e salvo tutto in sessione
  set_transient('icc_cercaPaged_'.(string) $_COOKIE['PHPSESSID'],$paged,12 * HOUR_IN_SECONDS);
  if ($_POST['submit_button']){
    $searchterm = $_POST['termine-cercato'];
    $SearchCat1 = $_POST['contenuti-dropdown'];
    $SearchTag = $_POST['tag-dropdown'];
    $SearchOrd = $_POST['order-dropdown'];
    $SearchAutore = $_POST['autore-dropdown'];
    $SearchReg = $_POST['regione-dropdown'];
    $paged = 0;
    set_transient('icc_termineCercato_'.(string) $_COOKIE['PHPSESSID'],$searchterm,12 * HOUR_IN_SECONDS);
    set_transient('icc_searchCat1_'.(string) $_COOKIE['PHPSESSID'],$SearchCat1,12 * HOUR_IN_SECONDS);
    set_transient('icc_SearchTag_'.(string) $_COOKIE['PHPSESSID'],$SearchTag,12 * HOUR_IN_SECONDS);
    set_transient('icc_searchOrd_'.(string) $_COOKIE['PHPSESSID'],$SearchOrd,12 * HOUR_IN_SECONDS);
    set_transient('icc_searchAutore_'.(string) $_COOKIE['PHPSESSID'],$SearchAutore,12 * HOUR_IN_SECONDS);
    set_transient('icc_searchReg_'.(string) $_COOKIE['PHPSESSID'],$SearchReg,12 * HOUR_IN_SECONDS);
  } else {
    //Se non ho premuto submit verifico se ho qualcosa in sesisone,
    //altrimenti vado ai valori di default
    if(get_transient('icc_termineCercato_'.(string) $_COOKIE['PHPSESSID'])) {
        $searchterm = get_transient('icc_termineCercato_'.(string) $_COOKIE['PHPSESSID']);
    } elseif($_GET['termineCercato']){
        $searchterm = $_GET['termineCercato'];
    } else {
      $searchterm='';
    }
    if(get_transient('icc_searchCat1_'.(string) $_COOKIE['PHPSESSID'])) {
        $SearchCat1 = get_transient('icc_searchCat1_'.(string) $_COOKIE['PHPSESSID']);
    } elseif($_GET['contenuti']){
        $SearchCat1 = $_GET['contenuti'];
    } else {
      $SearchCat1=$ParentCat1;
    }
    if(get_transient('icc_SearchTag_'.(string) $_COOKIE['PHPSESSID'])) {
        $SearchTag = get_transient('icc_SearchTag_'.(string) $_COOKIE['PHPSESSID']);
    } elseif($_GET['tag']){
        $SearchTag = $_GET['tag'];
    } else {
      $SearchTag=$ParentTag;
    }
    if(get_transient('icc_searchOrd_'.(string) $_COOKIE['PHPSESSID'])) {
        $SearchOrd = get_transient('icc_searchOrd_'.(string) $_COOKIE['PHPSESSID']);
    } else {
      $SearchOrd="DESC";
    }
    if(get_transient('icc_searchAutore_'.(string) $_COOKIE['PHPSESSID'])) {
      $SearchAutore = get_transient('icc_searchAutore_'.(string) $_COOKIE['PHPSESSID']);
    } elseif($_GET['autore']){
        $SearchAutore = $_GET['autore'];
    } else {
      $SearchAutore = '';
    }
    if(get_transient('icc_searchReg_'.(string) $_COOKIE['PHPSESSID'])) {
      $SearchReg = get_transient('icc_searchReg_'.(string) $_COOKIE['PHPSESSID']);
    } elseif($_GET['regione']){
        $SearchReg = $_GET['regione'];
    } else {
      $SearchReg = '';
    }
  }

  $Condividi = home_url( $wp->request )."/?";
  if($searchterm != ""){
    $Condividi .= "&termineCercato=".$searchterm;
  }
  if($SearchCat1 != $ParentCat1 && $SearchCat1 != ''){
    $Condividi .= "&contenuti=".$SearchCat1;
  }
  if($SearchTag != $ParentTag && $SearchTag != ''){
    $Condividi .= "&tag=".$SearchTag;
  }
  if($SearchAutore != 'autore' && $SearchAutore != ''){
    $Condividi .= "&autore=".$SearchAutore;
  }
  if($SearchReg != 'regioni' && $SearchReg != ''){
    $Condividi .= "&ampregione=".$SearchReg;
  }

 ?>
  <!-- Dropdown per selezione contenuto -->
  <form class="mb-2" method="post" action="<?php echo get_pagenum_link(); ?>">
        <input class="mb-2" type="text" name="termine-cercato" value="<?php echo $searchterm; ?>">
        <input name="submit_button" type="Submit" value="Cerca" class="btn btn-secondary">
        <div class="form-inline">


         <br />
        <select name="contenuti-dropdown" class="custom-select">
          <option value="tutte-le-categorie" <?php if ($SearchCat1 == 'tutte-le-categorie') {echo 'selected';}?> >Tutte le categorie</option>
          <?php
            $categories = get_categories();
            foreach ($categories as $category) {
              $option = '<option value="'.$category->category_nicename.'" ';
              if ($SearchCat1 == $category->category_nicename) {$option .= 'selected ';};
              $option .= '>'.$category->cat_name;
              $option .= '</option>';
              echo $option;
            }
          ?>
          <option value="nostri-libri" <?php if ($SearchCat1 == 'nostri-libri') {echo 'selected';}?>>I nostri libri</option>
        </select>
      <!-- Dropdown per selezione tag -->
      <select name="tag-dropdown" class="custom-select">
        <option value="tutti-i-tag" <?php if ($SearchTag == 'tutti-i-tag') {echo 'selected';}?> >Tutti i tag</option>
        <?php
          $categories = get_tags();
          foreach ($categories as $category) {
            $option = '<option value="'.$category->slug.'" ';
            if ($SearchTag == $category->slug) {$option .= 'selected ';};
            $option .= '>'.$category->name;
            $option .= '</option>';
            echo $option;
          }
          ?>
      </select>
      <!-- Dropdown per autore -->
      <select name="autore-dropdown" class="custom-select">
        <option value="autore" <?php if ($SearchAutore == 'autore') {echo 'selected';}?> ><?php echo 'Tutti gli autori'; ?></option>
        <?php
        $args = array(
                  'orderby' => 'display_name',
                  'order'=>'ASC',
                  'has_published_posts'=> true,
                  'role__not_in' => 'icc_user',
        );
        $allUsers = get_users($args);
        foreach($allUsers as $user){
          $option = '<option value="'.$user->ID.'" ';
          if ($SearchAutore == $user->ID) {$option .= 'selected ';};
          $option .= '>'.$user->display_name;
          $option .= '</option>';
          echo $option;
        }
         ?>
      </select>
      <!-- Dropdown per selezione regione -->
      <select name="regione-dropdown"  class="custom-select">
        <option value="territori" <?php if ($SearchReg == 'territori') {echo 'selected';}?> ><?php echo 'Italia'; ?></option>
        <?php
          $categories = get_categories('child_of='.get_category_by_slug($ParentReg)->term_id);
          foreach ($categories as $category) {
            $option = '<option value="'.$category->category_nicename.'" ';
            if ($SearchReg == $category->category_nicename) {$option .= 'selected ';};
            $option .= '>'.$category->cat_name;
            $option .= '</option>';
            echo $option;
          }
          ?>
      </select>
    <!-- Dropdown per ordinemento post -->
    <!--
    <select name="order-dropdown" class="custom-select">
        <option value="DESC" <?php if ($SearchOrd == 'DESC') {echo 'selected';}?> >Ordina per più recente</option>
        <option value="ASC" <?php if ($SearchOrd == 'ASC') {echo 'selected';}?> >Ordina per meno recente</option>
    </select>
  -->
  </div>
  </form>
    <input type="text" class="" style="position: absolute; left: -9999px;" value="<?php echo $Condividi; ?>" id="ShareLink" readonly>
    <button onclick="CopiaLink()" class="btn btn-warning">Copia link di condivisione</button>
    <script>
    function CopiaLink() {
      /* Get the text field */
      var copyText = document.getElementById("ShareLink");

      /* Select the text field */
      copyText.select();
      copyText.setSelectionRange(0, 99999); /*For mobile devices*/

      /* Copy the text inside the text field */
      document.execCommand("copy");

      /* Alert the copied text */
      alert("Link copiato");
    }
    </script>
</div><!-- contenuti_header -->
<?php
  if($SearchCat1 == $ParentCat1){
    $SearchCat1 = '';
  }

  if($SearchTag == $ParentTag){
    $SearchTag = '';
  }
  if($SearchReg == $ParentReg){
    $SearchReg = '';
  }

  if($SearchCat1 != '' ){
    if($SearchReg != ''){
      $SearchCatTerm = $SearchCat1."+".$SearchReg;
    }else{
      $SearchCatTerm = $SearchCat1;
    }
  }elseif($SearchReg != ''){
    $SearchCatTerm = $SearchReg;
  }

    //echo $SearchCatTerm;
 ?>
  <?php

  echo "<!-- SearchTerm: ";
  echo $searchterm;
  echo " -SearchCatTerm: ";
  echo $SearchCatTerm;
  echo " -SearchOrd: ";
  echo $SearchOrd;
  echo " -SearchAutore: ";
  echo $SearchAutore;

  echo " -SearchCat: ";
  echo $SearchCat1;
  echo " -Tag: ";
  echo $SearchTag;
  echo " -Regione: ";
  echo $SearchReg;
  echo "-->";

    /* Personalizzo query */
    {
      $args = array(
          'post_type' => array('post','nostri-libri','rassegna-stampa'),
          'category_name' => $SearchCatTerm,
          'tag' => $SearchTag,
          'posts_per_page' => 20,
          'ignore_sticky_posts' => 1,
          'paged'          => $paged,
          'order'         => $SearchOrd,
          's' => $searchterm,
          'author' => $SearchAutore
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
        <div class="col-xl-5ths col-lg-3 col-md-4 col-sm-6  text-break">
          <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <a href='<?php the_permalink(); ?>'>
              <?php
              if ($Cat1 == $ParentCat1) { ?>
                <div class='category'>
                  <span><?php the_time('j M Y') ?></span>
                  <span>
                    <?php
                      get_template_part('inc/post','etichetta');
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
          <h3 class="text-center">Inserisci un termine da ricercare</h3>
          <br>
        <?php
      endif;
    wp_reset_query();
  ?>
  <!-- fine loop -->
</div><!-- .category -->
</div><!-- .content 	-->
<!-- carico footer -->
<?php get_footer(); ?>

<?php get_header(); ?>
<?php
  $ParentCat1='i-nostri-contenuti';
  $ParentCat2='tematica';
  $ParentReg='regioni';

  if ($_SERVER['REQUEST_URI'] == "/cerca/"){
    delete_transient('icc_termineCercato_'.(string) $_COOKIE['PHPSESSID']);
    delete_transient('icc_searchCat1_'.(string) $_COOKIE['PHPSESSID']);
    delete_transient('icc_searchCat2_'.(string) $_COOKIE['PHPSESSID']);
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
    $SearchCat2 = $_POST['tematica-dropdown'];
    $SearchOrd = $_POST['order-dropdown'];
    $SearchAutore = $_POST['autore-dropdown'];
    $SearchReg = $_POST['regione-dropdown'];
    $paged = 0;
    set_transient('icc_termineCercato_'.(string) $_COOKIE['PHPSESSID'],$searchterm,12 * HOUR_IN_SECONDS);
    set_transient('icc_searchCat1_'.(string) $_COOKIE['PHPSESSID'],$SearchCat1,12 * HOUR_IN_SECONDS);
    set_transient('icc_searchCat2_'.(string) $_COOKIE['PHPSESSID'],$SearchCat2,12 * HOUR_IN_SECONDS);
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
    if(get_transient('icc_searchCat2_'.(string) $_COOKIE['PHPSESSID'])) {
        $SearchCat2 = get_transient('icc_searchCat2_'.(string) $_COOKIE['PHPSESSID']);
    } elseif($_GET['tematica']){
        $SearchCat2 = $_GET['tematica'];
    } else {
      $SearchCat2=$ParentCat2;
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
  if($SearchCat2 != $ParentCat2 && $SearchCat2 != ''){
    $Condividi .= "&tematica=".$SearchCat2;
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
          <option value="i-nostri-contenuti" <?php if ($SearchCat1 == 'i-nostri-contenuti') {echo 'selected';}?> ><?php echo 'Tutti i nostri contenuti'; ?></option>
          <?php
            $categories = get_categories('child_of='.get_category_by_slug($ParentCat1)->term_id);
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
      <!-- Dropdown per selezione tematica -->
      <select name="tematica-dropdown" class="custom-select">
        <option value="tematica" <?php if ($SearchCat2 == 'tematica') {echo 'selected';}?> ><?php echo 'Tutte le tematiche'; ?></option>
        <?php
          $categories = get_categories('child_of='.get_category_by_slug($ParentCat2)->term_id);
          foreach ($categories as $category) {
            $option = '<option value="'.$category->category_nicename.'" ';
            if ($SearchCat2 == $category->category_nicename) {$option .= 'selected ';};
            $option .= '>'.$category->cat_name;
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
                  'has_published_posts'=> true
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
        <option value="regioni" <?php if ($SearchReg == 'regioni') {echo 'selected';}?> ><?php echo 'Italia'; ?></option>
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
  if ($searchterm != ''){
    $SearchCatTerm = '';
    if($SearchCat1 != $ParentCat1){
      $SearchCatTerm = $SearchCat1;
    }
    if($SearchCat2 != $ParentCat2){
      if($SearchCatTerm == ''){
        $SearchCatTerm = $SearchCat2;
      }else{
        $SearchCatTerm .= "+".$SearchCat2;
      }
    }
    if($SearchReg != $ParentReg){
      if($SearchCatTerm == ''){
        $SearchCatTerm = $SearchReg;
      }else{
        $SearchCatTerm .= "+".$SearchReg;
      }
    }
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

  echo " -SearchCat1: ";
  echo $SearchCat1;
  echo " -SearchCat2: ";
  echo $SearchCat2;
  echo "-->";

    /* Personalizzo query */
    {
      $args = array(
          'post_type' => array('post','nostri-libri','rassegna-stampa'),
          'category_name' => $SearchCatTerm,
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

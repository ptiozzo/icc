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
    $searchterm = $_POST['termine-cercato'];
    $SearchCat1 = $_POST['contenuti-dropdown'];
    $SearchCat2 = $_POST['tematica-dropdown'];
    $SearchOrd = $_POST['order-dropdown'];
    $SearchAutore = $_POST['autore-dropdown'];
    $paged = 0;
    $_SESSION['termine-cercato'] = $searchterm;
    $_SESSION['SearchCat1'] = $SearchCat1;
    $_SESSION['SearchCat2'] = $SearchCat2;
    $_SESSION['SearchOrd'] = $SearchOrd;
    $_SESSION['SearchAutore'] = $SearchAutore;
  } else {
    //Se non ho premuto submit verifico se ho qualcosa in sesisone,
    //altrimenti vado ai valori di default
    if(isset($_SESSION['termine-cercato'])) {
        $searchterm = $_SESSION['termine-cercato'];
    } else {
      $searchterm='';
    }
    if(isset($_SESSION['SearchCat1'])) {
        $SearchCat1 = $_SESSION['SearchCat1'];
    } else {
      $SearchCat1=$ParentCat1;
    }
    if(isset($_SESSION['SearchCat2'])) {
        $SearchCat2 = $_SESSION['SearchCat2'];
    } else {
      $SearchCat2=$ParentCat2;
    }
    if(isset($_SESSION['SearchOrd'])) {
        $SearchOrd = $_SESSION['SearchOrd'];
    } else {
      $SearchOrd="DESC";
    }
    if(isset($_SESSION['SearchAutore'])) {
      $SearchAutore = $_SESSION['SearchAutore'];
    } else {
      $SearchAutore = '';
    }
  }
  if ($SearchCat1 == $ParentCat1){
    echo "<h1>Cerca</h1>";
  }
  else {
    echo "<h2>Termine ricercato: </h2>";
    echo "<h1>".$searchterm."</h1>";
  }

  if($searchterm == ''){
    echo "Ricerca nulla";
  }
 ?>
  <!-- Dropdown per selezione contenuto -->
  <form method="post" action="<?php echo get_pagenum_link(); ?>">
        <input type="text" name="termine-cercato" value="<?php echo $searchterm; ?>">
        <?php
          if ($searchterm != '')
          {
         ?>
        <select name="contenuti-dropdown">
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
      <select name="tematica-dropdown">
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
      <select name="autore-dropdown">
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
    <!-- Dropdown per ordinemento post -->
    <select name="order-dropdown">
        <option value="DESC" <?php if ($SearchOrd == 'DESC') {echo 'selected';}?> >Ordina per data più recente</option>
        <option value="ASC" <?php if ($SearchOrd == 'ASC') {echo 'selected';}?> >Ordina per data meno recente</option>
    </select>
  <?php } ?>
    <input name="submit_button" type="Submit" value="Cerca">
  </form>

  <br /><br />

  <?php
  if ($SearchCat1 == '' && $SearchCat2 == '')
    $SearchCatTerm = '';
  else {
    $SearchCatTerm = $SearchCat1."+".$SearchCat2;
  }
  echo $searchterm;
  echo " - ";
  echo $SearchCatTerm;
  echo " - ";
  echo $SearchOrd;
  echo " - ";
  echo $SearchAutore;

    /* Personalizzo query */
    if ($searchterm != ''){
      $args = array(
          'post_type' => array('post','nostri-libri'),
          'category_name' => $SearchCatTerm,
          'posts_per_page' => 20,
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
      <div class="grid">
      <?php
      while( $loop->have_posts() ) : $loop->the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <!-- Immagine in evidenza -->
          <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail('icc_category', array('class' => 'img-res','alt' => get_the_title())); ?>
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

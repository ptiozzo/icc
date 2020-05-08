<?php get_header();?>
<?php
  $BachecaRegione1 = "tutte";
  $BachecaTematica1 = "tutte";
 ?>
  <div class="row mx-0 pt-2">
    <div class="col-lg-home-reg">
      <h1>Cerco/Offro</h1>
      <div class="contenuti_header">
        <?php
        // Verifico se ho premuto submit e setto le ricerche
        // il paged e salvo tutto in sessione
        if ($_POST['submit_button']){
          $BachecaRegione = $_POST['regione'];
          $BachecaTematica = $_POST['tematica'];
          $_SESSION['BachecaRegione'] = $BachecaRegione;
          $_SESSION['BachecaTematica'] = $BachecaTematica;
          $paged = 0;
        } else {
          //Se non ho premuto submit verifico se ho qualcosa in sesisone,
          //altrimenti vado ai valori di default
          if($_SESSION['BachecaRegione']){
            $BachecaRegione = $_SESSION['BachecaRegione'];
          } else {
            $BachecaRegione = $BachecaRegione1;
          }
          if($_SESSION['BachecaTematica']){
            $BachecaTematica = $_SESSION['BachecaTematica'];
          } else {
            $BachecaTematica = $BachecaTematica1;
          }
        }
        echo "Regione ".$BachecaRegione.", Tematica ". $BachecaTematica;
        ?>

        <!-- Dropdown per selezione contenuto -->
        <form class="pt-2 form-inline" method="post" action="<?php echo get_pagenum_link(); ?>">
          <select name="regione" class="custom-select">
            <?php
              $categories = get_terms( array('taxonomy' => 'regione','hide_empty' => false,'orderby'=> array('slug'=>'ASC'),'order' => 'ASC'));
              foreach ($categories as $category) {
                $option = '<option value="'.$category->slug.'" ';
                if ($BachecaRegione == $category->slug) {$option .= 'selected ';};
                $option .= '>'.$category->name;
                $option .= '</option>';
                echo $option;
              }
            ?>
          </select>
          <select name="tematica" class="custom-select">
            <option value="tutte" <?php if ( $Reg == 'tutte') {echo 'selected';}?> ><?php echo 'Tutte le tematiche'; ?></option>
            <?php
              $categories = get_terms( array('taxonomy' => 'tematica','hide_empty' => false,'orderby'=> array('slug'=>'ASC'),'order' => 'ASC'));
              foreach ($categories as $category) {
                $option = '<option value="'.$category->name.'" ';
                if ($BachecaTematica == $category->name) {$option .= 'selected ';};
                $option .= '>'.$category->name;
                $option .= '</option>';
                echo $option;
              }
            ?>
          </select>
          <input name="submit_button" type="Submit" value="Filtra" class="btn btn-secondary">
        </form>
      </div>
      <?php
      $argsBacheca = array(
          'post_type' => array('cerco-offro'),
          'posts_per_page' => 20,
          'paged'          => $paged,
          
      );
      $loopBacheca = new WP_Query( $argsBacheca );
       ?>
      <div class="row mr-0">
        <?php
          if($loopBacheca->have_posts()):while($loopBacheca->have_posts()) : $loopBacheca->the_post();
        ?>

          <div class="col-lg-3 col-md-4 col-sm-6 text-break mt-2">
            <?php
            if ( has_post_thumbnail() ) {
              $image = get_the_post_thumbnail_url(get_the_ID(),'icc_ultimenewshome');
            }else{
              $image = catch_that_image();
            }
            //echo $image;
            ?>

            <div class="card">
              <img src="<?php echo $image;?>" class="card-img-top p-0" alt="<?php the_title(); ?>">
              <div class="card-body">
                <h5 class="card-title"><?php the_title(); ?></h5>
                <p class="card-text"><?php the_excerpt();?></p>
                <a href="<?php the_permalink(); ?>" class="btn btn-primary">Leggi di più</a>
              </div>
              <div class="card-footer text-muted">
                <?php the_time('j M Y') ?>
              </div>
            </div>
          </div>


        <?php
          endwhile;endif;
        ?>
      </div>
    </div>
    <div class="col-lg-home3">
      <aside class="sidebar">
        <?php dynamic_sidebar('primary'); ?>
      </aside>
    </div>
  </div>
<?php get_footer(); ?>

<?php get_header();?>
<div class="container">


<h1><?php the_title(); ?></h1>

<?php

if(!is_user_logged_in()){
  ?>
  <div class="alert alert-warning mt-3" role="alert">
    <p>Per poter inserire un annuncio devi prima <a class="alert-link" href="/wp-login.php?redirect_to=<?php echo get_the_permalink() ?>">effettuare l'accesso</a> o <a class="alert-link" href="/registrati/?redirect_to=<?php echo get_the_permalink() ?>">registrarti</a></p>
  </div>
  <?php
}

//echo "Tipologia: ". $_POST['tipologia']. " - Regione: ".$_POST['regione']. " - Tematica:" .$_POST['tematica'];

$errors = array();

  if( $_POST['submit_button'] ){

  if($_POST['tipologia'] == "cercooffro"){
    $errors['tipologia'] = "Devi selezionare una tipologia";
  }

  if($_POST['regione'] == "_tutteleregioni"){
    $errors['regione'] = "Devi selezionare una regione";
  }

  if($_POST['tematica'] == "tutteletematiche"){
    $errors['tematica'] = "Devi selezionare una tematica";
  }

  if(0 === preg_match("/.{6,}/", $_POST['titolo'])){
    $errors['titolo'] = "Il titolo deve essere di almeno 6 caratteri";
  }

  if(str_word_count($_POST['content']) < 6){
    $errors['content'] = "Devi inserire un contenuto di almeno 6 parole";
  }

  if($_FILES['image']['size'] != 0){
    if(strpos($_FILES['image']["type"],'image') === false){
      $errors['image'] = "Il file caricato non è un'immagine";
    }
  }



  if(0 === count($errors)){

    if($_GET['action'] == 'edit' && isset($_GET['postID'])){
      $new_post = array(
        'ID' => $_GET['postID'],
  			'post_title' => $_POST['titolo'],
  			'post_content' => $_POST['content'],
  			'post_status' => 'publish',
  			'post_name' => $_POST['titolo'],
  			'post_type' => 'cerco-offro',
        'comment_status' => 'open'
  		);
      $post_id = wp_update_post($new_post);
    } else {
      $post_title = $_POST['tipologia']." ".$_POST['titolo'];
      $new_post = array(
  			'post_title' => ucfirst($post_title),
  			'post_content' => $_POST['content'],
  			'post_status' => 'pending',
  			'post_name' => $_POST['titolo'],
  			'post_type' => 'cerco-offro',
        'comment_status' => 'open'
  		);
      $post_id = wp_insert_post($new_post);
    }
      wp_set_object_terms($post_id,$_POST['tematica'],'tematica');
      wp_set_object_terms($post_id,$_POST['regione'],'regione');
      wp_set_object_terms($post_id,$_POST['tipologia'],'cercooffro');

      if ( isset($_FILES['image']) && $_FILES['image']['size'] != 0 ) {
          $upload = wp_upload_bits($_FILES["image"]["name"], null, file_get_contents($_FILES["image"]["tmp_name"]));

          if ( ! $upload_file['error'] ) {

              $filename = $upload['file'];
              $wp_filetype = wp_check_filetype($filename, null);
              $attachment = array(
                  'post_mime_type' => $wp_filetype['type'],
                  'post_title' => sanitize_file_name($_FILES["image"]["name"]),
                  'post_content' => '',
                  'post_status' => 'inherit'
              );

              $attachment_id = wp_insert_attachment( $attachment, $filename, $post_id );

              if ( ! is_wp_error( $attachment_id ) ) {
                  require_once(ABSPATH . 'wp-admin/includes/image.php');

                  $attachment_data = wp_generate_attachment_metadata( $attachment_id, $filename );
                  wp_update_attachment_metadata( $attachment_id, $attachment_data );
                  set_post_thumbnail( $post_id, $attachment_id );
              }
          }
      }


    $url = "/cerco-offro/";

    $to = "redazione@italiachecambia.org,ptiozzo@me.com";
    $subject = 'ICC - Nuovo Cerco\Offro da revisionare: '.$_POST['titolo'];
    $body = "<html><body>";
    $body .= "Ciao <br>";
    $body .= "E' presente un nuovo annuncio da revisionare. <br>";
    $body .= "</body></html>";
    $headers = array('Content-Type: text/html; charset=UTF-8');
    $headers[] = 'From: Italia Che Cambia <checambiaitalia@gmail.com>';
    $headers[] = 'Bcc: ptiozzo@me.com';

    wp_mail( $to, $subject, $body, $headers );

    echo '<div class="alert alert-success mt-3" role="alert">';
    echo "Annuncio creato, ti invieremo una mail entro 24h appena il tuo annuncio sarà approvato dalla redazione. ";
    echo 'La redazione potrebbe apportare alcune modifiche al titolo ';
    echo 'o al testo della tua inserzione per agevolare il raggiungimento del tuo obiettivo.</div>';

    ?>
    <script>
      setTimeout(function(){
        window.location.href = "<?php echo $url;?>";
      }, 5000);
    </script>
    <?php
    //wp_redirect($url);
    $success = 1;

  } else {
    ?>
    <div class="alert alert-danger" role="alert">
      <ul>

      <?php
        foreach ($errors as $error) {
          echo "<li>" .$error."</li>";
        }
        ?>
      </ul>
    </div>

    <?php
  }
}


if($success != 1 && is_user_logged_in() ){

  if($_GET['action'] == 'edit' && isset($_GET['postID'])){
    $form_invia = "Aggiorna cerco/offro";
    $args = array(
      'p' => $_GET['postID'],
      'post_type' => 'cerco-offro',
    );
    $query = new WP_Query( $args );
    //var_dump($query);
    if ( $query->have_posts() ) {
      while ( $query->have_posts() ) {
          $query->the_post();
          $form_titolo = get_the_title();
          $form_regioni = get_the_terms( get_the_ID() , 'regione' )[0]->slug;
          $form_tipologia = get_the_terms( get_the_ID() , 'cercooffro' )[0]->slug;
          $form_tematica = get_the_terms( get_the_ID() , 'tematica' )[0]->slug;
          $form_content = get_the_content();

      }
    }
    wp_reset_postdata();
  } else {
    $form_tipologia = $_POST['tipologia'];
    $form_regioni = $_POST['regione'];
    $form_tematica = $_POST['tematica'];
    $form_titolo = $_POST['titolo'];
    $form_content = $_POST['content'];
    $form_invia = "Aggiungi cerco/offro";
  }





  ?>
  <form class="mt-3 mb-2 form-inline" method="post" action="<?php echo get_pagenum_link(); ?>" enctype="multipart/form-data">
    <select name="tipologia" class="custom-select" >
      <option value="cercooffro" <?php if ($form_tipologia == "cercooffro") {echo 'selected';} ?>>Cerco o Offro?</option>
      <?php
        $categories = get_terms( array('taxonomy' => 'cercooffro','hide_empty' => false,'orderby'=> 'slug','order' => 'ASC'));
        foreach ($categories as $category) {
          if($category->slug != 'risolto'){
            $option = '<option value="'.$category->slug.'" ';
            if ($form_tipologia == $category->slug) {$option .= 'selected ';};
            $option .= '>'.$category->name;
            $option .= '</option>';
            echo $option;
          }
        }
      ?>
    </select>
    </select>
      <select name="regione" class="custom-select mx-2" >
        <?php
          $categories = get_terms( array('taxonomy' => 'regione','hide_empty' => false,'orderby'=> 'slug','order' => 'ASC'));
          ?>
          <option value="_tutteleregioni" <?php if ($form_regioni == "_tutteleregioni") {echo 'selected';} ?>>Seleziona la regione</option>
          <?php
          foreach ($categories as $category) {
            if($category->slug != "_tutteleregioni"){
              $option = '<option value="'.$category->slug.'" ';
              if ($form_regioni == $category->slug) {$option .= 'selected ';};
              $option .= '>'.$category->name;
              $option .= '</option>';
              echo $option;
            }
          }
        ?>
      </select>
    <select name="tematica" class="custom-select mx-2">
      <option value="tutteletematiche" <?php if ($form_tematica == "tutteletematiche") {echo 'selected';} ?>>Seleziona la tematica</option>
      <?php
        $categories = get_terms( array('taxonomy' => 'tematica','hide_empty' => false,'orderby'=> 'slug','order' => 'ASC'));
        foreach ($categories as $category) {
          $option = '<option value="'.$category->slug.'" ';
          if ($form_tematica == $category->slug) {$option .= 'selected ';};
          $option .= '>'.$category->name;
          $option .= '</option>';
          echo $option;
        }
      ?>
    </select>
    <div class="form-group my-2 col-12 d-block px-0">
      <input id="titolo" class="form-control w-75" type="text" name="titolo" placeholder="Inserisci il titolo del tuo cerco/offro" <?php echo 'value="'.$form_titolo .'"';?>>
      <small id="titoloHelp" class="form-text text-muted">Non iniziare con cerco o offro, verranno aggiunti automaticamente.</small>
    </div>
    <div class="form-group my-2 col-12 d-block px-0">
      <textarea id="content" class="form-control w-75" type="text" name="content" placeholder="Inserisci il tuo annuncio qui" rows="5"><?php echo $form_content;?></textarea>
      <small id="contentHelp" class="form-text text-muted">Questo sarà il testo del tuo annuncio.</small>
    </div>
    <div class="form-group my-2 col-12">
      <label for="image">Aggiungi un'immagine al tuo annuncio</label>
      <input type="file" name="image" class="form-control-file" id="image">
    </div>

    <input name="submit_button" type="Submit" value="<?php echo $form_invia;?>" class="btn btn-secondary">
  </form>

<?php } ?>


</div>

<?php get_footer(); ?>

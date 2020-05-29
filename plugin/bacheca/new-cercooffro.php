<?php get_header();?>
<div class="container mx-0">


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

  if(strpos($_FILES['image']["type"],'image') === false){
    $errors['image'] = "Il file caricato non è un'immagine";
  }



  if(0 === count($errors)){

    global $current_user;
		get_currentuserinfo();

		$user_login = $current_user->user_login;
		$user_email = $current_user->user_email;
		$user_firstname = $current_user->user_firstname;
		$user_lastname = $current_user->user_lastname;
		$user_id = $current_user->ID;

    $post_title = $_POST['tipologia']."...".$_POST['titolo'];

    $new_post = array(
			'post_title' => ucfirst($post_title),
			'post_content' => $_POST['content'],
			'post_status' => 'publish',
			'post_name' => $_POST['titolo'],
			'post_type' => 'cerco-offro',
      'comment_status' => 'open'
		);

    $post_id = wp_insert_post($new_post);

    wp_set_object_terms($post_id,$_POST['tematica'],'tematica');
    wp_set_object_terms($post_id,$_POST['regione'],'regione');
    wp_set_object_terms($post_id,$_POST['tipologia'],'cercooffro');


    if ( isset($_FILES['image']) ) {
        $upload = wp_upload_bits($_FILES["image"]["name"], null, file_get_contents($_FILES["image"]["tmp_name"]));

        if ( ! $upload_file['error'] ) {

            $filename = $upload['file'];
            $wp_filetype = wp_check_filetype($filename, null);
            $attachment = array(
                'post_mime_type' => $wp_filetype['type'],
                'post_title' => sanitize_file_name($filename),
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

    $url = get_post_permalink($post_id);

    echo '<div class="alert alert-success mt-3" role="alert">';
    echo "Annuncio creato correttamente, potrai visualizzarlo a breve. ";
    echo '<a class="alert-link" href="'.$url.'">Clicca qui</a> per farlo immediatamente<br>';
    echo '</div>';

    ?>
    <script>
      setTimeout(function(){
        window.location.href = "<?php echo $url;?>";
      }, 3000);
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

  ?>
  <form class="mt-3 mb-2 form-inline" method="post" action="<?php echo get_pagenum_link(); ?>" enctype="multipart/form-data">
    <select name="tipologia" class="custom-select" >
      <option value="cercooffro" <?php if ($_POST['tipologia'] == "cercooffro") {echo 'selected';} ?>>Cerco o Offro?</option>
      <?php
        $categories = get_terms( array('taxonomy' => 'cercooffro','hide_empty' => false,'orderby'=> 'slug','order' => 'ASC'));
        foreach ($categories as $category) {
          if($category->slug != 'risolto'){
            $option = '<option value="'.$category->slug.'" ';
            if ($_POST['tipologia'] == $category->slug) {$option .= 'selected ';};
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
          <option value="_tutteleregioni" <?php if ($_POST['tematica'] == "_tutteleregioni") {echo 'selected';} ?>>Seleziona la regione</option>
          <?php
          foreach ($categories as $category) {
            if($category->slug != "_tutteleregioni"){
              $option = '<option value="'.$category->slug.'" ';
              if ($_POST['regione'] == $category->slug) {$option .= 'selected ';};
              $option .= '>'.$category->name;
              $option .= '</option>';
              echo $option;
            }
          }
        ?>
      </select>
    <select name="tematica" class="custom-select mx-2">
      <option value="tutteletematiche" <?php if ($_POST['tematica'] == "tutteletematiche") {echo 'selected';} ?>>Seleziona la tematica</option>
      <?php
        $categories = get_terms( array('taxonomy' => 'tematica','hide_empty' => false,'orderby'=> 'slug','order' => 'ASC'));
        foreach ($categories as $category) {
          $option = '<option value="'.$category->slug.'" ';
          if ($_POST['tematica'] == $category->slug) {$option .= 'selected ';};
          $option .= '>'.$category->name;
          $option .= '</option>';
          echo $option;
        }
      ?>
    </select>
    <div class="form-group my-2 col-12 d-block px-0">
      <input id="titolo" class="form-control w-75" type="text" name="titolo" placeholder="Inserisci il titolo del tuo cerco/offro" <?php echo 'value="'.$_POST['titolo'] .'"';?>>
      <small id="titoloHelp" class="form-text text-muted">Non iniziare con cerco o offro, verranno aggiunti automaticamente.</small>
    </div>
    <div class="form-group my-2 col-12 d-block px-0">
      <textarea id="content" class="form-control w-75" type="text" name="content" placeholder="Inserisci il tuo annuncio qui" rows="5"><?php echo $_POST['content'];?></textarea>
      <small id="contentHelp" class="form-text text-muted">Questo sarà il testo del tuo annuncio.</small>
    </div>
    <div class="form-group my-2 col-12">
      <label for="image">Aggiungi un'image al tuo annuncio</label>
      <input type="file" name="image" class="form-control-file" id="image">
    </div>

    <input name="submit_button" type="Submit" value="Aggiunti cerco/offro" class="btn btn-secondary">
  </form>

<?php } ?>


</div>

<?php get_footer(); ?>

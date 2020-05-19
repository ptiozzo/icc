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

  if(0 === preg_match("/.{6,}/", $_POST['titolo'])){
    $errors['titolo'] = "Il titolo deve essere di almeno 6 caratteri";
  }

  if($_POST['tipologia'] == "cercooffro"){
    $errors['tipologia'] = "Devi selezionare una tipologia";
  }

  if($_POST['regione'] == "_tutteleregioni"){
    $errors['regione'] = "Devi selezionare una regione";
  }

  if($_POST['tematica'] == "tutteletematiche"){
    $errors['tematica'] = "Devi selezionare una tematica";
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
			'post_content' => " ",
			'post_status' => 'pending',
			'post_name' => $_POST['titolo'],
			'post_type' => 'cerco-offro',
      'comment_status' => 'open'
		);

    $post_id = wp_insert_post($new_post);

    wp_set_object_terms($post_id,$_POST['tematica'],'tematica');
    wp_set_object_terms($post_id,$_POST['regione'],'regione');
    wp_set_object_terms($post_id,$_POST['tipologia'],'cercooffro');

    $url = home_url()."/wp-admin/post.php?post=".$post_id."&action=edit";

    echo '<div class="alert alert-success mt-3" role="alert">';
    echo "Annuncio creato correttamente, potrai completare il tuo annuncio a breve";
    echo ' o <a class="alert-link" href="'.$url.'">clicca qui</a> per farlo immediatamente';
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
  <form class="mt-3 mb-2 form-inline" method="post" action="<?php echo get_pagenum_link(); ?>">
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
      <input id="titolo" class="form-control w-75" type="text" name="titolo" placeholder="Inserisci il titolo del tuo cerco/offro">
      <small id="titoloHelp" class="form-text text-muted">Non iniziare con cerco o offro, verranno aggiunti automaticamente.</small>
    </div>

    <input name="submit_button" type="Submit" value="Aggiunti cerco/offro" class="btn btn-secondary">
  </form>

<?php } ?>


</div>

<?php get_footer(); ?>

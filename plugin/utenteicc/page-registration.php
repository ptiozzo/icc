<?php

get_header();
global $wpdb, $user_ID;
?>
<div class="container pt-4">
<h1><?php echo get_the_title(); ?></h1>

<?php if($_GET['nl']){
  echo "<div class='mt-5' style='height: 100vh;'>";
  if ($_GET['nl']== "RishiestaOK"){
    echo '<div class="alert alert-success" role="alert">Grazie! Controlla la tua casella di posta per confermare l\'iscrizione</div>';
  } elseif ($_GET['nl']== "IscrizioneOK"){
    echo '<div class="alert alert-success" role="alert">Iscritto alla NewsLetter con successo</div>';
  } elseif ($_GET['nl']== "ErroreGenerico"){
    echo '<div class="alert alert-danger" role="alert">Vi è stato un errore, contatta la redazione per maggiori informazioni</div>';
  } elseif ($_GET['nl']== "IndirizzoGiaRegistrato"){
    echo '<div class="alert alert-warning" role="alert">L\'indirizzo email risulta già ricevere la NewsLetter, contatta la redazione per maggiori informazioni</div>';
  } elseif ($_GET['nl']== "DatiNonConsistenti"){
    echo '<div class="alert alert-danger" role="alert">Alcuni dati forniti risultano già esistenti o mancanti, contatta la redazione per maggiori informazioni</div>';
  } else {
    echo '<div class="alert alert-danger" role="alert">Errore generico, contatta la redazione per maggiori informazioni</div>';
  }
  echo "</div>";
  echo "</div>"; //chiudo il container
  get_footer(); //carico il footer
  exit; //interrompo il caricamento

} ?>

<?php echo the_content();

//Check whether the user is already logged in
if ($user_ID)
{
    // They're already logged in, so we bounce them back to the homepage.
    header( 'Location:' . home_url() );
} else
 {
    $errors = array();

    if( $_SERVER['REQUEST_METHOD'] == 'POST' )
      {
        // Check firstname is present
        if(empty($_POST['firstname']))
        {
            $errors['firstname'] = "Il nome non può essere vuoto";
        }

        // Check lastname is present
        if(empty($_POST['lastname']))
        {
            $errors['lastname'] = "Il cognome non può essere vuoto";
        }

        // Check username is present and not already in use
        $username = $wpdb->escape($_REQUEST['username']);
        if ( strpos($username, ' ') !== false )
        {
            $errors['username'] = "Il nome utente non può contenere spazi";
        }
        if(empty($username))
        {
            $errors['username'] = "Il nome utente non può essere vuoto";
        } elseif( username_exists( $username ) )
        {
            $errors['username'] = "Il nome utente è già presente";
        }

        // Check email address is present and valid
        $email = $wpdb->escape($_REQUEST['email']);
        if( !is_email( $email ) )
        {
            $errors['email'] = "L'indirizzo email non è valido";
        } elseif( email_exists( $email ) )
        {
            $errors['email'] = "Questo indirizzo email risulta già utilizzato";
        }

        // Check password is valid
        if(0 === preg_match("/.{6,}/", $_POST['password']))
        {
          $errors['password'] = "La password deve essere di almeno 6 caratteri";
        }

        // Check password confirmation_matches
        if(0 !== strcmp($_POST['password'], $_POST['password_confirmation']))
         {
          $errors['password_confirmation'] = "Le due password non coincidono";
        }

        // Check terms of service is agreed to
        if($_POST['terms'] != "Yes")
        {
            $errors['terms'] = "Devi accettare i termini e condizioni";
        }

        if(0 === count($errors))
         {

            $password = $_POST['password'];

            $new_user_id = wp_create_user( $username, $password, $email );
            update_user_meta($new_user_id,'first_name',$_POST['firstname']);
            update_user_meta($new_user_id,'last_name',$_POST['lastname']);


            // You could do all manner of other things here like send an email to the user, etc. I leave that to you.

            $success = 1;

            /*echo "Nome: ". $_POST['firstname'];
            echo " - Cognome: " . $_POST['lastname'];
            echo " - username: " . $_POST['username'];
            echo " - email: " . $_POST['email'];
            echo " - cap: " . $_POST['cap'];
            echo " - anno_nascita: " . $_POST['anno_nascita'];
            echo " - telefono: " . $_POST['preftelefono'] . " " .$_POST['telefono'];
            echo " - sesso: " . $_POST['sesso'];
            echo " - password: " . $_POST['password'];
            echo " - password_confirmation: " . $_POST['password_confirmation'];
            */

            //header( 'Location:' . get_bloginfo('url') . '/login/?success=1&u=' . $username );
            $to = $_POST['email'];
            $subject = 'Benvenuto nella piattaforma di ItaliaCheCambia';
            $body = "Ciao ".$_POST['firstname']."<br>Benvenuto nella piattaforma di ItaliaCheCambia";
            $body .= "<br>Il tuo nome utente è ".$_POST['username'];
            $headers = array('Content-Type: text/html; charset=UTF-8');

            wp_mail( $to, $subject, $body, $headers );
            wp_mail( 'ptiozzo@me.com', '[ICC] nuovo utente registrato', $body, $headers );
            ?>


            <form id="ml_signup_form" class="mb-2" action="https://b3x1d.emailsp.com/frontend/subscribe.aspx" method="post">
              <input name="email" type="hidden" value="<?php echo $_POST['email'];?>">
              <input name="prefix" type="hidden" value="<?php echo $_POST['preftelefono'];?>" />
              <input name="number" type="hidden" value="<?php echo $_POST['telefono'];?>" />
              <input name="campo1" type="hidden" value="<?php echo $_POST['firstname'];?>" />
              <input name="campo2" type="hidden" value="<?php echo $_POST['lastname'];?>" />
              <input name="campo6" type="hidden" value="<?php echo $_POST['cap'];?>" />
              <input name="campo28" type="hidden" value="<?php echo $_POST['sesso'];?>" />
              <input name="campo29" type="hidden" value="<?php echo $_POST['anno_nascita'];?>" />

              <div class="form-check">
                <input name="list" type="checkbox" value="3">
                <label class="form-check-label" for="gridCheck1">
                  La newsletter settimanale di ItaliaCheCambia
                </label>
              </div>
              <div class="form-check">
                <input name="list" type="checkbox" value="13">
                <label class="form-check-label" for="gridCheck1">
                  La newsletter mensile di PiemonteCheCambia
                </label>
              </div>
              <div class="form-check">
                <input name="list" type="checkbox" value="17">
                <label class="form-check-label" for="gridCheck1">
                  La newsletter mensile di LiguriaCheCambia
                </label>
              </div>
              <div class="form-check">
                <input name="list" type="checkbox" value="16">
                <label class="form-check-label" for="gridCheck1">
                  La newsletter mensile di CasentinoCheCambia
                </label>
              </div>
              <div class="form-check">
                <input name="list" type="checkbox" value="15">
                <label class="form-check-label" for="gridCheck1">
                  La newsletter giornaliera di #IoNonMiRassegno
                </label>
              </div>
              <input type="submit" class="btn btn-primary ml-3 mt-2 " id="submitbtn" name="submit" value="Iscriviti" />
            </form>

            <div class="alert alert-success" role="alert">
              Registrazione avvenuta con successo. Effettua il <a class="alert-link" href="/wp-login.php?redirect_to=/">login</a> o torna alla <a class="alert-link" href="/">home page</a>
            </div>
            <?php
        }
        else{
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
}
if($success != 1){
?>

 <form id="wp_signup_form" class="mb-2" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
  <div class="row m-0">
        <div class="form-group col-12 col-md-6">
          <label for="firstname">Nome</label>
          <input type="text" name="firstname" class="form-control" id="firstname" aria-describedby="firstname" <?php if ($_SERVER['REQUEST_METHOD'] == 'POST' ){echo 'value="'.$_POST["firstname"].'"';} ?>>
        </div>
        <div class="form-group col-12 col-md-6">
          <label for="lastname">Cognome</label>
          <input type="text" name="lastname" class="form-control" id="lastname" aria-describedby="lastname" <?php if ($_SERVER['REQUEST_METHOD'] == 'POST' ){echo 'value="'.$_POST["lastname"].'"';} ?>>
        </div>
        <div class="form-group col-12 col-md-6">
          <label for="username">Scegli il tuo nome utente</label>
          <input type="text" name="username" class="form-control" id="username" aria-describedby="username" <?php if ($_SERVER['REQUEST_METHOD'] == 'POST' ){echo 'value="'.$_POST["username"].'"';} ?>>
          <small id="email" class="form-text text-muted">Lo username ti servirà per accedere alla piattaforma.</small>
        </div>
        <div class="form-group col-12 col-md-6">
          <label for="Email1">Indirizzo mail</label>
          <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" <?php if ($_SERVER['REQUEST_METHOD'] == 'POST' ){echo 'value="'.$_POST["email"].'"';} ?>>
          <small id="email" class="form-text text-muted">Non condivideremo con nessuno questo indirizzo mail.</small>
        </div>
        <div class="form-group col-12 col-md-6">
          <label for="cap">CAP</label>
          <input type="text" name="cap" class="form-control" id="cap" aria-describedby="cap" <?php if ($_SERVER['REQUEST_METHOD'] == 'POST' ){echo 'value="'.$_POST["cap"].'"';} ?>>
        </div>
        <div class="form-group col-12 col-md-6">
          <label for="anno_nascita">Anno di nascita</label>
          <input type="text" name="anno_nascita" class="form-control" id="anno_nascita" aria-describedby="anno_nascita" <?php if ($_SERVER['REQUEST_METHOD'] == 'POST' ){echo 'value="'.$_POST["anno_nascita"].'"';} ?>>
        </div>
        <div class="form-group col-4 col-md-2">
          <label for="preftelefono">Prefisso</label>
          <input type="text" name="preftelefono" class="form-control" id="telefono" aria-describedby="telefono" <?php if ($_SERVER['REQUEST_METHOD'] == 'POST' ){echo 'value="'.$_POST["preftelefono"].'"';}else{echo 'value=+39';} ?>>
        </div>
        <div class="form-group col-8 col-md-4">
          <label for="telefono">Numero di telefono</label>
          <input type="text" name="telefono" class="form-control" id="telefono" aria-describedby="telefono" <?php if ($_SERVER['REQUEST_METHOD'] == 'POST' ){echo 'value="'.$_POST["telefono"].'"';} ?>>
        </div>
        <div class="form-group col-12 col-md-6">
          <label for="sesso">Sesso</label>
          <select name="sesso" class="form-control" id="sesso">
            <option value="-" <?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['sesso'] == "-" ){echo "selected";} ?>>-</option>
            <option value="M" <?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['sesso'] == "M" ){echo "selected";} ?>>M</option>
            <option value="F" <?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['sesso'] == "F" ){echo "selected";} ?>>F</option>
          </select>
        </div>
        <div class="form-group col-12 col-md-6">
          <label for="Password1">Password</label>
          <input type="password" name="password" class="form-control" id="Password1">
          <small id="email" class="form-text text-muted">La password deve essere di almeno 6 caratteri.</small>
        </div>
        <div class="form-group col-12 col-md-6">
          <label for="password_confirmation">Conferma Password</label>
          <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
          <small id="email" class="form-text text-muted">Ripeti la tua password.</small>
        </div>
        <div class="form-check col-12 ml-3">
          <input class="form-check-input" name="terms" type="checkbox" value="Yes" id="terms" <?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['terms'] == "Yes" ){echo "checked";} ?>>
          <label class="form-check-label" for="terms">
            Accetto i termini e le condizioni
          </label>
        </div>

        <input type="submit" class="btn btn-primary ml-3 mt-2 " id="submitbtn" name="submit" value="Registrati" />
  </div>
</form>
<?php } ?>
</div>
<?php get_footer(); ?>

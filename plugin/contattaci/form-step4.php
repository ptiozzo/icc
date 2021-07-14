<?php
$sonoUn = '';
if($_POST['sonoun'] == 'azienda-imprenditore-liberoprofessionista'){
  $sonoUn = 'Azienda/imprenditore/libero professionista';
}elseif($_POST['sonoun'] == 'lettore'){
  $sonoUn = 'Lettore';
}elseif($_POST['sonoun'] == 'realta-mappa'){
  $sonoUn = 'Realtà mappa';
}elseif($_POST['sonoun'] == 'associazione'){
  $sonoUn = 'Associazione';
}elseif($_POST['sonoun'] == 'scuola-universita'){
  $sonoUn = 'Scuola/università';
}elseif($_POST['sonoun'] == 'giornalista'){
  $sonoUn = 'Giornalista';
}elseif($_POST['sonoun'] == 'ufficiostampa-evento'){
  $sonoUn = 'Ufficio stampa/Evento';
}elseif($_POST['sonoun'] == 'giornalista'){
  $sonoUn = 'Giornalista';
}else{
  $sonoUn = 'Altro';
}

$destinatarioICC = '';
$desidero = '';
//Sono un Common
if($_POST['desidero'] == 'altro'){
  $destinatarioICC = 'partnership@italiachecambia.org';
  $desidero = 'Altro';
}elseif($_POST['desidero'] == 'fareunadonazioneaicc'){
  $destinatarioICC = $_POST['problema-donazione'];
  $desidero = 'Fare una donazione';
}elseif($_POST['desidero'] == 'segnalareunprogettoperlamappadiicc'){
  $destinatarioICC = 'mappa@italiachecambia.org';
  $desidero = 'Segnalare un progetto per la mappa di ICC';
}elseif($_POST['desidero'] == 'promuovereuneventoouniniziativa'){
  $destinatarioICC = 'partnership@italiachecambia.org';
  $desidero = 'Promuovere un evento/iniziativa';
}elseif($_POST['desidero'] == 'sponsorizzarelamiaattivitsuicc'){
  $destinatarioICC = 'partnership@italiachecambia.org';
  $desidero = 'Sponsorizzare la mia attività su ICC';
}elseif($_POST['desidero'] == 'proporreunacollaborazione'){
  $destinatarioICC = 'partnership@italiachecambia.org';
  $desidero = 'Proporre una collaborazione';
}elseif($_POST['desidero'] == 'segnalareuneventoouniniziativa'){
  $destinatarioICC = 'redazione@italiachecambia.org';
  $desidero = 'Segnalare un evento\iniziativa';
}

//Sono un Azienda


//Sono un Lettore
elseif($_POST['desidero'] == 'segnalareunanotiziauniniziativaounprogettoallaredazione'){
  $destinatarioICC = 'redazione@italiachecambia.org';
  $desidero = "Segnalare una notizia, un’iniziativa o un progetto alla redazione";
}elseif($_POST['desidero'] == 'inserireunannuncioinbacheca'){
  $destinatarioICC = 'redazione@italiachecambia.org';
  $desidero = "Inserire un annuncio in bacheca";
}elseif($_POST['desidero'] == 'rispondereaunannuncioinbacheca'){
  $destinatarioICC = 'redazione@italiachecambia.org';
  $desidero = "Rispondere a un annuncio in bacheca";
}elseif($_POST['desidero'] == 'vogliocontribuireacambiareilmondo'){
  $destinatarioICC = 'redazione@italiachecambia.org';
  $desidero = 'Voglio contribuire a cambiare il mondo';
}elseif($_POST['desidero'] == 'voglioscriverepericc'){
  $destinatarioICC = 'redazione@italiachecambia.org';
  $desidero = 'Voglio scrivere per ICC';
}

//Sono un Realtà della mappa
elseif($_POST['desidero'] == 'chiedereunamodificaallamiaschedasullamappadiicc'){
  $destinatarioICC = 'mappa@italiachecambia.org';
  $desidero = "Chiedere una modifica alla mia scheda sulla mappa di ICC";
}elseif($_POST['desidero'] == 'segnalareunanotiziaounprogettoallaredazione'){
  $destinatarioICC = 'redazione@italiachecambia.org';
  $desidero = "Segnalare una notizia o un progetto alla redazione";
}

//Sono un Associazione
elseif($_POST['desidero'] == 'segnalareunanotiziauniniziativaounprogettoallaredazione'){
  $destinatarioICC = 'redazione@italiachecambia.org';
  $desidero = "Segnalare una notizia, un’iniziativa o un progetto alla redazione";
}

//Sono una scuola/Università
elseif($_POST['desidero'] == 'contattarelaredazione'){
  $destinatarioICC = 'redazione@italiachecambia.org';
  $desidero = "Contattare la redazione";
}

//Sono un Giornalista
elseif($_POST['desidero'] == 'scrivereperitaliachecambia'){
  $destinatarioICC = 'redazione@italiachecambia.org';
  $desidero = "Scrivere per Italia che Cambia";
}elseif($_POST['desidero'] == 'segnalareunanotiziauniniziativaounprogettoallaredazione'){
  $destinatarioICC = 'redazione@italiachecambia.org';
  $desidero = "Segnalare una notizia, un’iniziativa o un progetto alla redazione";
}

//Sono un Ufficio stampa

//Sono un altro

else{
  $destinatarioICC = 'webmaster@italiachecambia.org';
  $desidero = 'Altro';
}

?>
<p><strong>Nome:</strong> <?php echo $_POST['fullname']; ?></p>
<p><strong>Cognome:</strong> <?php echo $_POST['fullsurname']; ?></p>
<p><strong>eMail:</strong> <?php echo $_POST['email']; ?></p>
<p><strong>Sono un:</strong> <?php echo $sonoUn; ?></p>
<p><strong>Desidero:</strong> <?php echo $desidero; ?></p>
<p><strong>Messaggio:</strong> <?php echo $_POST['messaggio']; ?></p>




<p><strong>Invio a :</strong> <?php echo $_POST['email']." - ".$destinatarioICC ?></p>

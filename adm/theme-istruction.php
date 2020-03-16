<div class="wrap">
  <h2>Istruzioni per template</h2>
  <p>Ecco alcune note per l'utilizzo corretto del sito</p>

  <h2>Aggiungere articolo su home page</h2>
  <p>Per aggiungere un articolo in homepage occorrerà impostare il flag su "InHome" presente nel gruppo
  <b>ICC altri filtri</b> che si trova subito sotto ai TAG</p>
  <p>Qualsiasi contenuto ha bisogno di quel flag per apparire in home</p>
  <p>Unica eccezione è la rassegna stampa grande in alto. Per farla scorrere più in basso occorrerà invece che abbia il flag</p>

  <h2>Rassegna stampa</h2>
  <p>La rassegna stampa ha una sua "tipologia" di post e gli articoli si trovano in un blocco differente rispetto agli articoli</p>
  <p>Tranne per questa piccola differenza si comportano allo stesso modo degli altri articoli</p>

  <h2>I nostri libri</h2>
  <p>Anche questi, come per la rassegna, ha un suo formato post a parte rispetto agli altri articoli</p>

  <h2>Secondo autore, montaggio, intervista, riprese, video youtube</h2>
  <p>Per aggiungere i vari elementi presenti nel titolo qua sopra occorrerà:
    <ul>
      <li>Essere nell'editor di un articolo</li>
      <li>Cliccare sui 3 puntini in alto a destra</li>
      <li>Selezionare Opzioni al fondo del menu'</li>
      <li>Mettere il flag su Campi personalizzti</li>
      <li>Aggiungere il campo personalizzato o selezionarlo dal menu' a tendina</li>
      <li>Inserire il valore da visualizzare</li>
    </ul>
    I nomi dei campi sono: SecondoAutore, IntervistaDi, RipreseDi, MontaggioDi, VideoRalizzatoDa, YouTubeLink, MappaProgetto<br>
    Per quanto riguarda i link di youtube si possono inserire i link copiati dall'URL del browser,
     i link "corti" generati da youtube, il solo identificativo del video.<br>
    MappaProgetto server ad indicare il link che verrà inserito nel pulsante dele actiona sinistra.
  </p>


  <h2>Aggiungere nuova regione</h2>
  <p>
    <ul>
      <li>Creare la categoria "regione che cambia"</li>
      <li>Creare il template della regione ed impostare il $catPage con lo slug della categoria</li>
      <li>Creare la pagina "regione che cambia" associando il template sopra creato e facendo attenzione che lo slug sia solo "regione"</li>
      <li>Aggiungere la pagina al menu "regioni"</li>
      <li>Crare il menu personalizzato nel function.php</li>
      <li>Creare il nuovo menu dal backend di WP</li>
      <li>Aggiungere le voci desiderate al menu'</li>
      <li>Creare la pagina sul template con il formato desiderato</li>
    </ul>
  </p>

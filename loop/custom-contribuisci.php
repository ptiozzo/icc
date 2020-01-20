<div class="row contribuisci collapse <?php if($_COOKIE['contribuisci']!= 'close'){echo "show";} ?> mx-0" id="contribuisci">
  <div class="col-2 d-none d-md-block mx-auto my-auto">
    <img src='<?php echo get_template_directory_uri();?>/assets/img/logo/italia-che-cambia_nero.png' alt='Italia che cambia' title='Italia che cambia'>
  </div>
  <div class="col-12 col-md-7 p-2 font-weight-light">
    <p class="d-none d-md-block">Sempre più persone, come te, comprendono la necessità di un giornalismo indipendente e costruttivo.<br>
    <b>Italia che Cambia</b> è da sempre impegnata nella diffusione di notizie che contribuiscano a costruire un nuovo immaginario sul nostro Paese, fornendo esempi concreti per la transizione verso un mondo migliore.
    Abbiamo scelto di mantenere le nostre notizie gratuite e disponibili per tutti, riconoscendo l’importanza che ciascuno di noi abbia accesso a un giornalismo accurato e costruttivo.</p>
    <p>Il contributo di ogni lettore, piccolo o grande, ha grande valore ed è essenziale per proteggere l'editoria indipendente.</p>
    <p class="d-none d-md-block">Se ne hai la possibilità contribuisci a Italia che Cambia oggi anche con un piccolo contributo.</p>
  </div>
  <div class="col-auto d-flex align-items-end"><a class="btn btn-dark mb-3 text-white rounded-pill" href="/sostienici/">Contribuisci</a></div>
  <div class="col-auto ml-auto"><button class="btn btn-outline-dark my-3 rounded-pill" type="button" data-toggle="collapse" data-target="#contribuisci" aria-expanded="false" aria-controls="collapsContribuisci">X</a></div>
</div>
<script>
$('#contribuisci').on('hidden.bs.collapse', function () {
  var date = new Date();
  date.setTime(date.getTime()+(7*24*60*60*1000));
  document.cookie = "contribuisci=close; expires=" + date.toGMTString() + ";path=/";
})

</script>

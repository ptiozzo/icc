<form id="ml_signup_form" name="ml_signup_form" class="mb-2" action="https://b3x1d.emailsp.com/frontend/subscribe.aspx" onsubmit="return NewsletterVerification()" method="post">
 <div class="row m-0">
       <div class="form-group col-12 col-md-6">
         <label for="campo1">Nome</label>
         <input type="text" name="campo1" class="form-control" id="firstname" aria-describedby="firstname" required>
         <small>Obbligatorio</small>
       </div>
       <div class="form-group col-12 col-md-6">
         <label for="campo2">Cognome</label>
         <input type="text" name="campo2" class="form-control" id="lastname" aria-describedby="lastname" required>
         <small>Obbligatorio</small>
       </div>
       <div class="form-group col-12 col-md-6">
         <label for="Email1">Indirizzo mail</label>
         <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" required>
         <small>Obbligatorio</small>
       </div>
       <div class="form-group col-12 col-md-6">
         <label for="campo6">CAP</label>
         <input type="text" name="campo6" class="form-control" id="cap" aria-describedby="cap" required>
         <small>Obbligatorio</small>
       </div>
       <div class="form-group col-12 col-md-6">
         <label for="campo29">Anno di nascita</label>
         <input type="text" name="campo29" class="form-control" id="anno_nascita" aria-describedby="anno_nascita">
         <small>Facoltativo</small>
       </div>
       <div class="form-group col-4 col-md-2">
         <label for="prefix">Prefisso</label>
         <input type="text" name="prefix" class="form-control" id="telefono" aria-describedby="telefono" value="+39">
         <small>Facoltativo</small>
       </div>
       <div class="form-group col-8 col-md-4">
         <label for="number">Numero di telefono</label>
         <input type="text" name="number" class="form-control" id="telefono" aria-describedby="telefono">
         <small>Facoltativo</small>
       </div>
       <div class="form-group col-12 col-md-6">
         <label for="campo28">Sesso</label>
         <select name="campo28" class="form-control" id="sesso">
           <option value="-">-</option>
           <option value="M">M</option>
           <option value="F">F</option>
         </select>
         <small>Facoltativo</small>
       </div>
       <div class="col-12">
         <select name="list" id="cars" class="w-75" multiple required>
            <option value="3">La newsletter settimanale di ItaliaCheCambia</option>
            <option value="13">La newsletter mensile di PiemonteCheCambia</option>
            <option value="16">La newsletter mensile di CasentinoCheCambia</option>
            <option value="15">La newsletter giornaliera di #IoNonMiRassegno</option>
          </select>
       </div>
       <div class="col-12">
         <small>Obbligatorio. Per selezionare più liste tieni premuto il tasto control (CTRL)</small>
       </div>


         <!--<div class="form-check col-12">
           <input name="list" type="checkbox" value="3">
           <label class="form-check-label" for="gridCheck1">
             La newsletter settimanale di ItaliaCheCambia
           </label>
         </div>
         <div class="form-check col-12">
           <input name="list" type="checkbox" value="13">
           <label class="form-check-label" for="gridCheck1">
             La newsletter mensile di PiemonteCheCambia
           </label>
         </div>
         <div class="form-check col-12">
           <input name="list" type="checkbox" value="16">
           <label class="form-check-label" for="gridCheck1">
             La newsletter mensile di CasentinoCheCambia
           </label>
         </div>
         <div class="form-check col-12">
           <input name="list" type="checkbox" value="15">
           <label class="form-check-label" for="gridCheck1">
             La newsletter giornaliera di #IoNonMiRassegno
           </label>
         </div>-->

       <input type="submit" class="btn btn-primary ml-3 mt-2 " id="submitbtn" name="submit" value="Registrati" />
 </div>
</form>

<?php
@include_once('app/templates/bovenstuk.php');
?>
<!-- BEGIN PAGINA CONTAINER -->
<div class="container main-content">
   <div class="row first-row">
      <div class="col s6 push-s3">

         <!-- BEGIN LOGIN FORMULIER -->
         <div class="card">
            <div class="card-content">
               <div class="row">
                  <form class="col s12" method="POST" action="app/login/login_afhandelen.php">
                     <h1 class="title">Aanmelden</h1>
                     <div class="row">
                        <div class="input-field col s12">
                           <input id="Email" name="email" type="email" class="validate" required>
                           <label for="Email">Email</label>
                        </div>
                     </div>
                     <div class="row">
                        <div class="input-field col s12">
                           <input id="Password" type="password" name="password" class="validate" required>
                           <label for="Password">Wachtwoord</label>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col s12">
                           <button class="btn waves-effect waves-light right" type="submit" name="action">
                              Aanmelden
                           </button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
         <!-- EINDE LOGIN FORMULIER -->

      </div>
   </div>
</div>
<!-- EINDE PAGINA CONTAINER -->
<?php
@include_once('app/templates/onderstuk.php');
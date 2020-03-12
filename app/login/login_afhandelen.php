<?php
session_start();
@include_once('../database/db.php');

// 1. Controleren of het formulier wel gebruikt is
if(!isset($_POST['email']) || !isset($_POST['password'])) {
   header('Location: ../../loginform.php');
   exit(0);
}

// 2. Haal ik de gegevens uit het formulier en
//    plaats dit in variabelen
$email = $_POST['email'];
$password = $_POST['password'];

// 3. connectie met de DB maken
if(dbConnect()) {
   // 4. SQL samenstellen met daarin het email en het
   //    wachtwoord
   $sql = "SELECT * FROM users
           WHERE email = '$email'";

   // 5. SQL query uitvoeren
   dbQuery($sql);

   // 5. Controleren of de DB server iets gevonden heeft
   $user = dbGet();

   if(dbCount() == 0) {
      echo 'Geen gevonden';
   }

   // 6. Wachtwoorden vergelijken
   if(password_verify($password, $user['password'])) {
      // 6a. Gevonden - Dan gaan we door naar Home
      // Inloggen succesvol
      $_SESSION['user_id'] = $user['id'];
      $_SESSION['username'] = $user['username'];
      $_SESSION['role'] = $user['role'];

      header('Location: ../../index.php');
      exit(0);
   }

   // 6b. Niet gevonden - Dan gaan we terug naar Loginform
   header('Location: ../../loginform.php');
   exit(0);
} else {
   header('../../index.php');
   exit(0);
}
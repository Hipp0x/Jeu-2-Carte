<?php session_start()    ; ?>
<!DOCTYPE html>

<html lang="fr">


<head>

	<title>Supression de compte</title>
  <link rel="stylesheet" href="styles/supp_compte.css">
  <link rel="stylesheet" href="styles/Header.css">
  <meta charset="utf-8">

</head>



<body>

	<header>
   <?php 
   include 'Include/header.php'; 
   ?>
 </header>

 <h1>Supprimer mon compte</h1>

 <div class="all">

   <div class="para">

     <p>Es-tu sûr de vouloir supprimer ton compte? <br>Tes données et tes jeux seront supprimés.</p>

   </div> 


   <div class="txt">
     <form method="post">
      <div class="conf">
        <label class="aa" for="mdp">Mot de Passe</label>
        <input class="bb" type="password" id="mdp" name="mdp" placeholder=" Entrer votre mot de passe " required />
      </div>
      <div class="butt">
        <input class="button" type="button"  name="retour" value="Annuler" onclick="self.location.href='page_compte.php'">
        <input class="button2" type="submit" name="envoie" value="Supprimer le compte"/>
      </div>
    </form>
  </div>

  <div class="mess">
    <?php
    if(isset($_POST['envoie'])) {
      include 'Include/Supprimer.php';
    }
    ?>
  </div>

</div>

</body>
</html>
<?php session_start(); ?>
<!DOCTYPE html>

<html lang="fr">


<head>

  <title>Supprimer mon jeu</title>
  <link rel="stylesheet" href="styles/supp_jeu.css">
  <link rel="stylesheet" href="styles/Header.css"> 
  <meta charset="utf-8">

</head>



<body>

  <header>
   <?php include 'Include/header.php'; ?>
 </header>

 <h1>Tu t'apprêtes à supprimer ton jeu</h1>


 <div class="bloc">
  <div class="para">
    <p>Veux-tu réellement supprimer ton jeu "
      <?php
      $n = htmlspecialchars($_GET['jeu']);
      $a = strlen(htmlspecialchars($_GET['jeu']));
      $init = 0;
      while ($init < $a){
        if ($n[$init] == "_") {
          $n[$init] = " ";
        } else if($n[$init] == "~") {
          $n[$init] = "+";
        }
        $init++;
      }
      $nomjeu = $n;
      echo $nomjeu; 
      ?>
    " ?</p>
  </div>
  <div class="button">
    <div class="butt1">
      <form action="modifier_mes_jeux.php">
       <input class="buto1" type="submit" value="Annuler">
     </form>
   </div>
   <div class="butt2">
     <form method="post">
       <input class="buto2" type="submit" name="confirmer" value="Confirmer">
     </form>
   </div>
 </div>
</div>

<?php if(isset($_POST['confirmer'])){
 include 'Include/database.php';
 global $bdd;
 $req = $bdd->prepare('DELETE FROM td_jeux WHERE nom = :nom');
 $req->execute(array('nom' => $nomjeu));
 header('LOCATION: page_compte.php');
} 
?>

</body>


</html>

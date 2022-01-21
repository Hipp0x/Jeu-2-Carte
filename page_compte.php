<?php session_start(); ?>
<!DOCTYPE html>

<html lang="fr">


<head>

  <title>Mon Compte</title>
  <link rel="stylesheet" href="styles/compte.css">
  <link rel="stylesheet" href="styles/Header.css"> 
  <meta charset="utf-8">

</head>



<body>

  <header>
   <?php include 'Include/header.php'; ?>
 </header>

 <h1>Mon Compte</h1>

 <?php 
 include 'Include/database.php';
 global $bdd;
 $req = $bdd->prepare('SELECT * FROM td_utilisateurs WHERE pseudo = :pseudo');
 $req->execute(array('pseudo' => $_SESSION['pseudo']));
 $utilisateur = $req->fetch();

 $req2 = $bdd->prepare('SELECT COUNT(*) c FROM td_jeux WHERE createur = :pseudo');
 $req2->execute(array('pseudo' => $_SESSION['pseudo'] ));
 $jeux = $req2->fetch();
 ?>

 <div class="bloc">

  <div class="pres">
   <p><strong>Prénom :</strong> <?php echo $utilisateur['prenom'];?><br></p>
   <p><strong>Pseudo :</strong> <?php echo $utilisateur['pseudo']; ?><br></p>
   <p><strong>Mail :</strong> <?php echo $utilisateur['mail']; ?><br></p>
   <p>Tu as créé <?php echo $jeux['c'] ; ?> jeux.</p>
 </div>

 <div class="mod">

  <div class="jeu">
    <?php if($jeux['c'] >= 1 ){
      ?>
      <a href="modifier_mes_jeux.php" ><p class="blck"> Mes jeux </p></a>
      <?php
    }
    ?>
  </div>
  <div class="donnee">
    <a href="modifier_donnees.php" ><p class="blck"> Modifier mes données </p></a>
  </div>

  <div class="supp">
    <a href="supprime_compte"><p class="blck"> Supprimer mon compte </p></a>
  </div>
</div>
</div>


</body>


</html>

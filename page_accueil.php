<?php session_start();?>

<!DOCTYPE html>

<html lang="fr">


<head>

  <title>Accueil</title>
  <link rel="stylesheet" href="styles/Accueil.css">
  <link rel="stylesheet" href="styles/Header.css">
  <link rel="stylesheet" href="styles/footer.css">
  <meta charset="utf-8">

</head>


<body>
  <header>
   <?php include 'Include/header.php'; ?>
 </header>

 <h1>Bienvenue sur "Jeux 2 Cartes En Ligne"</h1>

 <?php 
 if(isset($_SESSION['pseudo'])){
  ?>
  <h2>Content de vous revoir <?php echo $_SESSION['pseudo'] ?> !</h2>
  <?php
} else {
  ?>
  <h2> Inscris-toi pour plus de fonctionnalités !</h2>
  <?php
}
?>
<div class="accueil">
  <div class="acc">
    <a href="page_jeux_principale.php">
      <p class="blck">S'exercer</p>
    </a> 
  </div>

  <?php 
  if (isset($_SESSION['pseudo'])){
    ?>
    <div class="accco">
      <a href="creer_un_jeux.php">
        <p class="blck">Créer un jeu</p>
      </a>
    </div>
    <?php
  }
  ?>
</div>

<footer class="fot">
  <?php include 'Include/footer.php';
  ?>
</footer>
</body>


</html>

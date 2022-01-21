<?php session_start(); ?>
<!DOCTYPE html>

<html lang="fr">


<head>

  <title>Mes Jeux</title>
  <link rel="stylesheet" href="styles/modif_mes_jeux.css">
  <link rel="stylesheet" href="styles/Header.css">
  <meta charset="utf-8">

</head>



<body>

  <header>
   <?php include 'Include/header.php'; ?>
 </header>


 <?php 
 include 'Include/database.php';
 global $bdd;
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
$req2 = $bdd->prepare('SELECT COUNT(*) c FROM td_cartes WHERE nom_jeu = :nom_jeu');
$req2->execute(array('nom_jeu' => $n ));
$cartescrees = $req2->fetch();
?>

<h1>Modifie ton jeu de cartes</h1>

<div class="acc">
<a href="modifier_mes_jeux.php">
  <p class="blck">Revenir à mes jeux</p>
</a>
</div>

<div class="bloc">

  <div class="haut">

    <div class="titre">
     <h2>Modifier le titre</h2>

     <p>Si tu  le souhaites, tu peux modifier le titre de ton jeu !</p>

     <form method="post">
       <input class="txt" type="text" name="nvtitre" placeholder=" Nouveau Titre ">
       <input class="butt" type="submit" name="modiftitre" value="Confirmer">
     </form>

     <div class="mess">
       <?php
       if (isset($_POST['modiftitre'])){
        include 'Include/modif_carte.php';
      }
      ?>
    </div> 
  </div>

  <div class="nb_carte"> 
    <?php 

    if ($cartescrees['c'] == 1 || $cartescrees['c'] == 0){
      ?>
      <h2>Ton jeu comporte <?php echo $cartescrees['c'];?> carte !</h2>
      <?php
    } else {
      ?>
      <h2>Ton jeu comporte <?php echo $cartescrees['c'];?> cartes !</h2>
      <?php
    }
    if($cartescrees['c'] < 15){
      $reste = 15-$cartescrees['c'];
      ?>
      <p>Tu peux encore créer <?php echo $reste; ?> cartes.</p>
      <input class="butt" type="button" value=" Créer " onclick="self.location.href='ajouter_des_cartes.php?jeu=<?php echo htmlspecialchars($_GET['jeu']); ?>'">
      <?php
    }

    if ($cartescrees['c'] == 15){ 
      ?>
      <p>Tu ne peux plus créer de cartes.</p>
      <?php
    }
    ?>
  </div>

</div>

<?php if($cartescrees['c'] !=  0) {
  ?>

  <div class="tit">
    <h2>Voici toutes les cartes que tu peux modifier !</h2>
  </div>

  <div class="all">
    <?php

    include 'Include/database.php';
    global $bdd;
    $nomjeu = htmlspecialchars($_GET['jeu']);
    $req = $bdd->prepare('SELECT * FROM td_jeux WHERE nom = :nom');
    $req->execute(array('nom'=>$n));
    $res = $req->fetch();
    $bis = $bdd->prepare('SELECT * FROM td_themes WHERE nom = :nom');
    $bis->execute(array('nom'=>$res['theme']));
    $color = $bis->fetch();
    $req2 = $bdd->prepare('SELECT * FROM td_cartes WHERE nom_jeu = :nom_jeu');
    $req2->execute(array('nom_jeu' => $n));
    while ($carte = $req2->fetch()){
      $q = $carte['question'];
      $a = strlen($carte['question']);
      $init = 0;
      while ($init < $a){
        if ($q[$init] == " ") {
          $q[$init] = "_";
        } else if ($q[$init] == "+"){
          $q[$init] = "~";
        }
        $init++;
      }      
      ?>
      <div class="carte">
        <a class="Carte" href="modifier_la_carte.php?jeu=<?php echo htmlspecialchars($_GET['jeu']);?>&amp;question=<?php echo $q;?>">
          <p class="blck" style="background-color: <?php echo $color['couleur']; ?>"> <strong>Question :</strong> <?php echo $carte['question']; ?> <br><br> <strong>Réponse :</strong> <?php echo $carte['reponse'];?></p>
        </a>
      </div>
      <?php
    }
  }
  ?>
</div>
</div>


</body>


</html>

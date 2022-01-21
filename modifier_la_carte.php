<?php session_start(); ?>
<!DOCTYPE html>

<html lang="fr">


<head>

  <title>Mes Jeux</title>
  <link rel="stylesheet" href="styles/modif_carte.css">
  <link rel="stylesheet" href="styles/Header.css">
  <meta charset="utf-8">

</head>



<body>

  <header>
   <?php include 'Include/header.php'; ?>
 </header>

 <h1>Modifie ta carte !</h1>

 <p>Tu n'es pas obligé de remplir tous les champs. Tu peux changer uniquement ta question/réponse/aide si tu le souhaites.</p>

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
$nomjeu = $n;


$req = $bdd->prepare('SELECT * FROM td_jeux WHERE nom = :nom');
$req->execute(array('nom'=> $nomjeu));
$res = $req->fetch();

$bis = $bdd->prepare('SELECT * FROM td_themes WHERE nom = :nom');
$bis->execute(array('nom'=>$res['theme']));
$color = $bis->fetch();

$q = htmlspecialchars($_GET['question']);
$a = strlen(htmlspecialchars($_GET['question']));
$init2 = 0;
while ($init2 < $a){
  if ($q[$init2] == "_") {
    $q[$init2] = " ";
  } else if ($q[$init2] == "~"){
    $q[$init2] = "+";
  }
  $init2++;
}
$ques = $q;

$req = $bdd->prepare('SELECT * FROM td_cartes WHERE nom_jeu = :nom_jeu AND question = :question');
$req->execute(array('nom_jeu' => $nomjeu, 'question' => $ques));
$resu = $req->fetch();

?>
<div class="bloc">

 <form method="post" >

  <div class="ques">

    <div class="base">
      <p>Question</p>
    </div>
    <div class="carte1">
      <p style="background-color: <?php echo $color['couleur'];?>"><?php echo $resu['question']; ?></p>
    </div>
    <div class="transition"></div>
    <div class="carte2">
      <p style="background-color: <?php echo $color['couleur'];?>"><input class="champ" type="text" name="ques" placeholder=" Nouvelle Question "></p>
    </div>
  </div>

  <div class="rep">

    <div class="base">
      <p>Réponse</p>
    </div>
    <div class="carte1">
      <p style="background-color: <?php echo $color['couleur'];?>"><?php echo $resu['reponse']; ?></p>
    </div>
    <div class="transition"></div>
    <div class="carte2">
      <p style="background-color: <?php echo $color['couleur'];?>"><input class="champ" type="text" name="rep" placeholder=" Nouvelle Réponse "></p>
    </div>
  </div>

  <div class="aid">
    <div class="base">
      <p>Aide</p>
    </div>
    <?php 
    if($resu['aide'] == null){
      ?>
      <div class="carte1">
        <p style="background-color: <?php echo $color['couleur'];?>">Tu peux ajouter une aide</p>
      </div>
      <div class="transition"></div>
      <div class="carte2">
        <p style="background-color: <?php echo $color['couleur'];?>"><input class="champ" type="text" name="aide" placeholder=" Aide "></p>
      </div>
      <?php
    } else {
      ?>
      <div class="carte1">
        <p style="background-color: <?php echo $color['couleur'];?>"><?php echo $resu['aide']; ?></p>
      </div>
      <div class="transition"></div>
      <div class="carte2">
        <p style="background-color: <?php echo $color['couleur'];?>"><input class="champ" type="text" name="aide" placeholder=" Nouvelle Aide "></p>
      </div>
      <?php
    }
    ?>
  </div>
  <div class="butt">
    <input class="button" type="submit" name="conf" value="Confirmer" >     
  </div>   
</form>

<div class="mess">
  <?php
  if(isset($_POST['conf'])) {
    include 'Include/modif_carte.php';
  }
  ?>
</div>
</div>

<div class="acc">
  <a href="modifier_le_jeu.php?jeu=<?php echo htmlspecialchars($_GET['jeu']);?>">
    <p class="blck">Revenir à mes cartes</p>
  </a>
</div>
</body>


</html>

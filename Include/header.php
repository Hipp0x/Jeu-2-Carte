<?php
if(isset($_SESSION['pseudo'])){
  include 'Include/database.php';
  global $bdd;
  $req = $bdd->prepare('SELECT admin FROM td_utilisateurs WHERE pseudo = :pseudo');
  $req->execute(array('pseudo' => $_SESSION['pseudo']));
  $utili = $req->fetch();

  if($utili['admin'] == 2){ ?>
    <ul>
      <li><a href="page_accueil.php">Accueil</a></li>
      <li class="dropdown">
        <a href="javascript:void(0)" class="dropbtn">Administration</a>
        <div class="dropdown-content">
          <a href="administration_droits.php">Gestion des admins/mods</a>
          <a href="signalement.php">Voir les signalements</a>
          <a href="administration_theme.php">Gestion des thèmes</a>
          <a href="administration_supprimer_jeu.php">Supprimer un jeu</a>
          <a href="administration_supprimer_utilisateur.php">Supprimer un utilisateur</a>
        </div>
      </li>
      <li class="deco"><a href="Include/deconnexion.php">Déconnexion</a></li>
      <li class="deco"><a href="page_compte.php">Mon Compte</a></li>
    </ul>
    <?php
  }else if($utili['admin'] == 1){ ?>
    <ul>
      <li><a href="page_accueil.php">Accueil</a></li>
      <li class="dropdown">
        <a href="javascript:void(0)" class="dropbtn">Administration</a>
        <div class="dropdown-content">
          <a href="signalement.php">Voir les signalements</a>
          <a href="administration_theme.php">Ajouter un thème</a>
          <a href="administration_supprimer_jeu.php">Supprimer un jeu</a>
          <a href="administration_supprimer_utilisateur.php">Supprimer un utilisateur</a>
        </div>
      </li>
      <li class="deco"><a href="Include/deconnexion.php">Déconnexion</a></li>
      <li class="deco"><a href="page_compte.php">Mon Compte</a></li>
    </ul>
    <?php
  } else {
    ?>
    <ul>
      <li><a href="page_accueil.php">Accueil</a></li>
      <li class="deco"><a href="Include/deconnexion.php">Déconnexion</a></li>
      <li class="deco"><a href="page_compte.php">Mon Compte</a></li>
    </ul>
    <?php
  }
} else{ ?>

  <ul>
    <li><a href="page_accueil.php">Accueil</a></li>
    <li class="deco"><a href="page_connexion.php">Se connecter</a></li>
    <li class="deco"><a href="formulaire_inscription.php">S'inscrire</a></li>
  </ul>
  <?php
} 
?>

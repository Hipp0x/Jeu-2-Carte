<div class="sig">

<?php

if(isset($_POST['signal_carte'])){
	include 'database.php';

	global $bdd;

	$q = $bdd->prepare('SELECT * FROM td_cartes WHERE nom_jeu = ? AND question = ?');
	$q->execute(array($n, $cartes['question']));
	$donnee = $q->fetch();

	if($_POST['Signalement'] == "inapro"){
		$a = $donnee['signalement_inappro'] + 1;
		$req = $bdd->prepare('UPDATE td_cartes SET signalement_inappro = ? WHERE nom_jeu = ? AND question = ? ');
		$req->execute(array($a, $n, $cartes['question']));
		echo "Signalement effectué.";
	} else if($_POST['Signalement'] == "faux"){
		$a = $donnee['signalement_faux'] + 1;
		$req = $bdd->prepare('UPDATE td_cartes SET signalement_faux = ? WHERE nom_jeu = ? AND question = ? ');
		$req->execute(array($a, $n, $cartes['question']));
		echo "Signalement effectué.";
	}
	
}

if(isset($_POST['signal_jeu'])){
	include 'database.php';
	global $bdd;

	$q = $bdd->prepare('SELECT * FROM td_jeux WHERE nom = ?');
	$q->execute(array($jeux['nom']));
	$donnee = $q->fetch();

	if($_POST['Signalement'] == "titre"){
		$a = $donnee['signalement_titre'] + 1;
		$req = $bdd->prepare('UPDATE td_jeux SET signalement_titre = ? WHERE nom = ?');
		$req->execute(array($a, $jeux['nom']));
		echo "Signalement effectué.";
	} else if($_POST['Signalement'] == "theme"){
		$a = $donnee['signalement_theme'] + 1;
		$req = $bdd->prepare('UPDATE td_jeux SET signalement_theme = ? WHERE nom = ?');
		$req->execute(array($a, $jeux['nom']));
		echo "Signalement effectué.";
	}  else if($_POST['Signalement'] == "sujet"){
		$a = $donnee['signalement_sujet'] + 1;
		$req = $bdd->prepare('UPDATE td_jeux SET signalement_sujet = ? WHERE nom = ?');
		$req->execute(array($a, $jeux['nom']));
		echo "Signalement effectué.";
	}
}

?>
</div>
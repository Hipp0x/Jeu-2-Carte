<?php

//include 'fonction.php';
include 'database.php';
global $bdd;
$nom = $_POST['nom_jeux'];
$diff = $_POST['difficulte'];
$th = $_POST['theme'];


if(!empty($_POST['theme']) && !empty($_POST['nom_jeux']) && !empty($_POST['difficulte'])) {

	$nom = trim($_POST['nom_jeux']);

	if ($nom != "") {

	//verif si nom de jeu existe
		$req = $bdd->prepare('SELECT * FROM td_jeux WHERE nom = :nom AND theme = :theme');
		$req->execute(array('nom' => $nom, 'theme' => $th));
		$res = $req->fetch();

		if($res == null) {
			$n = $nom;
			$a = strlen($nom);
			$init = 0;
			while ($init < $a){
				if ($n[$init] == " ") {
					$n[$init] = "_";
				} else if($n[$init] == "+") {
					$n[$init] = "~";
				}
				$init++;
			}
			$req = $bdd->prepare('INSERT INTO td_jeux (nom, theme, createur, difficulte) VALUES(?, ?, ?, ?)');
			$req->execute(array($nom, $_POST['theme'],$_SESSION['pseudo'],$_POST['difficulte']));
			header('LOCATION: creer_les_cartes.php?nom='.$n);
		} else {
			echo "Le nom de jeu que tu as rentré est déjà pris. Merci d'en rentrer un autre.";
		}
	} else {
		echo "Rentre un nom correct !";
	}
} else {
	echo "Remplis tous les champs !";
}

?>
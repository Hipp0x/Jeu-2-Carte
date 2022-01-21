<?php

include 'database.php';
global $bdd;

if(!empty($_POST['question']) && !empty($_POST['reponse'])) {

	
	$nom_jeu = $n;
	$question = trim($_POST['question']);
	$reponse = trim($_POST['reponse']);

	if ($reponse != "" && $question != ""){

	//voir si question existe dans le jeu
		$q = $bdd->prepare('SELECT * FROM td_cartes WHERE nom_jeu = :nom_jeu AND question = :question');
		$q->execute(array('nom_jeu' => $nom_jeu, 'question' => $question));
		$res = $q->fetch();

		if($res == null){

			$aide = trim($_POST['aide']);
			if($_POST['aide'] == null || $aide == ""){
				$req = $bdd->prepare('INSERT INTO td_cartes (nom_jeu, question, reponse) VALUES(?, ?, ?)');
				$req->execute(array($nom_jeu, $question,$reponse));
				header('LOCATION: ajouter_des_cartes.php?jeu='.htmlspecialchars($_GET['jeu']));
			} else {
				$req = $bdd->prepare('INSERT INTO td_cartes (nom_jeu, question, reponse, aide) VALUES(?, ?, ?, ?)');
				$req->execute(array($nom_jeu, $question,$reponse,$aide));
				header('LOCATION: ajouter_des_cartes.php?jeu='.htmlspecialchars($_GET['jeu']));		
			}
		} else {
			echo "Cette question existe déjà dans ce jeu";
		}
	} else {
		echo "Remplis les champs correctement !";
	}
} else {
	echo "Remplis tous les champs !";
}

?>
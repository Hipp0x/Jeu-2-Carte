<?php

include 'database.php';
global $bdd;

if(isset($_POST['envoieadmin'])){
	if(!empty($_POST['pseudo'])){

		$pseudo = trim($_POST['pseudo']);
		if ($pseudo != ""){

		//verif si pseudo est dans la bdd
			$req= $bdd->prepare('SELECT * FROM td_utilisateurs WHERE pseudo = :pseudo');
			$req->execute(array('pseudo' => $pseudo));
			$res = $req->fetch();
			if ($res != null){
				if($res['admin'] == 0){
					if($_POST['droit'] == 1){
						$req = $bdd->prepare('UPDATE td_utilisateurs SET admin = 1 WHERE pseudo = :pseudo ');
						$req->execute(array('pseudo' => $pseudo));
						echo "Tu as fais passé ".$pseudo." en modérateur.";
					} else{
						$req = $bdd->prepare('UPDATE td_utilisateurs SET admin = 2 WHERE pseudo = :pseudo ');
						$req->execute(array('pseudo' => $pseudo));
						echo "Tu as fais passé ".$pseudo." en administrateur.";
					}
				} else if($res['admin'] == 1) {
					if($_POST['droit'] == 1){
						echo "L'utilisateur ".$pseudo." est déja un modérateur.";
					} else{
						$req = $bdd->prepare('UPDATE td_utilisateurs SET admin = 2 WHERE pseudo = :pseudo ');
						$req->execute(array('pseudo' => $pseudo));
						echo "Tu as fais passé ".$pseudo." en administrateur.";
					}
				} else {
					if($_POST['droit'] == 1){
						echo "L'utilisateur ".$pseudo." est un administrateur, tu ne peux le faire devenir un modérateur..";
					} else{
						echo "L'utilisateur ".$pseudo." est déjà un administrateur";
					}
				}
			} else {
				echo "Le pseudo rentré ne correspond à aucun utilisateur.";
			}
		} else {
			echo "Remplis le champ correctement !";
		}
	} else{
		echo "Remplis le champ !";
	}
}

if(isset($_POST['envoisuppadmin'])){
	if(!empty($_POST['pseudo'])){

		$pseudo = trim($_POST['pseudo']);
		if ($pseudo != "") {

		//verif si pseudo est dans la bdd
			$req= $bdd->prepare('SELECT * FROM td_utilisateurs WHERE pseudo = :pseudo');
			$req->execute(array('pseudo' => $pseudo));
			$res = $req->fetch();
			if ($res != null){
				if($res['admin'] != 0){
					$req = $bdd->prepare('UPDATE td_utilisateurs SET admin = 0 WHERE pseudo = :pseudo ');
					$req->execute(array('pseudo' => $pseudo));
					echo "L'utilisateur ".$pseudo." a perdu ses droits.";
				} else {
					echo "L'utilisateur n'a pas de droits.";
				}
			} else {
				echo "Le pseudo rentré ne correspond à aucun utilisateur.";
			}
		} else {
			echo "Remplis le champ correctement !";
		}
	} else{
		echo "Remplis le champ !";
	}
}

if(isset($_POST['envoieth'])){
	if(!empty($_POST['theme'])){

		$them = trim($_POST['theme']);
		if ($them != "") {

			$req= $bdd->prepare('SELECT * FROM td_themes WHERE nom = :nom');
			$req->execute(array('nom' => $them));
			$res = $req->fetch();
			if($res == null) {
				$req = $bdd->prepare('INSERT INTO td_themes (nom,couleur) VALUES(?,?)');
				$req->execute(array($them, $_POST['couleur']));
				echo "Thème ".$them." ajouté";
			} else {
				echo "Le thème ".$them." existe déjà.";
			}
		} else {
			echo "Remplis le champ correctement !";
		}
	} else{
		echo "Remplis le champ !";
	}
}

if(isset($_POST['envoiesuppth'])){
	if(!empty($_POST['theme'])){
		$them = trim($_POST['theme']);
		if ($them != "") {
			$req= $bdd->prepare('SELECT * FROM td_themes WHERE nom = :nom');
			$req->execute(array('nom' => $them));
			$res = $req->fetch();
			if($res != null) {
				$req = $bdd->prepare('SELECT * FROM td_jeux WHERE theme = :theme');
				$req->execute(array('theme' => $them));
				while ($res = $req->fetch()){
					$req0 = $bdd->prepare('DELETE FROM td_cartes WHERE nom_jeu = :nom_jeu');
					$req0->execute(array('nom_jeu' => $res['nom']));
				}
				$req1 = $bdd->prepare('DELETE FROM td_jeux WHERE theme = :theme');
				$req1->execute(array('theme' => $them));
				$req2 = $bdd->prepare('DELETE FROM td_themes WHERE nom = :nom');
				$req2->execute(array('nom' => $them));
				echo "Thème ".$them." supprimé.";
			} else {
				echo "Ce thème n'existe pas !";
			}
		} else {
			echo "Remplis le champ correctement !";
		}
	} else{
		echo "Remplis le champ !";
	}
}

if(isset($_POST['envoiesuppjeu'])){
	if(!empty($_POST['jeu'])){

		$jeu = trim($_POST['jeu']);
		if ($jeu != ""){
			$req= $bdd->prepare('SELECT * FROM td_jeux WHERE nom = :nom');
			$req->execute(array('nom' => $jeu));
			$res = $req->fetch();
			if($res != null) {
				$req0 = $bdd->prepare('DELETE FROM td_cartes WHERE nom_jeu = :nom_jeu');
				$req0->execute(array('nom_jeu' => $jeu));
				$req = $bdd->prepare('DELETE FROM td_jeux WHERE nom = :nom');
				$req->execute(array('nom' => $jeu));
				echo "Le jeu ".$jeu." a été supprimé !";
			} else {
				echo "Ce jeu n'existe pas !";
			}
		} else {
			echo "Remplis le champ correctement !";
		}
	} else{
		echo "Remplis le champ !";
	}
}

if(isset($_POST['envoiesupputili'])){
	if(!empty($_POST['pseudo'])){
		$pseudo = trim($_POST['pseudo']);
		if ($pseudo != ""){
			$req= $bdd->prepare('SELECT * FROM td_utilisateurs WHERE pseudo = :pseudo');
			$req->execute(array('pseudo' => $pseudo));
			$res = $req->fetch();
			if($res != null) {
				$req = $bdd->prepare('SELECT * FROM td_jeux WHERE createur = :createur');
				$req->execute(array('createur' => $pseudo));
				while ($res = $req->fetch()){
					$req0 = $bdd->prepare('DELETE FROM td_cartes WHERE nom_jeu = :nom_jeu');
					$req0->execute(array('nom_jeu' => $res['nom']));
				}
				$req1 = $bdd->prepare('DELETE FROM td_jeux WHERE createur = :createur');
				$req1->execute(array('createur' => $pseudo));
				$req2 = $bdd->prepare('DELETE FROM td_utilisateurs WHERE pseudo = :pseudo');
				$req2->execute(array('pseudo' => $pseudo));
				echo "Utilisateur ".$pseudo." supprimé";
			} else {
				echo "Cet utilisateur n'existe pas !";
			}
		} else {
			echo "Remplis le champ correctement !";
		}
	} else{
		echo "Remplis le champ !";
	}
}
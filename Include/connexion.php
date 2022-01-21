<?php
session_start();

if(!empty($_POST['pseudo']) && !empty($_POST['mdp'])) {

	include 'database.php';
	global $bdd;

	$req = $bdd->prepare('SELECT * FROM td_utilisateurs WHERE pseudo = :pseudo');
	$req->execute(array('pseudo' => $_POST['pseudo']));
	$result = $req->fetch();

	if($result == true){

		if (password_verify($_POST['mdp'], $result['mdp'])){
			$_SESSION['pseudo'] = $result['pseudo'];
			header('Location: page_accueil.php');

		} else {
			echo "Mauvais mot de passe !";
		}
	}else {

		echo "Utilisateur inexistant !";
	}
}else {
	echo "Remplis tous les champs !";
}
?>
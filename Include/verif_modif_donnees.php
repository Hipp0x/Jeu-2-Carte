<?php

include 'database.php';
global $bdd;

if (isset($_POST['confirmerpseudo'])){
	if (!empty($_POST['newpseudo'])){

		$req = $bdd->prepare('SELECT * FROM td_utilisateurs WHERE pseudo = :pseudo');
		$req->execute(array('pseudo' => $_POST['newpseudo']));
		$res = $req->fetch();

		if($res == null){
		    $req0 = $bdd->prepare('UPDATE td_jeux SET createur = :nvpseudo WHERE createur = :pseudo');
		    $req0->execute(array('nvpseudo' => $_POST['newpseudo'], 'pseudo' => $_SESSION['pseudo']));
			$req = $bdd->prepare('UPDATE td_utilisateurs SET pseudo = :nvpseudo WHERE pseudo = :pseudo ');
			$req->execute(array('nvpseudo' => $_POST['newpseudo'], 'pseudo' => $_SESSION['pseudo']));
			$_SESSION['pseudo'] = $_POST['newpseudo'];
			echo "Nouveau pseudo actualisé !";
		} else {
			echo "Ce pseudo est déjà pris.";
		}
	} else {
		echo "Remplis le champ !";
	}
}

if (isset($_POST['confirmermdp'])){
	if (!empty($_POST['mdp']) && !empty($_POST['newmdp']) && !empty($_POST['confnewmdp'])){

		if ($_POST['newmdp'] == $_POST['confnewmdp']){

			$req = $bdd->prepare('SELECT * FROM td_utilisateurs WHERE pseudo = :pseudo');
			$req->execute(array('pseudo' => $_SESSION['pseudo']));
			$res = $req->fetch();

			$verifmdpactu = password_verify($_POST['mdp'], $res['mdp']);

			if ($verifmdpactu == true){

				$newmdp = password_hash($_POST['newmdp'], PASSWORD_DEFAULT);

				$req = $bdd->prepare('UPDATE td_utilisateurs SET mdp = :mdp WHERE pseudo = :pseudo ');
				$req->execute(array('mdp' => $newmdp, 'pseudo' => $_SESSION['pseudo']));
				echo "Ton mot de passe a bien été modifié !";

			} else {
				echo "Le mot de passe rentré n'est pas votre mot de passe actuel.";
			}
		} else {
			echo "Tes nouveaux mots de passe sont différents !";
		}
	} else {
		echo "Remplis tous les champs !";
	}
}

if (isset($_POST['confirmermail'])){
	if (!empty($_POST['mail']) && !empty($_POST['newmail'])){

		function check_email_address($email) { 
			return (!preg_match( "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $email)) ? false : true; 
		} 

		if (check_email_address($_POST['newmail']) != false){

			$req = $bdd->prepare('SELECT * FROM td_utilisateurs WHERE pseudo = :pseudo');
			$req->execute(array('pseudo' => $_SESSION['pseudo']));
			$res = $req->fetch();

			if($res['mail'] == $_POST['mail']){
				$req = $bdd->prepare('UPDATE td_utilisateurs SET mail = :mail WHERE pseudo = :pseudo ');
				$req->execute(array('mail' => $_POST['newmail'], 'pseudo' => $_SESSION['pseudo']));
				echo "Ton mail a bien été modifié !";
			} else {
				echo "L'email ne correspond pas à ton mail actuellement. Merci de rentrer le bon mail.";
			}
		} else {
			echo "Renseigne un mail correct !";
		}
	} else {
		echo "Remplis tous les champs !";
	}
}
?>
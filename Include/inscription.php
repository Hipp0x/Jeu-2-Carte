<?php
session_start();

include 'Include/database.php';
global $bdd;



if(!empty($_POST['pseudo']) && !empty($_POST['prenom']) && !empty($_POST['mail']) && !empty($_POST['mdp']) && !empty($_POST['mdp2']) && !empty($_POST['age'])) {

	$pseudo = trim($_POST['pseudo']);
	$prenom = trim($_POST['prenom']);
	$mail = trim($_POST['mail']);
	$age = trim($_POST['age']);

	if($pseudo != "" && $prenom != "" && $age != "" && $mail != ""){

		if($pseudo != $prenom) {

			//verif si pseudo dans la bdd
			$req = $bdd->prepare('SELECT * FROM td_utilisateurs WHERE pseudo = :pseudo');
			$req->execute(array('pseudo' => $pseudo));
			$res = $req->fetch();
			if ($res == null) {

				//verif si email deja utilisé
				$req = $bdd->prepare('SELECT * FROM td_utilisateurs WHERE mail = :mail');
				$req->execute(array('mail' => $mail));
				$res = $req->fetch();
				if($res == null){

					function check_email_address($email) { 
						return (!preg_match( "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $email)) ? false : true; 
					} 

					if (check_email_address($mail) != false){

						if(is_numeric($age)) {

							if($_POST['mdp'] == $_POST['mdp2']) {
								$mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
								$req = $bdd->prepare('INSERT INTO td_utilisateurs (pseudo, prenom, mail, mdp, age) VALUES(?, ?, ?, ?, ?)');
								$req->execute(array($pseudo, $prenom,$mail,$mdp,$age));
								$_SESSION['pseudo'] = $pseudo;
								header('Location: page_compte.php');
							} else {
								echo "Mot de passe incorrect !";
							}
						} else{
							echo "Rentrez un âge correct !";
						}
					} else {
						echo "Renseignez un mail correct.";
					}
				} else {
					echo "Email déjà utilisé !";
				}
			} else {
				echo "Ce pseudo est déjà pris !";
			}
		}else {
			echo "Ton pseudo et ton prénom doivent être différents !";
		}
	} else {
		echo "Remplis les champs correctement !";
	}
} else {
	echo "Remplis tous les champs !";
}

?>
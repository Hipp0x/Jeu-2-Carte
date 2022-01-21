<?php

include 'database.php';
global $bdd;



if (isset($_POST['modiftitre'])){

	$titre = trim($_POST['nvtitre']);

	if ($titre != "") {

		$req = $bdd->prepare('SELECT * FROM td_jeux WHERE nom = ?');
		$req->execute(array($titre));
		$res = $req->fetch();
		if ($res == null){
			$req0 = $bdd->prepare('UPDATE td_cartes SET nom_jeu = ? WHERE nom_jeu = ? ');
			$req0->execute(array($titre,$n ));
			$req = $bdd->prepare('UPDATE td_jeux SET nom = ? WHERE nom = ? ');
			$req->execute(array($titre,$n ));
			$bis = $titre;
			$a = strlen($titre);
			$init = 0;
			while ($init < $a){
				if ($bis[$init] == " ") {
					$bis[$init] = "_";
				} else if ($bis[$init] == "+"){
					$bis[$init] = "~";
				}
				$init++;
			} 
			header('LOCATION: modifier_le_jeu.php?jeu='.$bis);
		} else {
			echo "Ce titre de jeu est déjà pris.";
		}
	} else {
		echo "Indiquez un titre correct !";
	}
}
else {

	if(!empty($_POST['ques']) || !empty($_POST['rep']) || !empty($_POST['aide'])) {

		$question = trim($_POST['ques']);
		$reponse = trim($_POST['rep']);
		$aide = trim($_POST['aide']);
		
		if(!empty($_POST['ques']) && $question != "" ){

			//verif si question n'existe pas déjà
			$verif = $bdd->prepare('SELECT * FROM td_cartes WHERE question = :question AND nom_jeu = :nom_jeu');
			$verif->execute(array('question' => $question, 'nom_jeu' => $n));
			$donnee = $verif->fetch();
			if($donnee == null){

				if (!empty($_POST['rep']) && $reponse != "") {

					if (!empty($_POST['aide']) && $aide != "") {
						$req = $bdd->prepare('UPDATE td_cartes SET question = ?, reponse = ?, aide = ?, signalement_faux = ?, signalement_inappro = ? WHERE nom_jeu = ?  AND question = ?');
						$req->execute(array($question, $reponse, $aide, 0, 0, $n, $q));
					} else {
						$req = $bdd->prepare('UPDATE td_cartes SET question = ?, reponse = ?, signalement_faux = ?, signalement_inappro = ? WHERE nom_jeu = ?  AND question = ?');
						$req->execute(array($question, $reponse, 0, 0, $n, $q));
					}
				} else if (!empty($_POST['aide']) && $aide != "") {
					$req = $bdd->prepare('UPDATE td_cartes SET question = ?, aide = ?, signalement_faux = ?, signalement_inappro = ? WHERE nom_jeu = ?  AND question = ?');
					$req->execute(array($question, $aide, 0, 0, $n, $q));
				} else {
					$req = $bdd->prepare('UPDATE td_cartes SET question = ?, signalement_faux = ?, signalement_inappro = ? WHERE nom_jeu = ?  AND question = ?');
					$req->execute(array($question, 0, 0, $n, $q));
				}
				$q2 = $question;
				$a = strlen($question);
				$init = 0;
				while ($init < $a){
					if ($q2[$init] == " ") {
						$q2[$init] = "_";
					} else if($q2[$init] == "+") {
						$q2[$init] = "~";
					}
					$init++;
				}
				header('LOCATION: modifier_la_carte.php?jeu='.htmlspecialchars($_GET['jeu']).'&question='.$q2);
			} else {
				echo "La question existe déjà dans ton jeu !";
			}			
		} else if (!empty($_POST['rep']) && $reponse != "" ){
			if (!empty($_POST['aide']) && $aide != "") {
				$req = $bdd->prepare('UPDATE td_cartes SET  reponse = ?, aide = ?, signalement_faux = ?, signalement_inappro = ? WHERE nom_jeu = ?  AND question = ?');
				$req->execute(array( $reponse, $aide, 0, 0, $n, $q));
			} else {
				$req = $bdd->prepare('UPDATE td_cartes SET reponse = ?, signalement_faux = ?, signalement_inappro = ? WHERE nom_jeu = ?  AND question = ?');
				$req->execute(array($reponse, 0, 0, $n, $q));
			}
			header('LOCATION: modifier_la_carte.php?jeu='.htmlspecialchars($_GET['jeu']).'&question='.htmlspecialchars($_GET['question']));
		} else if (!empty($_POST['aide']) && $aide != "" ) {
			$req = $bdd->prepare('UPDATE td_cartes SET aide = ? WHERE nom_jeu = ?  AND question = ?');
			$req->execute(array($aide, $n, $q));
			header('LOCATION: modifier_la_carte.php?jeu='.htmlspecialchars($_GET['jeu']).'&question='.htmlspecialchars($_GET['question']));
		} else {
			echo "Remplis les champs correctement !";
		}
	} else {
		echo "Remplis au moins un champ !";
	}
}

?>
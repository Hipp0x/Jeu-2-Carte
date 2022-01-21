<?php

include 'database.php';
global $bdd;

$recup = $bdd->prepare('SELECT * FROM td_jeux WHERE nom = :nom');
$recup->execute(array('nom' => $n));
$donnee = $recup->fetch();

if($_POST['note'] == 6 || $_POST['note'] == 1 || $_POST['note'] == 2 || $_POST['note'] == 3 || $_POST['note'] == 4 || $_POST['note'] == 5) {

	if($_POST['note']==1){
		$voteurs = $donnee['nb_voteurs0'] + 1;
		$req = $bdd->prepare('UPDATE td_jeux SET nb_voteurs0 = :nb_voteurs0 WHERE nom = :nom');
		$req->execute(array('nb_voteurs0' => $voteurs, 'nom' => $n));	
	} else if($_POST['note']==2){
		$voteurs = $donnee['nb_voteurs1'] + 1;
		$req = $bdd->prepare('UPDATE td_jeux SET nb_voteurs1 = :nb_voteurs1 WHERE nom = :nom');
		$req->execute(array('nb_voteurs1' => $voteurs, 'nom' => $n));			
	} else if($_POST['note']==3){
		$voteurs = $donnee['nb_voteurs2'] + 1;
		$req = $bdd->prepare('UPDATE td_jeux SET nb_voteurs2 = :nb_voteurs2 WHERE nom = :nom');
		$req->execute(array('nb_voteurs2' => $voteurs, 'nom' => $n));	
	} else if($_POST['note']==4){
		$voteurs = $donnee['nb_voteurs3'] + 1;
		$req = $bdd->prepare('UPDATE td_jeux SET nb_voteurs3 = :nb_voteurs3 WHERE nom = :nom');
		$req->execute(array('nb_voteurs3' => $voteurs, 'nom' => $n));	
	} else if($_POST['note']==5){
		$voteurs = $donnee['nb_voteurs4'] + 1;
		$req = $bdd->prepare('UPDATE td_jeux SET nb_voteurs4 = :nb_voteurs4 WHERE nom = :nom');
		$req->execute(array('nb_voteurs4' => $voteurs, 'nom' => $n));	
	} else if($_POST['note'] == 6){
		$voteurs = $donnee['nb_voteurs5'] + 1;
		$req = $bdd->prepare('UPDATE td_jeux SET nb_voteurs5 = :nb_voteurs5 WHERE nom = :nom');
		$req->execute(array('nb_voteurs5' => $voteurs, 'nom' => $n));	
	}

	if($donnee['note'] == null){
		$notefinal = $_POST['note']-1;
	} else {
		$recup = $bdd->prepare('SELECT * FROM td_jeux WHERE nom = :nom');
		$recup->execute(array('nom' => $n));
		$donnee = $recup->fetch();

		$nbtotalvoteurs = $donnee['nb_voteurs0']+$donnee['nb_voteurs1']+$donnee['nb_voteurs2']+$donnee['nb_voteurs3']+$donnee['nb_voteurs4']+$donnee['nb_voteurs5'];
		$notefinal = ($donnee['nb_voteurs0']*0 + $donnee['nb_voteurs1']*1 + $donnee['nb_voteurs2']*2 + $donnee['nb_voteurs3']*3 + $donnee['nb_voteurs4']*4 + $donnee['nb_voteurs5']*5) / $nbtotalvoteurs;
	}

	$req = $bdd->prepare('UPDATE td_jeux SET note = :note WHERE nom = :nom');
	$req->execute(array('note' => $notefinal, 'nom' => $n));
	header('LOCATION: jeux_description.php?nom='.htmlspecialchars($_GET['nom']));
}


?>
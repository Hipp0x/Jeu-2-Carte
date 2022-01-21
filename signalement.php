<?php session_start(); ?>

<!DOCTYPE html>

<html lang="fr">


<head>

	<title>Signalements</title>
	<link rel="stylesheet" href="styles/signalement.css">
	<link rel="stylesheet" href="styles/Header.css">	
	<meta charset="utf-8">

</head>



<body>

	<header>
		<?php include 'Include/header.php'; ?>
	</header>

	<h1>Vous pouvez ici voir tous les signalements</h1>

	<div class="bloc">

		<div class="cartes">
			<a href="voir_les_signalements.php?categorie=cartes"><p class="blck">Voir les signalement des cartes</p></a>
		</div>
		<div class="jeux">		
			<a href="voir_les_signalements.php?categorie=jeux"><p class="blck">Voir les signalement des jeux</p></a>
		</div>

	</div>


</body>

</html>

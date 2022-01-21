<?php session_start(); ?>

<!DOCTYPE html>

<html lang="fr">


<head>

	<title>Signalements</title>
	<link rel="stylesheet" href="styles/affiche_signalement.css">
	<link rel="stylesheet" href="styles/Header.css">	
	<meta charset="utf-8">

</head>



<body>

	<header>
		<?php include 'Include/header.php'; ?>
	</header>

	<h1>Vous avez accès à tous les signalements sur les <?php echo $_GET['categorie'];?></h1>

	<?php
	include 'Include/afficher_signalement.php';
	?>

	<div class="button">
		<a href="signalement.php"><p class="blck">Retour aux signalements</p></a>
	</div>


</body>
</html>

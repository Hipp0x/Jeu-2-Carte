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

	<h1>Vous avez accès à tous les signalements sur les <?php echo $_GET['categorie'];?></h1>
	<div class="all">
		<div class="bloc">
			<?php if($_GET['categorie'] == "cartes"){
				?>


				<div class="cartes">
					<a href="afficher_les_signalements.php?categorie=cartes&amp;cible=faux"><p class="blck">Voir les cartes fausses</p></a>
				</div>
				<div class="cartes">
					<a href="afficher_les_signalements.php?categorie=jeux&amp;cible=contenu"><p class="blck">Voir les cartes jugées inappropriées</p></a>
				</div>

				<?php
			} else {
				?>

				<div class="bloc">
					<div class="jeux">
						<a href="afficher_les_signalements.php?categorie=jeux&amp;cible=theme"><p class="blck">Voir les jeux mals placés</p></a>
					</div>
					<div class="jeux">
						<a href="afficher_les_signalements.php?categorie=jeux&amp;cible=titre"><p class="blck">Voir les jeux ayant un titre non approprié</p></a>
					</div>
					<div class="jeux">
						<a href="afficher_les_signalements.php?categorie=jeux&amp;cible=sujet"><p class="blck">Voir les jeux possédant un sujet inadapté</p></a>
					</div>
				</div>
				<?php
			}
			?>

		</div>

		<div class="button">
			<a href="signalement.php"><p class="blck">Retour aux signalements</p></a>
		</div>

	</div>

</body>
</html>
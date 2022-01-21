<?php session_start(); ?>
<!DOCTYPE html>

<html lang="fr">


<head>

	<title>En Jeu</title>
	<link rel="stylesheet" href="styles/cartes.css">
	<link rel="stylesheet" href="styles/Header.css">	
	<meta charset="utf-8">

</head>



<body>

	<?php include 'Include/database.php'; 
	global $bdd; 
	?>

	<header>
		<?php include 'Include/header.php'; ?>
	</header>

	<?php 
	$n = htmlspecialchars($_GET['nom']);
	$a = strlen(htmlspecialchars($_GET['nom']));
	$init = 0;
	while ($init < $a){
		if ($n[$init] == "_") {
			$n[$init] = " ";
		}
		$init++;
	}
	$nomjeu = $n;	
	$requ = $bdd->prepare('SELECT * FROM td_jeux WHERE nom = :nom');
	$requ->execute(array('nom' => $nomjeu));
	$jeu = $requ->fetch();
	$requ2 = $bdd -> prepare('SELECT * FROM td_themes WHERE nom = :nom_theme');
	$requ2->execute(array('nom_theme' => $jeu['theme']));
	$coul = $requ2 -> fetch();
	$numcarte = htmlspecialchars($_GET['carte']);
	if($numcarte == 1){
		$req = $bdd->prepare('UPDATE td_jeux SET nb_utilisation = nb_utilisation+1 WHERE nom = :nom ');
		$req->execute(array('nom' => $n)); 
	}

	$req = $bdd->prepare('SELECT * FROM (
		SELECT ROW_NUMBER() OVER (Order by id_carte) AS num_relatif, id_carte, question, reponse, aide
		FROM td_cartes WHERE nom_jeu = :nom_jeu
	) R WHERE num_relatif = :num_relatif');
	$req->execute(array('nom_jeu' => $n,'num_relatif' => $numcarte));
	$cartes = $req->fetch();

	if($cartes != null){

		?>
		<div class="flip-card">
			<div class="flip-card-inner">
				<div class="flip-card-front" style="background-color: <?php echo $coul['couleur']; ?>;">
					<h3>Question</h3>
					<p class="capit"><?php echo $cartes['question']; ?></p>
				</div>
				<div class="flip-card-back">
					<h3>Réponse</h3>
					<p class="capit"><?php echo $cartes['reponse']; ?></p>
				</div>
			</div>
		</div>
		<div id="btons">

			<form>
				<input type="button" value="Carte Suivante" onclick="self.location.href='jeu.php?nom=<?php echo htmlspecialchars($_GET['nom']) ;?>&amp;carte=<?php $numcarte++;echo $numcarte; ?>'" class="blck" style="background-color: <?php echo $coul['couleur']; ?>; border:2px solid <?php echo $coul['couleur']; ?>;;"/>
			</form>

			<form method="post">
				<input type="submit" name="aide" value="Aide" class="blck" id="helpbtn">
			</form>

		</div>
		<div id="help" style="background-color: <?php echo $coul['couleur']; ?>;">
			<?php
			if(isset($_POST['aide'])){
				if($cartes['aide'] != null){
					echo $cartes['aide'];
				} else {
					echo "Il n'y a pas d'aide disponible pour cette question.";
				}
			}
			?>
		</div>


		<div class="signalement">
			<form method="post">
				<div class="custom-select-sign">
					<select name="Signalement">
						<option selected> Signaler </option>
						<option value="inapro"> Contenu inapproprié </option>
						<option value="faux"> Réponse fausse </option>
					</select>
				</div>
				<div class="butt">
					<input class="button" type="submit" name="signal_carte" value="Valider mon signalement" >
				</div>
			</form>
		</div>

		<?php
		if(isset($_POST['signal_carte'])){
			include 'Include/signalement.php';
		}
	} else {
		?>
		<div class="end">
			<h2 style="background-color: <?php echo $coul['couleur']; ?>;">Bravo, Vous avez terminé le jeu !</h2>
			<div id="par2">
				<a href="page_jeux_principale"><p>Retourner aux jeux</p></a>
				<a href="jeux_description.php?nom=<?php echo $n; ?>"><p>Retourner à la description du jeu</p></a>
			</div>
		</div>
		<?php 
	}
	?>

</body>

</html>

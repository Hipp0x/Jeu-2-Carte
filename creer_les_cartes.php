<?php session_start(); ?>
<!DOCTYPE html>

<html lang="fr">


<head>

	<title>Création d'un nouveau jeu</title>
	<link rel="stylesheet" href="styles/creer_cartes.css">
	<link rel="stylesheet" href="styles/Header.css">
	<meta charset="utf-8">

</head>



<body>

	<?php include 'Include/database.php'; global $bdd;
	$n = htmlspecialchars($_GET['nom']);
	$a = strlen(htmlspecialchars($_GET['nom']));
	$init = 0;
	while ($init < $a){
		if ($n[$init] == "_") {
			$n[$init] = " ";
		} else if ($n[$init] == "~") {
			$n[$init] = "+";
		}
		$init++;
	}
	$req2 = $bdd->prepare('SELECT COUNT(*) c FROM td_cartes WHERE nom_jeu = :nom_jeu');
	$req2->execute(array('nom_jeu' => $n ));
	$cartescrees = $req2->fetch();
	if($cartescrees['c'] == 6){
		$req0 = $bdd->prepare('UPDATE td_jeux SET online = ? WHERE nom = ?');
		$req0->execute(array(1 , $n));
	}
	?>

	<header>
		<?php include 'Include/header.php'; ?>
	</header>

	<?php
	if($cartescrees['c'] < 15) {
		?>

		<h1>Bien joué <?php echo $_SESSION['pseudo'] ?>, il est temps de créer les cartes de ton jeu !</h1>

		<div class="all">

			<div class="info">
				<p>Tu as créé <?php echo $cartescrees['c']; ?> cartes. Tu peux encore en créer <?php $reste = 15 - $cartescrees['c']; echo $reste;?>.<br>Tu dois créer un minimun de 6 cartes pour que ton jeu soit en ligne.</p>
			</div>

			<form method="post">
				<div class="bloc">
					<div class="txt">
						<label class="lab" for="ques">Question</label>
						<label class="lab" for="rep">Réponse</label>
						<label class="lab" for="aide">Aide (facultative)</label>
					</div>
					<div class="balise">
						<input class="inpu" id="ques" type="text" name="question" placeholder="Question" >
						<input class="inpu" id="rep" type="text" name="reponse" placeholder="Réponse" >
						<input class="inpu" id="aide" type="text" name="aide" placeholder="Aide" >
					</div>
				</div>
				<p>Si la carte mémoire te convient alors clique sur Confirmer !</p>
				<div class="button">
					<input class="butt" type="submit" name="envoie" value="Confirmer"/>
					<?php 
					if($cartescrees['c'] >= 6) {
						?>
						<form method="post">
							<input class="butt" type="submit" name="fin" value="Fin"/>
						</form>
						<?php
					}
					?>
				</div>
			</form>

			<div class="mess">
				<?php
				if(isset($_POST['envoie'])){
					include 'Include/verification_cartes.php';
				}
				?>
			</div>
			<?php 
			if(isset($_POST['fin'])){
				header('LOCATION: jeux_description.php?nom='.htmlspecialchars($_GET['nom']));
			}
			?>
		</div>
		<?php
	} else {
		?>
		<h1>Bien joué <?php echo $_SESSION['pseudo'] ?>, tu as fini de créer ton jeu!</h1>
		<div class="all">
			<div class="para">
				<p>Vous avez créer le nombre de cartes maximun (soit 15).
				Redirigez vous vers l'accueil ou vers la page de votre jeu !";</p>
			</div>
			<br>
			<div class="buts">
				<a href="jeux_description.php?nom=<?php echo htmlspecialchars($_GET['nom']); ?>">Votre jeu</a>
				<a href="page_accueil.php">Accueil</a>
			</div>
		</div>	
		<?php
	} ?>


</body>

</html>
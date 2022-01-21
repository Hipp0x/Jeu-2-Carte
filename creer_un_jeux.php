<?php session_start(); ?>
<!DOCTYPE html>

<html lang="fr">


<head>

	<title>Création d'un nouveau jeu</title>
	<link rel="stylesheet" href="styles/creer_jeu.css">
	<link rel="stylesheet" href="styles/Header.css">
	<meta charset="utf-8">

</head>



<body>

	<?php include 'Include/database.php'; global $bdd; ?>

	<header>
		<?php include 'Include/header.php'; ?>
	</header>

	<h1>Bienvenue <?php echo $_SESSION['pseudo'] ?>, tu vas créer un nouveau jeu !</h1>

	<div class="all">

		<form method="post">
			<div class="bloc">
				<div class="txt">
					<label class="lab" for="name">Nom du jeu</label>
					<label class="lab" for="th">Thème du jeu</label>
					<label class="lab" for="diff">Difficulté du jeu</label>
				</div>
				<div class="balise">
					<input class="inpu" id="name" type="text" name="nom_jeux" placeholder="Nom du jeu" >
					<div class="custom-select-sign">
						<select class="sel" id="th" name="theme">
							<?php 
							$q = $bdd->prepare('SELECT * FROM td_themes');
							$q->execute();
							while($themes = $q->fetch()){
								?>
								<option ><?php echo $themes['nom']; ?></option> 
								<?php 
							} 
							?>
						</select>
					</div>
					<div class="custom-select-sign">
						<select class="sel" id="diff"  name="difficulte">
							<option value="1" selected> 1 </option>
							<option value="2"> 2 </option>
							<option value="3"> 3 </option>
						</select>
					</div>
				</div>
			</div>

			<div class="info">
				<p>Si ces informations te conviennes alors clique sur le bouton !</p>
			</div>
			<div class="button">
				<input class="butt" type="submit" name="envoie" value="Confirmer"/>
			</div>
		</form>

		<div class="mess">
			<?php
			if(isset($_POST['envoie'])){

				$_SESSION['nom_jeux_cree'] = $_POST['nom_jeux'];
				include 'Include/verification_jeux.php';
			}
			?>
		</div>
	</div>

</body>

</html>
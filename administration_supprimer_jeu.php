<?php session_start();?>

<!DOCTYPE html>

<html lang="fr">


<head>

	<title>Administration</title>
	<link rel="stylesheet" href="styles/Admin.css">
	<link rel="stylesheet" href="styles/Header.css">
	<meta charset="utf-8">

</head>


<body>

	<header>
		<?php include 'Include/header.php'; ?>
	</header>

	<div class="page" id="page">
		<h1>Bienvenue <?php echo $_SESSION['pseudo'] ?></h1>

		<div class="important">
			<p>Attention, toute supression est définitive, vous ne pourrez plus revenir en arrière.<br>Soyez sur de ce que vous faîtes !</p>
		</div>

		<?php
		$req = $bdd->prepare('SELECT * FROM td_utilisateurs WHERE pseudo = :pseudo');
		$req->execute(array('pseudo' => $_SESSION['pseudo']));
		$res = $req->fetch();
		?>

		<div class="para3">

			<h3 id="jeu">Supprimer un jeu</h3>

			<p>Veuillez avoir une raison valable à la suppression de ce jeu.<br>Merci d'avoir auparavant prévenu le créateur pour qu'il puisse modifier son jeu.<br>De même, la suppression de l'utilisateur peut être envisageable.</p>

			<form method="post">
				<label class="lab" for="jeu2">Indiquez le nom du jeu à supprimer</label>
				<input class="inpu" id="jeu2" type="text" name="jeu" placeholder="jeu" >
				<br>
				<div class="butt">
					<input class="button" type="submit" name="envoiesuppjeu" value="Confirmer"/>
				</div>
			</form>

			<div class="mess">
				<?php
				if(isset($_POST['envoiesuppjeu'])){
					include 'Include/modif_administration.php';
				}
				?>
			</div>
		</div>
	</div>
	
</body>


</html>

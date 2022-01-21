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

		<div class="para4">

			<h3 id="utilisateur">Supprimer un utilisateur</h3>

			<p>Veuillez avoir une raison valable à la suppression qui va suivre.<br>Merci d'avoir prévenu l'utilisateur auparavant plusieurs fois.<br>Les jeux de cet utilisateur seront également supprimés.</p>

			<form method="post">
				<label class="lab" for="pseu">Pseudo de l'utilisateur</label>
				<input class="inpu" id="pseu" type="text" name="pseudo" placeholder="joueur123" >
				<br>
				<div class="butt">
					<input class="button" type="submit" name="envoiesupputili" value="Confirmer"/>
				</div>
			</form>

			<div class="mess">
				<?php
				if(isset($_POST['envoiesupputili'])){
					include 'Include/modif_administration.php';
				}
				?>
			</div>
		</div>

	</div>

</body>


</html>

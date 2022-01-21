<!DOCTYPE html>

<html lang="fr">


<head>

	<title>Connexion</title>
	<link rel="stylesheet" href="styles/connexion.css">
	<link rel="stylesheet" href="styles/Header.css">	
	<meta charset="utf-8">

</head>


<body>

	<header>
		<?php include 'Include/header.php'; ?>
	</header>

	<div class="principale">

		<form method="post">

			<h1>Connecte toi !</h1>

			<input class="sign" type="text" name="pseudo" placeholder=" Pseudo " required>
			<br>
			<input class="sign" type="password" name="mdp" placeholder=" Mot de passe " required />		
			<br>

			<div class="erreur">
				<?php
				if(isset($_POST['envoie'])){
					include 'Include/connexion.php';
				}
				?>
			</div>

			<input class="button" type="submit" name="envoie" value="Connexion"/>
		</form>
		

	</div>

</body>


</html>

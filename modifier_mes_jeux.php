<?php session_start(); ?>
<!DOCTYPE html>

<html lang="fr">


<head>

	<title>Mes Jeux</title>
	<link rel="stylesheet" href="styles/modif_jeux.css">
	<link rel="stylesheet" href="styles/Header.css">
	<meta charset="utf-8">

</head>



<body>

	<header>
		<?php 
		include 'Include/header.php'; 
		?>
	</header>

	<h1>Voici tous les jeux que tu peux modifier !</h1>


	<div class="all">
		<?php
		include 'Include/database.php';
		global $bdd;
		$q = $bdd->prepare('SELECT * FROM td_jeux WHERE createur = :createur ORDER BY nom ASC');
		$q->execute(array('createur' => $_SESSION['pseudo']));
		while ($jeux = $q->fetch()){
			$req = $bdd->prepare('SELECT * FROM td_themes WHERE nom = :nom');
			$req->execute(array('nom' => $jeux['theme']));
			$color = $req->fetch();
			?>

			<div class="bloc">
				<div class="pres">
					<p style="background-color: <?php echo $color['couleur']; ?>;"><?php echo $jeux['nom']; ?></p>
				</div>

				<div class="button">
					<?php
					$n = $jeux['nom'];
					$a = strlen($jeux['nom']);
					$init = 0;
					while ($init < $a){
						if ($n[$init] == " ") {
							$n[$init] = "_";
						} else if($n[$init] == "+") {
							$n[$init] = "~";
						}
						$init++;
					}
					?>
					<a class="Jeu" href="modifier_le_jeu.php?jeu=<?php echo $n;?>"><p class="blck">Modifier</p></a>
					<a class="Jeu" href="supprimer_le_jeu.php?jeu=<?php echo $n;?>"><p class="blck">Supprimer</p></a>
				</div>
			</div>    
			<?php
		}
		?>
	</div>
	
</body>


</html>

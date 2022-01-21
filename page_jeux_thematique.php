<?php session_start(); ?>
<!DOCTYPE html>

<html lang="fr">


<head>

	<title>Les Jeux</title>
	<link rel="stylesheet" href="styles/page_jeux.css">
	<link rel="stylesheet" href="styles/Header.css">	
	<meta charset="utf-8">


</head>



<body>

	<header>
		<?php include 'Include/header.php'; ?>
	</header>

	<h1>Choisis un jeu</h1>

	<?php if(isset($_SESSION['pseudo'])){ ?> 
		<div class="button">
			<a href="creer_un_jeux.php"><p class="block">Créer un jeu</p></a>
		</div>
		<?php
	}?>


	<div class="jeu">
		<?php
		include 'Include/database.php';
		global $bdd;

		$req = $bdd->prepare('SELECT * FROM td_themes WHERE nom = :nom ORDER BY nom ASC');
		$req->execute(array( 'nom' => htmlspecialchars($_GET['nom'])));
		$coul = $req->fetch();

		$q = $bdd->prepare('SELECT * FROM td_jeux WHERE theme = ? AND online = ?');
		$q->execute(array(htmlspecialchars($_GET['nom']),1));
		while ($jeux = $q->fetch()){
			?>
			<div class="carre">

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

				<a href="jeux_description.php?nom=<?php echo $n;?>">
					<p class="blck" style="height: 200px; width: 200px; background-color: <?php echo $coul['couleur'];?>; text-align: center; padding-top: 50px; border-radius: 20px;" >
						<?php echo $jeux['nom'];?>
						<br><br>
						<?php 
						if ($jeux['note'] != null) {
							echo "Note : ".$jeux['note'];
							?>
							/5
							<?php 
						} else {
							echo "Pas de Note";
						}
						?>
					</p>
				</a>

			</div>
			<?php
		}
		?>

	</div>	
</body>

</html>
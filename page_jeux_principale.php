<?php session_start();?>

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

	<h1>Clique sur un thème</h1>

	<?php if(isset($_SESSION['pseudo'])){ ?> 
		<div class="button">
			<a href="creer_un_jeux.php"><p class="block">Créer un jeu</p></a>
		</div>
		<?php
	} ?>

	<div class=th>	
		<?php
		include 'Include/database.php';
		global $bdd;
		$q = $bdd->prepare('SELECT * FROM td_themes ORDER BY nom ASC');
		$q->execute();
		while ($th = $q->fetch()){
			$req2 = $bdd->prepare('SELECT COUNT(*) c FROM td_jeux WHERE theme = :theme AND online = :online');
			$req2->execute(array('theme' => $th['nom'], 'online' => 1 ));
			$jeux = $req2->fetch();
			if($jeux['c'] > 0) {
				?>
				<div class="carre" >
					<?php
					$n = $th['nom'];
					$a = strlen($th['nom']);
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
					<a href="page_jeux_thematique.php?nom=<?php echo $n?>" >
						<p class="blck" style="background: <?php echo $th['couleur'];?>;" ><?php echo $th['nom'];?></p>
					</a>
				</div>

				<?php
			}
		}
		?>
	</div>


</body>
</html>

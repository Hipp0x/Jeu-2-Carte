<?php session_start(); ?>
<!DOCTYPE html>

<html lang="fr">


<head>

	<title>Description du jeu</title>
	<link rel="stylesheet" href="styles/description_jeu.css">
	<link rel="stylesheet" href="styles/Header.css">
	<meta charset="utf-8">

</head>



<body>

	<?php include 'Include/database.php'; global $bdd; ?>

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
		} else if($n[$init] == "~") {
			$n[$init] = "+";
		}
		$init++;
	}
	$q = $bdd->prepare('SELECT * FROM td_jeux WHERE nom = :nom');
	$q->execute(array('nom' => $n));
	$jeux = $q->fetch();

	$req = $bdd->prepare('SELECT couleur FROM td_themes WHERE nom = ?');
	$req->execute(array($jeux['theme']));
	$res = $req->fetch();
	$colo = $res['couleur'];
	?>

	<h1>Jeu : <?php echo $n; ?></h1>

	<div class="bloc">
		<div class="bloc1">

			<div class="description">

				<p>Thème : <?php echo $jeux['theme']?></p>
				<p>Difficulté : <?php echo $jeux['difficulte']?>/3</p>			
				<?php if($jeux['note'] == null){
					?>
					<p>Ce jeux n'a pas encore été noté par les utilisateurs</p>
					<?php
				} else {
					?>
					<p>Note : <?php echo $jeux['note']?>/5  (<?php 
						$nbtotalvoteurs = $jeux['nb_voteurs0']+$jeux['nb_voteurs1']+$jeux['nb_voteurs2']+$jeux['nb_voteurs3']+$jeux['nb_voteurs4']+$jeux['nb_voteurs5'];
						echo $nbtotalvoteurs;?> votes)</p>
					<?php
				}
				?>	
				<p>Joué <?php echo $jeux['nb_utilisation'] ?> fois</p>
			</div>

			<div class="jouer">
				<a href="jeu.php?nom=<?php echo htmlspecialchars($_GET['nom']) ?>&amp;carte=1">
					<p class="blck" style="background-color: <?php echo $colo; ?>">Jouer
					</p>
				</a>

			</div>

		</div>
	</div>

	<div class="bloc2">

		<div class="note">
			<?php 
			if (isset($_SESSION['pseudo'])){
				?>
				<form method="post">
					<div class="custom-select-not">
						<select id="not" name="note">
							<option selected>Noter</option>
							<option value="1"> 0 </option>
							<option value="2"> 1 </option>
							<option value="3"> 2 </option>
							<option value="4"> 3 </option>
							<option value="5"> 4 </option>
							<option value="6"> 5 </option>
						</select>
					</div>
					<div class="butt">
						<input class="button" type="submit" name="conf" value=" Confirmer">
					</div>
				</form>	
				<?php
			}

			if(isset($_POST['conf'])){
				include 'Include/note.php';
			}
			?>
		</div>

		<div class="signalement">
			<form method="post">
				<div class="custom-select-sign">
					<select name="Signalement">
						<option selected> Signaler </option>
						<option value="titre"> Titre inapproprié </option>
						<option value="theme"> Mauvais emplacement </option>
						<option value="sujet"> Sujet inapproprié </option>
					</select>
				</div>
				<div class="butt">
					<input class="button" type="submit" name="signal_jeu" value="Valider">
				</div>	
			</form>	
			<?php
			if(isset($_POST['signal_jeu'])){
				include 'Include/signalement.php';
			}
			?>
		</div>

	</div>

</body>

</html>
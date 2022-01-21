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
		$admn = $req->fetch();
		?>

		<div class="para2">

			<div class="souspar2a">

				<h3 id="theme">Ajouter un thème</h3>

				<form method="post">

					<div class="centre-sous">
						<div class="txt">
							<label class="lab" for="th">Nom du nouveau thème</label>
							<label class="lab" for="colo">Couleur du thème</label>
						</div>
						<div class="balise">
							<input class="inpu" id="th" type="text" name="theme" placeholder="Nom du theme" >
							<div class="custom-select-admn">
								<select class="sele" id="colo" name="couleur">
									<option value="#FFD700"> Jaune </option>
									<option value="#FF8C00"> Orange </option>
									<option value="#FF1A1A"> Rouge </option>
									<option value="#FA8072"> Rose </option>
									<option value="magenta"> Magenta </option>
									<option value="#C266FF"> Violet </option>
									<option value="#4D94FF"> Bleu Foncé </option>
									<option value="#6CC3F9"> Bleu Clair </option>
									<option value="cyan"> Cyan </option>
									<option value="#4DFF4D"> Vert Clair </option>
									<option value="#00CC44"> Vert Foncé </option>
									<option value="#C68C53"> Marron Clair </option>
									<option value="#808080"> Gris Foncé </option>
									<option value="#A9A9A9"> Gris Clair </option>
								</select>
							</div>
						</div>
					</div>
					<div class="butt">
						<input class="button" type="submit" name="envoieth" value="Confirmer"/>
					</div>
					
				</form>

				<div class="mess">
					<?php
					if(isset($_POST['envoieth']) ){
						include 'Include/modif_administration.php';
					}
					?>
				</div>
			</div>

			<?php

			if ($admn['admin'] == 2){
				?>

				<div class="souspar2">
					<h3 id="supp_theme">Supprimer un thème</h3>

					<p>Cela implique la suppression de tous les jeux étant dans ce thème.<br> Merci d'être vigilant.</p>

					<form method="post">
						<label class="lab" for="th2">Nom du thème</label>
						<input class="inpu" id="th2" type="text" name="theme" placeholder="theme" >
						<br>
						<div class="butt">
							<input class="button" type="submit" name="envoiesuppth" value="Confirmer"/>
						</div>
					</form>

					<div class="mess">
						<?php
						if(isset($_POST['envoiesuppth']) ){
							include 'Include/modif_administration.php';
						}
						?>
					</div>
				</div>
				<?php
			}
			?>
		</div>

	</div>

</body>


</html>

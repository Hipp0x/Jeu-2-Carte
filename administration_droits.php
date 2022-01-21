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
		if ($res['admin'] == 2){
			?>

			<div class="para1">

				<div class="souspar1a">

					<h3 id="admin">Ajouter un adminsitrateur/modérateur</h3>

					<form method="post">

						<div class="centre-sous">
							<div class="txt">
								<label class="lab" for="pseu">Pseudo de l'utilisateur</label>
								<label class="lab" for="dr">Droits attribués</label>
							</div>
							<div class="balise">
								<input class="inpu" type="text" id="pseu" name="pseudo" placeholder="joueur123" >
								<div class="custom-select-admn">
									<select class="sele" id="dr" name="droit">
										<option value=1 >Modérateur</option>
										<option value=2 >Administrateur</option>
									</select>
								</div>
							</div>
						</div>
						<div class="butt">
							<input class="button" type="submit" name="envoieadmin" value="Confirmer"/>
						</div>
					</form>

					

					<div class="mess">
						<?php
						if(isset($_POST['envoieadmin'])){
							include 'Include/modif_administration.php';
						}
						?>
					</div>
				</div>

				<div class="souspar1">

					<div class="suppadm">

						<h3 id="supp_admin">Supprimer les droits d'un adminisitrateur/modérateur</h3>

						<form method="post">
							<label class="lab" for="pseu2">Pseudo de l'utilisateur</label>
							<input class="inpu" type="text" id="pseu2" name="pseudo" placeholder="joueur123" >
							<br>
							<div class="butt">
								<input class="button" type="submit" name="envoisuppadmin" value="Confirmer"/>
							</div>
						</form>

						<div class="mess">
							<?php
							if(isset($_POST['envoisuppadmin'])){
								include 'Include/modif_administration.php';
							}
							?>
						</div>
					</div>
				</div>
			</div>
			<?php
		}
		?>

	</div>

</body>


</html>

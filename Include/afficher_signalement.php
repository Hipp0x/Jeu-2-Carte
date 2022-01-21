<?php
include 'Include/database.php';
global $bdd;

if($_GET['categorie'] == "cartes"){
	
	if($_GET['cible'] == "faux"){

		$q = $bdd->prepare('SELECT * FROM td_cartes WHERE signalement_faux > 0 ORDER BY signalement_faux DESC');
		$q->execute();
		?>
		<div class="all"> 
			<?php
			while ($cartes = $q->fetch()){
				?>
				<div class="bloc">
					<div class="nb">
						<p>Nombre de Signalements <br> <?php echo $cartes['signalement_faux']; ?> </p>
					</div> 
					<div class="fleche">
					</div>
					<div class="game">
						<p> Jeu <br> <?php echo $cartes['nom_jeu']; ?></p>
					</div>
					<div class="carte">
						<div class="carte1">
							<p><strong>Question</strong>  <?php echo $cartes['question']; ?></p>
						</div>
						<div class="carte2"> 
							<p><strong>Réponse</strong>  <?php echo $cartes['reponse'];?></p>
						</div>
					</div>
				</div>
				<?php
			}
			?>
		</div>
		<?php

	} else if ($_GET['cible'] == "contenu"){

		$q = $bdd->prepare('SELECT * FROM td_cartes WHERE signalement_inappro > 0 ORDER BY signalement_inappro DESC');
		$q->execute();
		?>
		<div class="all">
			<?php 
			while ($cartes = $q->fetch()){
				?>
				<div class="bloc">
					<div class="nb">
						<p>Nombre de Signalements <br> <?php echo $cartes['signalement_inappro']; ?> </p>
					</div> 
					<div class="fleche">
					</div>
					<div class="carte">
						<p>Question <br> <?php echo $cartes['question']; ?></p>
					</div>
					<div class="carte2"> 
						<p>Réponse <br> <?php echo $cartes['reponse'];?></p>
					</div>
				</div>
				<?php
			}
			?>
		</div>
		<?php
	}
} else {
	if ($_GET['cible'] == "theme") {

		$q = $bdd->prepare('SELECT * FROM td_jeux WHERE signalement_theme > 0 ORDER BY signalement_theme DESC');
		$q->execute();
		?>
		<div class="all"> 
			<?php
			while ($jeu = $q->fetch()){
				?>
				<div class="bloc">
					<div class="nb">
						<p>Nombre de Signalements <br> <?php echo $jeu['signalement_theme']; ?> </p>
					</div> 
					<div class="fleche">
					</div>
					<div class="creat">
						<p>Créateur <br> <?php echo $jeu['createur'];?></p>
					</div>
					<div class="th"> 
						<p>Thème <br> <?php echo $jeu['theme']; ?></p>
					</div>
					<div class="jeu"> 
						<p>Jeu <br> <?php echo $jeu['nom']; ?></p>
					</div>
				</div>
				<?php
			}
			?>
		</div>
		<?php

	} else if ($_GET['cible'] == "titre") {

		$q = $bdd->prepare('SELECT * FROM td_jeux WHERE signalement_titre > 0 ORDER BY signalement_titre DESC');
		$q->execute();
		?>
		<div class="all"> 
			<?php
			while ($jeu = $q->fetch()){
				?>
				<div class="bloc">
					<div class="nb">
						<p>Nombre de Signalements <br> <?php echo $jeu['signalement_titre']; ?> </p>
					</div> 
					<div class="fleche">
					</div>
					<div class="creat">
						<p>Créateur <br> <?php echo $jeu['createur'];?></p>
					</div>
					<div class="th"> 
						<p>Thème <br> <?php echo $jeu['theme']; ?></p>
					</div>
					<div class="jeu"> 
						<p>Jeu <br> <?php echo $jeu['nom']; ?></p>
					</div>
				</div>
				<?php
			}
			?>
		</div>
		<?php

	} else if ($_GET['cible'] == "sujet") {

		$q = $bdd->prepare('SELECT * FROM td_jeux WHERE signalement_sujet > 0 ORDER BY signalement_sujet DESC');
		$q->execute();
		?>
		<div class="all"> 
			<?php
			while ($jeu = $q->fetch()){
				?>
				<div class="bloc">
					<div class="nb">
						<p>Nombre de Signalements <br> <?php echo $jeu['signalement_sujet']; ?> </p>
					</div> 
					<div class="fleche">
					</div>
					<div class="creat">
						<p>Créateur <br> <?php echo $jeu['createur'];?></p>
					</div>
					<div class="th"> 
						<p>Thème <br> <?php echo $jeu['theme']; ?></p>
					</div>
					<div class="jeu"> 
						<p>Jeu <br> <?php echo $jeu['nom']; ?></p>
					</div>					
				</div>
				<?php
			}
			?>
		</div>
		<?php

	}
}

?>
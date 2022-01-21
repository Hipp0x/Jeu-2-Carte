<?php
if(!empty($_POST['mdp'])) {
    include 'database.php';
    global $bdd;

    $req = $bdd->prepare('SELECT * FROM td_utilisateurs WHERE pseudo = :pseudo');
    $req->execute(array('pseudo' => $_SESSION['pseudo']));
    $result = $req->fetch();

    if(password_verify($_POST['mdp'], $result['mdp'] )) {
        $req0 = $bdd->prepare('SELECT * FROM td_jeux WHERE createur = :createur');
        $req0->execute(array('createur' => $_SESSION['pseudo']));
        while ($jeu = $req0->fetch()){
            $req1 = $bdd->prepare('DELETE FROM td_cartes WHERE nom_jeu = :nom_jeu');
            $req1->execute(array('nom_jeu' => $jeu['nom']));
        }
        $req2 = $bdd->prepare('DELETE FROM td_jeux WHERE createur = :createur');
        $req2->execute(array('createur' => $_SESSION['pseudo']));
        $req3 = $bdd->prepare('DELETE FROM td_utilisateurs WHERE pseudo = :pseudo');
        $req3->execute(array('pseudo' => $_SESSION['pseudo']));
        session_destroy();
        header('LOCATION: page_accueil.php');
    }else{
       echo "Mauvais mot de Passe" ;
   }
}else{
    echo "Remplis le champ !";
}
?>
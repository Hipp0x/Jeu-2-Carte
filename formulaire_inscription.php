<!DOCTYPE html>

<html lang="fr">


<head>

    <title>Inscription</title>
    <link rel="stylesheet"  href="styles/Inscription.css">
    <link rel="stylesheet" href="styles/Header.css">
    <meta charset="utf-8">

</head>


<body>

    <header>
        <?php include 'Include/header.php'; ?>
    </header>

    <div class="principale">

        <form method="post">

            <h1>Inscription</h1>

            
            <div class="cadre">
                <ul>
                    <li><label class="txt" for="pseudo">Pseudo</label></li>
                    <li><input class="champs" type="text" id="pseudo" name="pseudo" placeholder=" Pseudo " ></li>
                </ul>
            </div>
            
            <div class="cadre">
                <ul>
                    <li><label class="txt" for="prenom">Prénom</label></li>
                    <li><input class="champs" type="text" id="prenom" name="prenom" placeholder=" Prénom " ></li>
                </ul>
            </div>

            <div class="cadre">
                <ul>
                    <li><label class="txt" for="age">Age</label></li>
                    <li><input class="champs" type="text" id="age" name="age" placeholder=" Age "></li>
                </ul>
            </div>

            <div class="cadre">
                <ul>
                    <li><label class="txt" for="mail">Mail</label></li>
                    <li><input class="champs" type="text" id="mail" name="mail" placeholder =" Adresse Mail " ></li>
                </ul>
            </div>


            <div class="cadre">
                <ul>
                    <li><label class="txt" for="mdp">Mot de passe</label></li>
                    <li><input class="champs" type="password" id="mdp" name="mdp" placeholder =" Mot de Passe "  /></li>
                </ul>
            </div>


            <div class="cadre">
                <ul>
                    <li><label class="txt" for="mdp2">Confirmation</label></li>
                    <li><input class="champs" type="password" id="mdp2" name="mdp2" placeholder=" Confirmer le mdp" /></li>
                </ul>
            </div>

            <p>Pour valider l'inscription, remplis tous les champs</p>

            <div class="erreur"> 
                <?php
                if(isset($_POST['envoie'])){
                    include'Include/inscription.php';
                }
                ?>
            </div>

            <div class="butt">
                <input class="button" type="submit" name="envoie" value="Confirmer"/>
            </div>
        </form>

    </div> 

</body>


</html>
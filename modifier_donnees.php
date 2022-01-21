<?php session_start(); ?>
<!DOCTYPE html>

<html lang="fr">


<head>

    <title>Mon Compte</title>
    <link rel="stylesheet" href="styles/modif_donnee.css">
    <link rel="stylesheet" href="styles/Header.css"> 
    <meta charset="utf-8">

</head>



<body>

    <header>
        <?php include 'Include/header.php'; ?>
    </header>

    <h1>Bienvenue sur ton compte !</h1>

    <div class="bod">

        <div class="bloc">

            <div class="pseudo">
                <h3>Modifier ton pseudo</h3>

                <form method="post">
                    <div class="cadre">
                        <label class="txt" for="nwpseud">Nouveau pseudo</label> <br>
                        <input class="champs" type="text" id="nwpseud" name="newpseudo" placeholder=" Nouveau Pseudo ">
                    </div>
                    <div class="butt">
                        <input class="button1" type="submit" name="confirmerpseudo" value="Confirmer">
                    </div>
                </form>

                <div class="erreur">
                    <?php
                    if (isset($_POST['confirmerpseudo'])){
                        include 'Include/verif_modif_donnees.php';
                    }?>
                </div>
            </div>

            <div class="mdp">

                <h3>Modifier mon mot de passe</h3>            

                <form method="post">
                    <div class="cadre">
                        <label class="txt" for="mdp">Mot de passe actuel</label><br>
                        <input class="champs" type="text" id="mdp" name="mdp" placeholder=" Mot de passe actuel ">
                    </div>
                    <div class="cadre">
                        <label class="txt" for="newmdp">Nouveau mot de passe</label><br>
                        <input class="champs" type="text" id="newmdp" name="newmdp" placeholder=" Nouveau mot de passe ">
                    </div>
                    <div class="cadre">
                        <label class="txt" for="confnewmdp">Confirmez le mot de passe</label><br>
                        <input class="champs" type="text" id="confnewmdp" name="confnewmdp" placeholder=" Confirmez le mdp ">
                    </div>
                    <div class="butt">
                        <input class="button2" type="submit" name="confirmermdp" value="Confirmer">
                    </div>
                </form>

                <div class="erreur">
                    <?php
                    if (isset($_POST['confirmermdp'])){
                        include 'Include/verif_modif_donnees.php';
                    }
                    ?>
                </div>
            </div>

            <div class="mail">

                <h3>Modifier mon mail</h3>

                <form method="post">
                    <div class="cadre">
                        <label class="txt" for="mail">Mail actuel</label><br>
                        <input class="champs" type="text" id="mail" name="mail" placeholder=" Mail actuel ">
                    </div>

                    <div class="cadre">
                        <label class="txt" for="newmail">Nouveau mail</label><br>
                        <input class="champs" type="text" id="newmail" name="newmail" placeholder=" Nouveau mail ">
                    </div>
                    <div class="butt">
                        <input class="button3" type="submit" name="confirmermail" value="Confirmer">
                    </div>
                </form>
                <div class="erreur">
                    <?php
                    if (isset($_POST['confirmermail'])){
                        include 'Include/verif_modif_donnees.php';
                    }
                    ?>
                </div>

            </div>

        </div>

        <div class="retour">
            <input class="button" type="button"  name="retour" value="Annuler" onclick="self.location.href='page_compte.php'">
        </div>

    </div>

    
</body>


</html>

<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Accueil</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<header>
<?php require ("header.php"); ?>
</header>
    <main>
        <div id="bienvenue">
            <img id ="runforrest" src="img\runforrest.jpg"/>
            <span id="text-bienvenue">Bienvenue sur le site du restaurant Bubba Gump ! Vous pouvez réserver une table pour déguster nos délieuses crevettes quand vous le désirez</span>
        </div>
<?php

if(!empty($_SESSION['login']))
    {
    ?>
    <div class="div-index">
        <span class="text-index">Bonjour <?php echo $_SESSION['login']?> <br/>
        Bienvenue <br />
        Vous pouvez éditer votre profil <a class="link-index" href="profil.php">ici</a><br />
        Vous pouvez réserver <a class="link-index" href="reservation.php">ici</a><br /> 
    </span>
    <form action="index.php" method="post">
<input class="button1" type="submit" name="deconnexion" value="Se déconnecter" />
    </form>
    <?php

    if(isset($_POST['deconnexion']))
    {
        session_unset();
        session_destroy();
        header("location:index.php");
    }

    ?>
    </div>
    <?php
    }
    else
    {
    ?>
    <div class="div-index">
        <span class="text-index">
            Vous n'êtes pas enregistré <br />
            Vous pouvez vous enregistrer <a class="link-index" href="inscription.php">ici</a><br />
            Vous pouvez vous connecter <a class="link-index" href="connexion.php">ici</a><br />
        </span>
    </div>
    <?php
    }

?>
 </main>
 <footer>
    <div class="footer">
    <span>Solenn Massot & Hugo Cerezo 2020</span>
    </div>
</footer>
</body>
</html>
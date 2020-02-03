<?php

session_start();

?>
<!DOCTYPE html>
<html>
<head>
    <title>Reservation</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<header>
<?php require ("header.php"); ?>
</header>
<main>
<?php
    if(!empty($_SESSION['login']))
    {
        $id = $_GET['id'];
        $connexion = mysqli_connect("localhost", "root", "", "reservationsalles");
		$requete = "SELECT login,titre,description,debut,fin FROM reservations INNER JOIN utilisateurs ON utilisateurs.id = reservations.id_utilisateur WHERE reservations.id =\"$id\"";
        $resultat = mysqli_query($connexion, $requete);
        //var_dump($resultat);
        $reservation = mysqli_fetch_array($resultat);
        //var_dump($reservation);
        
        ?>
        <div id="res">
            <span>  <h1 class = "titreres">Pseudo : <br/></h1>
                    <?php echo $reservation['login'] ?><br/>
                    <h1 class = "titreres">Titre :  <br/></h1>
                    <?php echo $reservation['titre'] ?><br/>
                    <h1 class = "titreres"> Description : <br/></h1>
                    <?php echo $reservation['description'] ?><br/>
                    <h1 class = "titreres"> Date de début : <br/></h1>
                    <?php echo $reservation['debut'] ?><br/>
                    <h1 class = "titreres"> Date de fin : <br/></h1>
                    <?php echo $reservation['fin'] ?><br/></span>
        </div>
        <?php
    }
    else
    {
        ?>
        <div class="error">
                    <span>
                       Vous devez être connecté pour voir cette page
                 </span>
                 </div>
                 <?php
    }
?>








</main>
<footer>
    <span class="footer">Solenn Massot & Hugo Cerezo 2020</span>
</footer>
</body>
</html>	
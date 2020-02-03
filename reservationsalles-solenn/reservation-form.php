<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Accueil</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<header>
<?php require ("header.php"); ?>
</header>
<body>
    <main>
        <?php
if (isset($_SESSION['login'])) 
{

        if(isset($_POST['envoie']))
        {
            $titre = $_POST['title'];
            $description = $_POST['comment'];
            $debut= strtotime($_POST['heured']);
            $fin = strtotime($_POST['heuref']);
            $login = $_SESSION['login'];
            $date = time();
            if ($debut > $date)
            {
                if($fin == ($debut + 3600))
                {
                    $debut = date_create($_POST['heured'])->format('G');
                    $jour = date_create($_POST['heured'])->format('N');

                    if($debut < 19)
                    {
                        if($jour == 1 || $jour == 2 || $jour == 3 || $jour == 4 || $jour == 5)
                        {
                            $debut = $_POST['heured'];
                            $fin = $_POST['heuref'];
                            $connexion = mysqli_connect("localhost","root","","reservationsalles");
                            $requete = "SELECT debut FROM reservations WHERE debut = \"$debut\"";
                            $query = mysqli_query($connexion, $requete);
                            $resultat = mysqli_fetch_all($query);
                    

                            if(empty($resultat))
                            {
                                $requetelog = "SELECT id FROM utilisateurs WHERE login = '$login'";
                                $querylog = mysqli_query($connexion, $requetelog);
                                $resultatlog = mysqli_fetch_assoc($querylog);
                                $logid = $resultatlog["id"];
                                $requete2 = "INSERT INTO reservations (titre,description,debut,fin,id_utilisateur) VALUE (\"$titre\",\"$description\",\"$debut\",\"$fin\",\"$logid\")";
                                $query2 = mysqli_query($connexion, $requete2);
                                ?>
                                <div class="error">
                                    <span>Votre réservation à été effectuée avec succès</span>
                                </div>
                                <?php
                            }
                            else
                            {
                                ?>
                                <div class="error">
                                    <span>Ce créneau est déjà réservé</span>
                                </div>
                                <?php
                            }
                        }
                        else
                        {
                        ?>
                            <div class="error">
                                <span>Vous ne pouvez pas réserver le week end</span>
                            </div>
                        <?php
                        }
                    }
                    else 
                    {
                        ?>
                        <div class="error">
                            <span>Votre créneau n'est pas dans la plage horaire proposée</span>
                        </div>
                        <?php
                    }
                }
                else
                {
                 ?>
                    <div class="error">
                        <span>Votre réservation ne peut durer qu'une heure<br/></span>
                    </div>
                <?php
                }
            }
            else
            {
                ?>
                <div class="error">
                    <span>Votre réservation ne peut pas être antérieur à la date du jour<br/></span>
                </div>
            <?php 
            }

        }
        ?>
        <h1 id="titre-réservation">Attention, votre réservation ne peut excéder une heure et doit être contenue dans une plage horaire entre 8 et 19h du lundi au vendredi</h1>
<form class="form"  action="" method="post">
				
                <label for="titre">Titre</label>
				<input class="input" type="text" name="title" required/></br>
				
                <label for="description">Description</label>
				<textarea class="input" value="comment" name="comment" rows="3" required></textarea></br>
                
                <label for="debut">Début de la réservation</label>
                <input class="input" type="datetime-local" name="heured" required/></br>
                
                <label for="fin">Fin de la réservation</label>
				<input class="input" type="datetime-local" name="heuref" required/></br>

				<input class="button1" type="submit" value="Valider" name="envoie"/>
</form>
<?php
}
else 
{
    ?>
    <div class="error">
        <span>Connexion requise</span>
    </div>
    <?php
}

?>
</main>
</body>
</html>


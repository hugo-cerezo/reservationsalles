<?php
session_start();
if (isset($_SESSION['login'])) 
{

?>
<form action="" method="post">
				
                <label for="titre">titre</label>
				<input type="text" name="title" required/></br>
				
                <label for="description">description</label>
				<textarea value="comment" name="comment" rows="3" required></textarea></br>
                
                <label for="debut">début</label>
                <input type="datetime-local" name="heured" required/></br>
                
                <label for="fin">fin</label>
				<input type="datetime-local" name="heuref" required/></br>

				<input type="submit" value="reserver" name="envoie"/>
</form>
<?php
        if(isset($_POST['envoie']))
        {
            $titre = $_POST['title'];
            $description = $_POST['comment'];
            $debut= strtotime($_POST['heured']);
            $fin = strtotime($_POST['heuref']);
            $login = $_SESSION['login'];

            if($fin == ($debut + 3600))
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
                    echo "Reservation enregistrée";
                 }
                 else
                 {
                     echo "Ce créneau est déjà réservé";
                 }
            }
            else
            {
                echo "Votre réservation ne peut durer qu'une heure";
            }

        }
}
else 
{
    echo "Connexion requise";
}

?>


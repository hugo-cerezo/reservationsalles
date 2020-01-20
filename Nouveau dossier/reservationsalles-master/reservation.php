<?php
session_start();
if (isset($_SESSION['login'])) 
{
    $login = $_SESSION["login"];
    $connexion = mysqli_connect("localhost","root","","reservationsalles"); 
    $requete = "SELECT id FROM utilisateurs WHERE login ='".$login."'";
    $query = mysqli_query($connexion,$requete);
    $resultat = mysqli_fetch_assoc($query);
    var_dump($resultat);
    $id_utilisateur = $resultat ;
    $requete2 = "INSERT INTO reservation VALUE (NULL,'".$_POST['titre']."','".$_POST['description']."','".$_POST['date']."','".$_POST['fin']."','".$id_utilisateur."');";
    if (isset($_POST['envoie']))
 {
    var_dump($_POST['heure']);
    $datefin = $_POST['heure'];
    $datefin = date("H:i:s");  
    var_dump($datefin);
   // $query = mysqli_query($connexion,$requette2);
    echo "votre creneau a été reservé";
}
?>
<form action="" method="post">
				
                <label for="titre">titre</label>
				<input type="text" name="title"/></br>
				
                <label for="description">description</label>
				<input type="text" name="description"/></br>
                
                <label for="debut">debut</label>
				<input type="date" name="date"/></br>
                
                <label for="fin">fin</label>
				<input type="time" name="heure"/></br>

				<input type="submit" value="reserver" name="envoie"/>
</form>
<?php
}
else 
{
    echo "Connexion requise";
}

?>


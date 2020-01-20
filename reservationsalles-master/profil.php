
<?php
session_start();
if (isset($_SESSION['login'])) 
{
    $connexion = mysqli_connect("localhost","root","","reservationsalles"); 
    $requete = "SELECT * FROM utilisateurs WHERE login ='".$_SESSION['login']."'";
    $query = mysqli_query($connexion,$requete);
    $resultat = mysqli_fetch_assoc($query);
?>

<form  action="profil.php" method="post">

<label> Login :  </label>
    <input type="text" name="login" value = 
    <?php echo $resultat['login']; ?> />
<label> Password :  </label></br>
    <input type="password" name="mdp" value = 
    <?php echo $resultat['password']; ?> />

    <input type="submit" name="envoie" value="Modifier" />

</form>
    
<?php
}
else 
{
    echo "Connexion requise";
}
if (isset($_POST['modifier']))
 {
    $mdp = password_hash($_POST['mdp'],PASSWORD_BCRYPT,array('cost'=> 12));
                        //cryptage mdp//
    $update = "UPDATE utilisateurs SET login ='".$_POST['login']."',password = '$mdp' WHERE id = '".$resultat['id']."'";
    $query2 = mysqli_query($connexion,$update); 
    
}

?>


<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Profil</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<header>
<?php require ("header.php"); ?>
</header>
    <main>
        <?php
if (isset($_SESSION['login'])) 
{
    $connexion = mysqli_connect("localhost","root","","reservationsalles"); 
    $requete = "SELECT * FROM utilisateurs WHERE login ='".$_SESSION['login']."'";
    $query = mysqli_query($connexion,$requete);
    $resultat = mysqli_fetch_assoc($query);
?>

<form class="form" action="profil.php" method="post">

<label> Pseudo :  </label>
    <input class="input" type="text" name="login" value = 
    <?php echo $resultat['login']; ?> />
<label> Mot de Passe :  </label>
    <input class="input" type="password" name="mdp" value = 
    <?php echo $resultat['password']; ?> />

    <input class="button1" type="submit" name="envoie" value="Modifier" />

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
if (isset($_POST['modifier']))
 {
    $mdp = password_hash($_POST['mdp'],PASSWORD_BCRYPT,array('cost'=> 12));
                        //cryptage mdp//
    $update = "UPDATE utilisateurs SET login ='".$_POST['login']."',password = '$mdp' WHERE id = '".$resultat['id']."'";
    $query2 = mysqli_query($connexion,$update); 
    
}
?>
</main>
<footer>
    <span class="footer">Solenn Massot & Hugo Cerezo 2020</span>
</footer>
</body>
</html>


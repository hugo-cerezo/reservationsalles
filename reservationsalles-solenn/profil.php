
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

        if(!empty($_SESSION['login']))
        {
        $login = $_SESSION['login'];
        $password = $_SESSION['password'];
        
        
        ?>
       <form class="form" action="profil.php" method="post">

<label> Pseudo :  </label>
    <input class="input" type="text" name="login" value = 
    <?php echo $_SESSION['login']; ?> />
<label> Mot de Passe :  </label>
    <input class="input" type="password" name="password" value ="" />

    <input class="button1" type="submit" name="connexion" value="Modifier" />

</form>
        
        <?php
        
        if(isset($_POST['connexion']))
        {
            $newlogin = $_POST['login'];
            $newpassword = password_hash($_POST["password"], PASSWORD_BCRYPT, array('cost' => 8));
        $connexion = mysqli_connect("localhost","root","","reservationsalles");
        $requete = "SELECT login FROM utilisateurs WHERE login = \"$newlogin\"";
        $query = mysqli_query($connexion, $requete);
        $resultat = mysqli_fetch_all($query);

        if(empty($resultat) || $newlogin == $_SESSION['login'])
        {
            $requete2 = "SELECT * FROM utilisateurs WHERE login = \"$login\"";
            $query2 = mysqli_query($connexion, $requete2);
            $resultat2 = mysqli_fetch_assoc($query2);
            $id = $resultat2['id'];
            $update = "UPDATE utilisateurs SET login =\"$newlogin\", password = \"$newpassword\" WHERE id = \"$id\"";
            $query3 = mysqli_query($connexion, $update);
            $_SESSION['login'] = $newlogin ; 
            $_SESSION['password'] = $newpassword;
            header("location:profil.php");
        }
                else
                {
                    ?>
            <div class="error">
                        <span>
                           Ce pseudo est déjà pris
                     </span>
                     </div>
                     <?php
                }
            }
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


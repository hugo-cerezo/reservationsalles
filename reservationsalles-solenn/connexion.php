<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Connexion</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<header>
<?php require ("header.php"); ?>
</header>

<main>
        <?php
    if(empty($_SESSION['login']))
{
	?>
	<form class="form" name="inscription" method="post" action="">
            Pseudo <input class="input" type="text" name="login" required/> <br/>
            Mot de passe <input class="input" type="password" name="password" required/><br/>
            <input class="button1" type="submit" name="connexion" value="Se connecter"/>
</form>

<?php
if(isset($_POST['connexion']))
{
            $login = $_POST['login'];
            $connexion = mysqli_connect("localhost","root","","reservationsalles");
            if(!$connexion)
            {
                ?>
                <div class="error">
                <span>
                   Une erreur s'est produite, veuillez réessayer plus tard
             </span>
             </div>
             <?php
            }
            else
            {
                $requete = "SELECT login, password FROM utilisateurs WHERE login = '".$login."'";
                $query = mysqli_query($connexion, $requete);
                $resultat = mysqli_fetch_array($query);

                if(!empty($resultat))
                {   
                    if ($_POST['login'] == $resultat['login'])
                    {
                    if (password_verify($_POST['password'], $resultat['password']))
                    {
                        $_SESSION['login'] = $_POST['login'] ;
                        $_SESSION['password'] = $_POST['password'] ;
                        header("location:index.php");
                    }
                    else
                    {
                       ?>
                       <div class="error">
                       <span>
                           Mot de passe incorrect
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
                        Pseudo inconnu
                 </span>
                    </div>
                 <?php
                }
                
    }
}


}
else{
    ?>
    <div class="error">
        <span>
            T'es déjà connecté
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

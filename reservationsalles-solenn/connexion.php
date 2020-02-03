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

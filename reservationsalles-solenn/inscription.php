
<?php
	session_start();
	?>
	<!DOCTYPE html>
<html>
<head>
    <title>Inscription</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<header>
<?php require ("header.php"); ?>
</header>

    <main>
	<?php
        $login = NULL;
        $password = NULL;
        
        if (empty($_SESSION['login'])) {
            ?>
            <form class="form" name="inscription" method="post" action="">
            Pseudo <input class="input" type="text" name="login"/> <br/>
            Mot de passe <input class="input" type="password" name="password"/><br/>
			Confirmez votre mot de passe <input class="input" type="password" name="cpassword"/><br/>
            <input class="button1" type="submit" name="envoie" value="Se connecter"/>
</form>
            </form>
        </div> 
        <?php
        
        
            if (isset($_POST['envoie'])) {
                $login = $_POST['login'];
                $password= password_hash($_POST["password"], PASSWORD_BCRYPT, array('cost' => 8));
        
                if($_POST['password'] != $_POST['cpassword'])
                {
                    ?>
                    <div class="error">
                        <span>
                           Vos mot de passe sont différents
                     </span>
                     </div>
                     <?php
                }
                else{
        
                
                $connexion = mysqli_connect("localhost","root","","reservationsalles");
                $requete = "SELECT login FROM utilisateurs WHERE login = '".$login."'";
                $query = mysqli_query($connexion, $requete);
                $resultat = mysqli_fetch_array($query);
        
                if(!empty($resultat))
                {
                    ?>
                    <div class="error">
                        <span>
                           Votre pseudo n'est pas disponible
                     </span>
                     </div>
                     <?php
                }
                else
                {
                    $requete2 = "INSERT INTO utilisateurs(login, password) VALUES (\"$login\",\"$password\")";
                    $query = mysqli_query($connexion, $requete2);
					//header("location:connexion.php");
					echo "oui";
                }
            }
             
            }
        }
        else
        {
            ?>
            <div class="error">
                <span>
                   Vous êtes déjà connecté
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
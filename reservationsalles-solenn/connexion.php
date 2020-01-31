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
	if(isset($_POST["envoie"]))
	{
		$conn = mysqli_connect("localhost","root","","reservationsalles");
		$request = "SELECT login, password FROM utilisateurs";
		$sql = mysqli_query($conn,$request);
		$row = mysqli_fetch_all($sql);
		/*var_dump($row);*/
		$count = 0;
		while($count < count($row))
		{
			if($_POST["login"] == $row[$count][0] && password_verify($_POST["mdp"], $row[$count][1]))
			{
              $_SESSION["connected"] = true;
				$_SESSION["login"] = $_POST["login"];
				header("location:index.php");
				
			}
			/*else
			{
				?>
				<div  class="error">
					<span>Les informations rentrées sont incorrect</span>
				</div>
				<?php
				break;
					}*/
			$count++;
		}
	}


?>

<form class="form" action="" method="post">
				<label for="login">Votre pseudo</label>
				<input class="input" type="text" name="login"/></br>
				<label for="mdp">Votre mot de passe</label>
				<input class="input" type="password" name="mdp"/></br>
				<input class="button1" type="submit" value="Se connecter" name="envoie"/>
</form>

</main>
<footer>
    <span class="footer">Solenn Massot & Hugo Cerezo 2020</span>
</footer>
</body>
</html>

<?php
session_start();
	if(isset($_POST["envoie"]))
	{
		$conn = mysqli_connect("localhost","root","","reservationsalles");
		$request = "SELECT login, password FROM utilisateurs";
		$sql = mysqli_query($conn,$request);
		$row = mysqli_fetch_all($sql);
		var_dump($row);
		$count = 0;
		while($count < count($row))
		{
			if($_POST["login"] == $row[$count][0] && password_verify($_POST["mdp"], $row[$count][1]))
			{
              $_SESSION["connected"] = true;
				$_SESSION["login"] = $_POST["login"];
				header("location:profil.php");
				
			}
			$count++;
		}
	}


?>

<form action="" method="post">
				<label for="login">Votre Login</label>
				<input type="text" name="login"/></br>
				<label for="mdp">Votre mot de passe</label>
				<input type="password" name="mdp"/></br>
				<input type="submit" value="Se connecter" name="envoie"/>
</form>

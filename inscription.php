
<form name="inscription" method="post" action="">
            login <input type="text" name="login"/> <br/>
            mdp <input type="passeword" name="mdp"/><br/>
			confirme mdp: <input type="passeword" name="remdp"/><br/>
            <input type="submit" name="envoie" value="se connecter"/>
</form>
<?php
	session_start();
	
    $_SESSION["validation"] = true;
	
	if ($_POST["mdp"]==$_POST['remdp'])
	if(isset($_POST["envoie"]))
	{
		echo "test";
		$conn     = mysqli_connect("localhost","root","","reservationsalles");
		$request  = "SELECT login FROM utilisateurs";
		$query    = mysqli_query($conn,$request);
		$response = mysqli_fetch_all($query);
		
		$count = 0;
		while($count < count($response))
		{
			if($response[$count][0] == $_POST["login"])
			{
				$_SESSION["validator"] = false;
				header("location:inscription.php");
			}
			$count++;
		}
		
		if($_SESSION["validation"])
		{
			$request = "INSERT INTO utilisateurs (`id`,`login`,`password`) VALUES (NULL,'".$_POST["login"]."','".password_hash($_POST["mdp"],PASSWORD_BCRYPT)."');";
			mysqli_query($conn, $request);
			header("location:connexion.php");
		}
	}

?>
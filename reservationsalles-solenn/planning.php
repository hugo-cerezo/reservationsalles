<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Accueil</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<header>
<?php require ("header.php"); ?>
</header>
    <main>
<table id="planning" >
    <thead>
        <tr>
            <th></th>
            <th>Lundi</th>
            <th>Mardi</th>
            <th>Mercredi</th>
            <th>Jeudi</th>
            <th>Vendredi</th>
        </tr>
    </thead>
    <tbody>
    <?php
		
		$connexion = mysqli_connect("localhost", "root", "", "reservationsalles");
		$requete = "SELECT * FROM utilisateurs INNER JOIN reservations ON utilisateurs.id = reservations.id_utilisateur WHERE WEEK(reservations.debut) = WEEK(CURDATE())";
		$resultat = mysqli_query($connexion, $requete);
		
		for($l = 8; $l < 19; ++$l)
			{
			    echo '<tr>';
                echo '<td>', $l, '</td>';
                
					for($i = 1; $i <= 5; ++$i)
						{
							echo '<td>';
							$d = 0;

							foreach($resultat as $data)
							    {
									$date = date_create($data['debut'])->format('d/m/Y');
									list($jour, $mois, $annee) = explode('/', $date);
									$timestamp = mktime (0, 0, 0, $mois, $jour, $annee);
									$joursem = date("w",$timestamp);
									$heure = date_create($data['debut'])->format('G');

									if($joursem == $i && $heure == $l)
									    {
											$id = $data['id'];
											echo "<a href='reservation.php?id=", $id, "'><div>";
											echo $data['login'], '<br/>';
											echo $data['titre'];
											echo '</div></a>';
										}
									++$d;
								}
							echo '</td>';
						}
					echo'</tr>';
			}
			
	?>
    </tbody>
</table>
</main>
<footer>
    <span class="footer">Solenn Massot & Hugo Cerezo 2020</span>
</footer>
</body>
</html>	
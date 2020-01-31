<?php

if(empty($_SESSION['login']))
{
    ?>
    <nav class="menu">
        <a class="titre-nav" href="index.php">Bubba Gump</a>
        <a class="link-nav" href="planning.php">Planning</a>
        <a class="link-nav" href="inscription.php">S'inscrire</a>
        <a class="link-nav" href="connexion.php">Connexion</a>
        <img class="img-nav" src="img/logo.png"/>

</nav>
<?php
}
else
{
?>
    <nav class="menu">
        <a class="titre-nav" href="index.php">Bubba Gump</a>
        <a class="link-nav" href="planning.php">Planning</a>
        <a class="link-nav" href="reservation-form.php">Réserver</a>
        <a class="link-nav" href="profil.php">Votre profil</a>
        <img class="img-nav" src="img/logo.png"/> 
</nav>
<?php
}
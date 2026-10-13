<?php 

// $con une vaiable qui stocke la connexion 
//  mysqli_connect la fonction qui permet d ouvrir la connexion entre le script php et la base  
$con = mysqli_connect("localhost" , "root" , "" , "blog");

if (!$con) {
// die arrete immediatemet le script s il contient un message il l affiche juste avant de s'arreter 
    die('connection failed' .mysqli_connect_error());
}
?>

<?php
session_start();
include("base.php");
if(isset($_SESSION["id_agent"])) {
 
$a=$bdd->prepare("SELECT * FROM agent WHERE id_agent=?");
$a->execute(array($_SESSION["id_agent"]));
$data=$a->fetch();

?>
<!DOCTYPE html>
<html>
<head>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="fontawesome-free-5.9.0-web/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/listaudi.css">
    <title>Liste des courriers</title>
</head>
<body>
 <?php 
 require("header.decide.php");
 $b=$bdd->prepare("SELECT * FROM correspondant WHERE id_correspondant=?"); 
 $b->execute(array($_GET["a"]));
 $c=$b->fetch();
    
 $x=$bdd->prepare("SELECT * FROM piece_jointe WHERE id_correspondant=?");
 $x->execute(array($c["id_correspondant"]));
 $img=$x->fetch();
 ?>
 <div class="bloc-login">
<br>
<span class="title-msg">Profil</span>
<br>
<ul>
 <li>Prénom : <?php echo $c["prenom_correspondant"]; ?></li>
 <li>Nom : <?php echo $c["nom_correspondant"]; ?></li>
 <li>Post-Nom : <?php echo $c["postnom_correspondant"]; ?></li>
 <li>Téléphone : <?php echo $c["telephone_correspondant"]; ?></li>
 <li>E-mail : <?php echo $c["email_correspondant"]; ?></li>
 <li>Sexe : <?php echo $c["sexe_correspondant"]; ?></li>
 <li>Adresse : <?php echo $c["adresse_correspondant"]; ?></li>
 <img style="margin-left:5%" src="image/<?php echo $img["fichier_image_piece_jointe"] ?>" width="400px" height="250px">
</ul>
 </div>
</body>
</html>
<?php 
 } else { header("location:index.php"); }
?>
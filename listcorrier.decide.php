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
    <link rel="stylesheet" type="text/css" href="css/listecourrier.css">
    <title>Liste des courriers</title>
</head>
<body>
   <?php require("header.decide.php"); ?>
 <div class="bloc-login">
<br>
<span class="title-msg">Liste des courriers</span>
<br><br>
<?php
 
$a=$bdd->prepare("SELECT * FROM courrier_entrant WHERE id_service=? ORDER BY id_courrier_entrant DESC");
$a->execute(array($data["id_service"]));
$c=$a->rowCount();

if($c == 0) { echo "<span style='margin-left:7%'>Vous n'avez reçu aucun courrier</span>"; } 

while($inf=$a->fetch()) {
 
$n=$bdd->prepare("SELECT * FROM correspondant WHERE id_correspondant=?");
$n->execute(array($inf["id_correspondant"]));
$crr=$n->fetch();
?>
 <form action="#" method="post">
 <ul>
  <li style="color:green">De la part de : <?php echo $crr["prenom_correspondant"]." ".$crr["nom_correspondant"]; ?></li>
  <li>Objet : <?php echo $inf["objet_courrier_entrant"]; ?></li>
  <li style="color:#868686"><i class="fa fa-clock"></i> Date : <?php echo $inf["jour_courrier_entrant"]."/".$inf["mois_courrier_entrant"]."/".$inf["annee_courrier_entrant"]." à ".$inf["heur_courrier_entrant"]."h".$inf["minute_courrier_entrant"] ?> </li>
 </ul>
 </form>
 <hr style="width: 90%;">
 <?php } ?>
 </div>
</body>
</html>
<?php 
 } else { header("location:index.php"); }
?>
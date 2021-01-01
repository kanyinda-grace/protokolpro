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
   <?php require("header.php"); ?>
 <div class="bloc-login">
<br>
<span class="title-msg">Liste des audiances</span>
<br><br>
<?php
 
$a=$bdd->query("SELECT * FROM audiance ORDER BY id_audiance DESC");
$c=$a->rowCount();

if($c == 0) { echo "<span style='margin-left:7%'>Vous n'avez reçu aucun courrier</span>"; } 

while($inf=$a->fetch()) {
 
$n=$bdd->prepare("SELECT * FROM correspondant WHERE id_correspondant=?");
$n->execute(array($inf["id_correspondant"]));
$crr=$n->fetch();

if($inf["etat_audiance"] != "1") {
?>
 <form action="#" method="post">
 <ul>
  <li style="color:green">De la part de : <?php echo $crr["prenom_correspondant"]." ".$crr["nom_correspondant"]; ?></li>
  <li>Objet : <?php echo $inf["motif_audiance"]; ?></li>
  <li>Observation : <?php echo $inf["observation_audiance"] ?></li>
  <li style="color:#868686"><i class="fa fa-clock"></i> Date : <?php echo $inf["jour_audiance"]."/".$inf["mois_audiance"]."/".$inf["annee_audiance"]." à ".$inf["heur_audiance"]."h".$inf["min_audiance"] ?> </li>
  <?php if ($inf["traite_audiance"] == "0") { ?>
  <li>Décision : En cours de traitement</li>
  <?php } else { ?>
  <li>Décision : On vous reçoit, <?php echo $inf["traite_audiance"]; ?></li>
  <?php } ?>
 </ul>
  <a href="audiance-traiter.php?update=<?php echo $inf["id_audiance"]; ?>">
   <button type="button">Traiter</button>
  </a>
 </form>
 <hr style="width: 90%;">
 <?php } } ?>
 </div>
</body>
</html>
<?php 
 } else { header("location:index.php"); }
?>
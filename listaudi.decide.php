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
   <?php require("header.decide.php"); ?>
 <div class="bloc-login">
<br>
<span class="title-msg">Liste des audiances</span>
<br><br>
<?php
 
$a=$bdd->query("SELECT * FROM audiance ORDER BY id_audiance DESC");
$c=$a->rowCount();

if($c == 0) { echo "<span style='margin-left:7%'>Vous n'avez reçu aucune audiance !</span>"; } 

while($inf=$a->fetch()) {
 
if(isset($_POST["accept"])) {
 
$_SESSION["audi_date"] = $_POST["jour"]."/".$_POST["mois"]."/".$_POST["annee"]." à ".$_POST["heure"].":".$_POST["min"];
header("location:update_audiance.php?update=".$inf["id_audiance"]);
}
 
$n=$bdd->prepare("SELECT * FROM correspondant WHERE id_correspondant=?");
$n->execute(array($inf["id_correspondant"]));
$crr=$n->fetch();
 
if($inf["etat_audiance"] != "1") {
?>
 <form method="post">
 <ul>
  <li style="color:green">De la part de : <a href="voir.profil.php?a=<?php echo $crr["id_correspondant"]; ?>"> <?php echo $crr["prenom_correspondant"]." ".$crr["nom_correspondant"]; ?> </a> </li>
  <li>Objet : <?php echo $inf["motif_audiance"]; ?></li>
  <li>Observation : <?php echo $inf["observation_audiance"] ?></li>
  <li style="color:#868686"><i class="fa fa-clock"></i> Date : <?php echo $inf["jour_audiance"]."/".$inf["mois_audiance"]."/".$inf["annee_audiance"]." à ".$inf["heur_audiance"]."h".$inf["min_audiance"] ?> </li>
  <?php if ($inf["traite_audiance"] == "0") { ?>
  <li>Ma décision : Vous n'avez pas encore traité cette audiance</li>
  <?php } else { ?>
  <li>Décision : je lui reçois, <?php echo $inf["traite_audiance"]; ?></li>
  <?php } ?>
 </ul>
    <div id="modal" class="modal">
        <span>Je lui reçois à : </span>
       <br><br>
     <select name="jour">
        <?php for ($j=01;$j<=31;$j++) { ?>
        <option> <?php echo $j; ?> </option> <?php } ?>
        </select>
     <select name="mois">
        <?php for ($m=01;$m<=12;$m++) { ?>
        <option> <?php echo $m; ?> </option> <?php } ?>
        </select>
     <select name="annee">
        <?php for ($m=2020;$m<=2025;$m++) { ?>
        <option> <?php echo $m; ?> </option> <?php } ?>
        </select>
        <span> à </span>
        <select name="heure">
        <?php for ($h=00;$h<=23;$h++) { ?>
        <option> <?php echo $h; ?> </option> <?php } ?>
        </select> <span>:</span>
        <select name="min">
        <?php for ($min=00;$min<=59;$min++) { ?>
        <option> <?php echo $min; ?> </option> 
         <?php } ?>
        </select>
    <br>
    <button style="margin-top:10px" class="accept" name="accept" type="submit">Envoyer</button>
    <a href="rejet.audiance.php?update=<?php echo $inf["id_audiance"]; ?>">
        <button type="button" id="close" class="reject"><i class="fa fa-times-circle"></i> Rejeter</button>
    </a>
    </div>
 </form>
 <hr style="width: 90%;">
 <?php } } ?>
 </div>
</body>
</html>
<?php 
 } else { header("location:index.php"); }
?>
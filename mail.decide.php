<?php 

session_start();

include("base.php");

if(isset($_SESSION["id_agent"])) {

$a=$bdd->prepare("SELECT * FROM agent WHERE id_agent=?");
$a->execute(array($_SESSION["id_agent"]));
$data=$a->fetch();
 
$var = $bdd->prepare("SELECT * from service where id_service =?");
$var->execute(array($data["id_service"]));
$service = $var->fetch();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="fontawesome-free-5.9.0-web/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/mail.decide.css">
    <title>Protokole Pro - Agent</title>
</head>
 <body>
 <header>
    </header>
     <div class="home-page">
    <span style="color:green;font-size:32px">Mes courriers</span>
    <br><br>
    <?php
      
  $a=$bdd->prepare("SELECT * FROM courrier_entrant WHERE id_service=? ORDER BY id_courrier_entrant DESC");
  $a->execute(array($data["id_service"]));
  $c=$a->rowCount();

if($c == 0) { echo "Vous n'avez reçu aucun courrier"; } 

while($inf=$a->fetch()) {
 
$n=$bdd->prepare("SELECT * FROM correspondant WHERE id_correspondant=?");
$n->execute(array($inf["id_correspondant"]));
$crr=$n->fetch();
?>
    <div class="mail-bloc">
    <br>
        <span>Expediteur : <?php echo $crr["prenom_correspondant"]." ".$crr["nom_correspondant"]; ?></span>
        <br><p style="color:#737373">Objet : <?php echo $inf["objet_courrier_entrant"]; ?></p>
        <span style="color:#003e91;font-size:14px"> <i class="fa fa-clock"></i> Date : <?php echo $inf["jour_courrier_entrant"]."/".$inf["mois_courrier_entrant"]."/".$inf["annee_courrier_entrant"]." à ".$inf["heur_courrier_entrant"]."h".$inf["minute_courrier_entrant"] ?> </span>
    </div>
  <?php } ?>
 <footer>
    <span>Copyright© GLIXS 2020 (Global Ligne Innovations, eXpériences &amp; Solutions)</span>
 </footer>
     </div>
 </body>
</html>
<?php 
 
 } else { header("location:index.php"); }

?>
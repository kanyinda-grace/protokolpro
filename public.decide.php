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
    <span style="color:green;font-size:32px">Mes audiances</span>
    <br><br>
    <div class="mail-bloc">
<?php 
     
  $a=$bdd->prepare("SELECT * FROM audiance WHERE id_agent_recois=? ORDER BY id_audiance DESC");
  $a->execute(array($data["id_agent"]));
  $c=$a->rowCount();

if($c == 0) { echo "Vous n'avez reçu aucune audiance"; } 

while($inf=$a->fetch()) {
 
$n=$bdd->prepare("SELECT * FROM correspondant WHERE id_correspondant=?");
$n->execute(array($inf["id_correspondant"]));
$crr=$n->fetch();
?>
    <br>
        <span>Expediteur : <?php echo $crr["prenom_correspondant"]." ".$crr["nom_correspondant"]; ?></span>
        <br><p style="color:#737373">Objet : <?php echo $inf["motif_audiance"]; ?></p>
        <p style="color:#737373">Observation : <?php echo $inf["observation_audiance"]; ?></p>
        <span style="color:#003e91;font-size:14px"> <i class="fa fa-clock"></i> Date : <?php echo $inf["jour_audiance"]."/".$inf["mois_audiance"]."/".$inf["annee_audiance"]." à ".$inf["heur_audiance"]."h".$inf["min_audiance"] ?> </span>
    <br>
        <button id="accept" class="accept" type="button"><i class="fa fa-check-circle"></i> Accepter</button>
    <a href="rejet.audiance.php?update=<?php echo $inf["id_audiance"]; ?>">
        <button type="button" id="close" class="reject"><i class="fa fa-times-circle"></i> Refuser</button>
    </a>
    <div id="modal" class="modal">
        <span>Je lui reçois à </span>
        <select name="heure">
     <?php for ($h=00;$h<=23;$h++) { ?>
     <option> <?php echo $h." h"; ?> </option> <?php } ?>
        </select> <span>:</span>
        <select name="min">
     <?php for ($min=00;$min<=60;$min++) { ?>
     <option> <?php echo $min; ?> </option> 
         <?php } ?>
        </select>
     <a href="update_audiance.php?update=<?php echo $inf["id_audiance"]; ?>">
    <button style="margin-top: 0px;" class="accept" type="button">Envoyer</button>
     </a>
    </div>
   <?php } ?>
    </div>
    
 <footer>
    <span>Copyright© GLIXS 2020 (Global Ligne Innovations, eXpériences &amp; Solutions)</span>
 </footer>
     </div>
 </body>
<script>
    var modale_d = document.getElementById("modal");
    var butts_d = document.getElementById("accept");
    var inline_d = document.getElementById("close");
    
    butts_d.onclick = function() {
        modale_d.style.marginTop= "10px";
        modale_d.style.display= "block";
    }
    
    inline_d.onclick = function() {
        modale_d.style.display= "none";
    }
</script>
</html>
<?php 
 
 } else { header("location:index.php"); }

?>
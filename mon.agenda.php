<?php
session_start();

include("base.php");
include("fonction_date_fr.php");

if(isset($_SESSION["id_agent"])) {

$a=$bdd->prepare("SELECT * FROM agent WHERE id_agent=?");
$a->execute(array($_SESSION["id_agent"]));
$data=$a->fetch();
 
$a=$bdd->prepare("SELECT * FROM agenda WHERE id_agent=?");
$a->execute(array($data["id_agent"]));
$c=$a->fetch();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="fontawesome-free-5.9.0-web/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/agenda-decide.css">
    <title>Protokole Pro - Agent</title>
</head>
 <body>
 <header>
    </header>
     <div class="home-page">
      <div>
       <br>
       <span style="color:green;font-size:32px">Mon Agenda</span>
       <br><br>
      <span>Dernier mise à jour : <?php echo $c["date_maj"]; ?></span>
       <br><a href="agenda.decide.php">
        <button type="button">Modifier l'agenda</button>
       </a>
       <br><br>
       <ul>
        <?php if($c["lundi"] != "0") { ?>
        <li><?php echo $c["lundi"]; ?></li>
        <?php } ?>
        
        <?php if($c["mardi"] != "0") { ?>
        <li><?php echo $c["mardi"]; ?></li>
        <?php } ?>
        
        <?php if($c["mercredi"] != "0") { ?>
        <li><?php echo $c["mercredi"]; ?></li>
        <?php } ?>
        
        <?php if($c["jeudi"] != "0") { ?>
        <li><?php echo $c["jeudi"]; ?></li>
        <?php } ?>
        
        <?php if($c["vendredi"] != "0") { ?>
        <li><?php echo $c["vendredi"]; ?></li>
        <?php } ?>
        
        <?php if($c["samedi"] != "0") { ?>
        <li><?php echo $c["samedi"]; ?></li>
        <?php } ?>
        
        <?php if($c["dimanche"] != "0") { ?>
        <li><?php echo $c["dimanche"]; ?></li>
        <?php } ?>
       </ul>
      </div>
 <footer>
    <span>Copyright© GLIXS 2020 (Global Ligne Innovations, eXpériences &amp; Solutions)</span>
 </footer>
     </div>
 </body>
</html>
<?php 
 
 } else { header("location:index.php"); }

?>
<?php 
session_start();

include("base.php");

$a=$bdd->prepare("SELECT * FROM agent WHERE id_agent=?");
$a->execute(array($_SESSION["id_agent"]));
$data=$a->fetch();

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="fontawesome-free-5.9.0-web/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/audiance.css">
    <title>Protokole Pro</title>
</head>

<body>
     <?php require("header.php"); ?>
    <div class="bloc-login">
     <br>
     <span class="title-msg">Les Agendas</span>
     <?php
 
     $a=$bdd->query("SELECT * FROM agenda");
     while ($c=$a->fetch()) { 
     
     $n=$bdd->prepare("SELECT * FROM agent WHERE id_agent=?");
     $n->execute(array($c["id_agent"]));
     $d=$n->fetch();
     
     ?>
     <br><br>
     <br>
     <b style="font-size:22px;margin-left:2%;"><?php echo $d["prenom_agent"]." ".$d["nom_agent"]; ?></b>
     
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
  
 <?php } ?>
    </div>
    <script>
        var modale_d = document.getElementById("modale");
        var butts_d = document.getElementById("menu");
        var inline_d = document.getElementById("close");

        butts_d.onclick = function() {
            modale_d.style.marginTop = "10px";
        }

        inline_d.onclick = function() {
            modale_d.style.marginTop = "-250px";
        }

    </script>
</body>

</html>

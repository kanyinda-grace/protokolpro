<?php
session_start();
include("base.php");

if(isset($_SESSION["id_agent"])) {

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
    <link rel="stylesheet" type="text/css" href="css/factor.css">
    <title>Protokole Pro - Agent</title>
</head>
    <body>
     <?php require("header.decide.php"); ?>
    <div class="bloc-login">
        <div class="bloc-factor">
            <center>
            <img src="img/icon-avatar.png">
            <hr style="width:80%">
             <br>
            <span><?php echo $data["prenom_agent"]." ".$data["nom_agent"]; ?></span>
<?php  
      $var = $bdd->prepare("SELECT * from service where id_service =?");
      $var->execute(array($data["id_service"]));
      $service = $var->fetch();

 

?>
            <br><span><?php echo $service["libele_service"];?></span>
            <br>
         <br><a style="text-decoration:none;color:#ffffff" href="session.off.php">
             <button style="color:#ffffff"><i class="fa fa-power-off"></i> Deconnexion</button>
             </a>
            </center>
        </div>
        <div class="bloc-content">
            <ul>
                <li><i class="fa fa-envelope"></i><a href="listcorrier.decide.php"> Mes courriers</a></li>
                <li><i class="fa fa-calendar-check"></i><a href="listaudi.decide.php"> Mes audiances</a></li>
                <li><i class="fa fa-envelope"></i><a href="verification.php"> Mon agenda</a></li>
            </ul>
            
        </div>
   <div class="copy">
       <center>
    <span>Copyright© GLIXS 2020 (Global Ligne Innovations, eXpériences &amp; Solutions)</span>
       </center>
   </div>
     </div>
<script>
    var modale_d = document.getElementById("modale");
    var butts_d = document.getElementById("menu");
    var inline_d = document.getElementById("close");
    
    butts_d.onclick = function() {
        modale_d.style.marginTop= "10px";
    }
    
    inline_d.onclick = function() {
        modale_d.style.marginTop= "-250px";
    }
</script>
    </body>
</html>

<?php 
 
 } else { header("location:index.php"); }

?>
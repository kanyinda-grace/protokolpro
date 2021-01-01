<?php

if(isset($_POST["connexion"])) { $msg = "La base de données n'est pas opperationel !"; }

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
        <header>
            <a href="index.php" style="background:darkblue;color:#ffffff">
            <img src="img/protokole-logo.png">
            </a>
         <div>
             <button id="menu"><i class="fa fa-bars"></i> Menu</button>
            <ul>
                <li><a class="a" style="background:darkblue;color:#ffffff" href="factor.php">acceuil</a></li>
                <li><a class="a" href="list-c.php">Courrier <span class="ntf-out">12</span></a></li>
            </ul>
         </div>
            <div class="mid-modal" id="modale">
  <a href="#"><button>Accueil</button></a>
  <a href="list-c.php"><button>Courrier <span>(12)</span></button></a>
  <button id="close">Fermer</button>
 </div>
        </header>
    <div class="bloc-login">
        <div class="bloc-factor">
            <center>
            <img src="img/icon-avatar.png">
            <hr style="width:80%">
             <br>
            <span>Christian Ebalatshim</span>
            <br><span>POSTE 1</span>
            <br>
            <br><button><a href="#">Modifier</a></button>
            </center>
        </div>
        <div class="bloc-content">
            <ul>
                <li><i class="fa fa-envelope"></i><a href="courrier.php"> Enregistrer un courrier</a></li>
                <li><i class="fa fa-calendar-check"></i><a href="audiance.php"> Enregistrer une audiance</a></li>
                <li><i class="fa fa-envelope"></i><a href="#"> Courrier sortant</a></li>
                <li><i class="fa fa-align-justify"></i><a href="#"> Liste des courriers <span class="ntf-out">12</span> </a></li>
                <li><i class="fa fa-archive"></i><a href="archivage.php"> Les archives</a></li>
            </ul>
            
        </div>
   <div class="copy">
       <center>
    <span>Copyright© GLIXS 2019 (Global Litanga Innovantions, eXpériences &amp; Solutions)</span>
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
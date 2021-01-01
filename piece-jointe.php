<?php



?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="fontawesome-free-5.9.0-web/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/audiance.css">
    <title>Protokole Pro - Ajouter une piece jointe</title>
</head>
    <body>
        <header>
            <a href="index.php" style="background:darkblue;color:#ffffff">
            <img src="img/protokole-logo.png">
            </a>
         <div>
             <button id="menu"><i class="fa fa-bars"></i> Menu</button>
            <ul>
                <li><a class="a" style="background:darkblue;color:#ffffff" href="index.php">acceuil</a></li>
                <li><a class="a" href="list-c.php">Courrier <span class="ntf-out">12</span></a></li>
            </ul>
         </div>
            <div class="mid-modal" id="modale">
  <a href="#"><button>Accueil</button></a>
  <a href="#"><button>A propos</button></a>
  <button id="close">Fermer</button>
 </div>
        </header>
    <div class="bloc-login">
        <img src="img/protokole.png">
        <div class="bloc-txt">
        <form action="#" method="post">
        <br><br>
        <span class="title-msg">Ajouter une piece jointe</span>
        <?php if(isset($msg)) { ?><br><br><p class="msg-error"><i class="fa fa-exclamation-triangle"></i> <?php echo $msg; ?></p><?php } ?>
        <br>
        <br><label>Type pièce jointe : </label>
         <select name="">
             <option value=""></option>
         </select>
            <br><label>Correspondant : </label>
         <select style="margin-left:13px" name="">
             <option value=""></option>
         </select>
         <br>
         <br><label class="tmp" for="card"><i class="fa fa-file-image"></i> Importer un exemplaire</label>
                <input id="card" type="file" name="piece_jointe">
         <br>
         <br><button type="submit" name="connexion">Connexion</button>
        </form>
        </div>
   <div style="margin-top:120px" class="copy">
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
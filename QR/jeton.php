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
    <link rel="stylesheet" type="text/css" href="../fontawesome-free-5.9.0-web/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../css/qr.css">
    <title>Protokole Pro - Ajouter une fonction</title>
</head>

<body>
     <header>
<?php 

$a=$bdd->prepare("SELECT * FROM courrier_entrant WHERE id_service=? AND vue_courrier_entrant=0");
$a->execute(array($data["id_service"]));
$c=$a->rowCount(); 
 
$n=$bdd->query("SELECT * FROM audiance WHERE etat_audiance=0");
$aud=$n->rowCount(); 
 
?>
            <a href="../menu.php" style="background:darkblue;color:#ffffff">
            <img src="../img/protokole-logo.png">
            </a>
         <div>
             <button id="menu"><i class="fa fa-bars"></i> Menu</button>
    <ul>
      <li>
       <a class="a" style="background:darkblue;color:#ffffff" href="../menu.php">accueil</a></li>
   <li>
    <span class="ntf-out"><?php echo $c; ?></span>
    <a class="a" href="../listcorrier.php"><i class="fa fa-bell"></i> Courrier
    </a>
   </li>
   <li>
    <span class="ntf-out"><?php echo $aud; ?></span>
    <a class="a" href="../listaudi.php">Audiance</a>
    </li>
    <li>
    <a class="a" href="../agenda.php">Agenda</a>
    </li>
    </ul>
         </div>
            <div class="mid-modal" id="modale">
  <a href="../menu.php"><button>Accueil</button></a>
  <a href="../listcorrier.php"><button>Courrier <span><?php echo "(".$c.")"; ?></span></button></a>
  <a href="../listaudi.php"><button>Audiance <span><?php echo "(".$aud.")"; ?></span></button></a>
  <button id="close">Fermer</button>
 </div>
        </header>
    <div class="bloc-login">
<?php 
  include "meRaviQr/qrlib.php";
  include "config.php";
  if(isset($_POST['create']))
  {
    $qc =  $_POST['qrContent'];
    $qrDest = $_POST['qrDest'];
    $qrDate = $_POST["qrDate"];
    $qrHeure = $_POST["qrHeure"];
    $qrImgName = "protokole".rand();
    if($qc=="" && $qrDest=="" && $qrDate=="" && $qrHeure=="" )
    {
      $msg = "Tous les champs sont obligatoire !";
    }
    elseif($qc=="")
    {
      $msg = "Veuillez entrer le nom du demandeur !";
    }
    elseif($qrDest=="")
    {
      $msg = "Veuillez entrer le nom du destinataire !";
    }
    elseif($qrDate=="") 
    {
     $msg = "Veuillez entrer la date !";
    }
    elseif($qrHeure=="")
    {
     $msg = "Veuillez entrer l'heure !";
    }
    else
    {
    $id_agent = $_SESSION["id_agent"];
    $final = $qc;
    $qrs = QRcode::png($final,"userQr/$qrImgName.png","H","3","3");
    $qrimage = $qrImgName.".png";
    $workDir = $_SERVER['HTTP_HOST'];
    $qrlink = $workDir."/qrcode".$qrImgName.".png";
    $insQr = $meravi->insertQr($final,$qrDest,$qrHeure,$qrDate,$qrimage,$id_agent);
    if($insQr==true)
    {
      header("location:jeton.php?success=$qrimage");

    }
    else
    {
      echo "cant create QR Code";
    }
  }
 }
  ?>
  <?php 
  if(isset($_GET['success']))
  {
    $workDir = $_SERVER['HTTP_HOST'];
    $qrlink = $workDir."/qrcode/userQr/".$_GET['success'];
   
     $a=$bdd->prepare("SELECT * FROM qrcode WHERE qr_Img=?");
     $a->execute(array($_GET['success']));
     $c=$a->fetch();
      
     $ag=$bdd->prepare("SELECT * FROM agent WHERE id_agent=?");
     $ag->execute(array($c["id_agent"]));
     $agd=$ag->fetch();
  ?>
  <div class="border">
    <img src="userQr/<?php echo $_GET['success']; ?>">
    <br>
    <h1 style="margin-left:280px">PROTOKOLE PRO</h1>
    <br><span>N° <?php echo $c["id_qrcode"]; ?></span>
    <br>
    <br><span>Demandeur : <?php echo $c["demandeur"]; ?></span>
    <br>
    <br><span>Destinataire : <?php echo $c["destinataire"]; ?></span>
    <br>
    <br><span>Agent : <?php echo $agd["prenom_agent"]." ".$agd["nom_agent"]; ?></span>
    <br>
    <br><span>Date &amp; Heure : <?php echo $c["date_qr"]." à ".$c["heure_qr"]; ?></span>
    <?php 
    
    ?>
     </div>
<br>
<a href="download.php?download=<?php echo $_GET['success']; ?>"><button type="button">Télécharger</button></a>
<a href="jeton.php"><button style="margin-left:0px;width:200px" type="button">Retournez pour regenerer</button></a>
  <?php } else {
  ?>
<br>
<br>
<span class="title-msg">Créer un jéton d'accés</span>
<?php if(isset($msg)) { ?><br><br><p style="background:red" class="msg-error"><i class="fa fa-exclamation-triangle"></i> <?php echo $msg; ?></p><br><br><?php } ?>
<div id="id01" class="modal">
  <form class="modal-content animate" method="post" enctype="multipart/form-data">
    <div class="container">
      <label for="select">Correspondant :</label>
    <select style="margin-left:20px" name="qrContent">
        <?php
            $fonction = $bdd->query("SELECT * FROM correspondant ");
            while($fonct=$fonction->fetch()){
            echo '<option value = "'.$fonct['prenom_correspondant'].' '.$fonct['nom_correspondant'].'">'.$fonct['prenom_correspondant'].' '.$fonct['nom_correspondant'].'</option>';
        }?>
    </select>
    <br><label for="select">Destinataire :</label>
    <select style="margin-left:20px" name="qrDest">
        <?php 
            $l=$bdd->query("SELECT * FROM agent");
            while($a=$l->fetch()) {
            ?>
            <option value="<?php echo $a["prenom_agent"]." ".$a["nom_agent"] ?>"><?php echo $a["prenom_agent"]." ".$a["nom_agent"] ?></option>
            <?php } ?>
    </select>
     <br><input type="text" name="qrDate" placeholder="Ex : 2019-10-27" value="<?php if(isset($_POST['qrdate'])){ echo $_POST['qrdate']; } ?>">
     <br><input type="text" name="qrHeure" placeholder="Ex : 08:30" value="<?php if(isset($_POST['qrheure'])){ echo $_POST['qrheure']; } ?>">
      <br><button style="margin-left:13%" type="submit" name="create">Créer jéton</button>
    </div>
  </form>
    <?php 
}
   ?>
</div>
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

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
    <link rel="stylesheet" type="text/css" href="css/home-decide.css">
    <title>Protokole Pro - Agent</title>
</head>
 <body>
     <header>
      <img src="img/protokole-logo.png">
      <div>
       <span><i class="fa fa-user"></i> <?php echo $data["prenom_agent"]." ".$data["nom_agent"].", ".$service["libele_service"]; ?>, RDC </span>
      </div>
     </header>
     <div class="home-page">
             <div class="menu">
              <br>
              <span>Mon Menu</span>
              <br><br>
              <ul>
               <li><a href="#"><i class="fa fa-bookmark"></i> Audiance</a>
                <ul>
                 <li><a href="#">Ajouter un audiance d'urgence</a></li>
                 <li><a href="#">Liste des audiances</a></li>
                </ul>
               </li>
               <li><a href="#"><i class="fa fa-address-book"></i> Agenda</a>
                <ul>
                 <li><a href="#">Mettre à jour</a></li>
                 <li><a href="#">Indisponible</a></li>
                </ul>
               </li>
               <li><a href="#"><i class="fa fa-envelope"></i> Courrier</a>
               <br>
               <br><li><a href="#">
               <button><i class="fa fa-power-off"></i> Deconnexion</button>
               </a></li>
              </ul>
             </div>
             <div class="left"></div>
 <footer>
    <span>Copyright© GLIXS 2020 (Global Ligne Innovations, eXpériences &amp; Solutions)</span>
 </footer>
     </div>
 </body>
</html>
<?php 
 
 } else { header("location:index.php"); }

?>
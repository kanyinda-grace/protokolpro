<?php
session_start();

include("base.php");
include("fonction_date_fr.php");

if(isset($_SESSION["id_agent"])) {

$a=$bdd->prepare("SELECT * FROM agent WHERE id_agent=?");
$a->execute(array($_SESSION["id_agent"]));
$data=$a->fetch();
 
$var = $bdd->prepare("SELECT * from service where id_service =?");
$var->execute(array($data["id_service"]));
$service = $var->fetch();
 
$date = $jour_fr_abr.", ".$jour_int." ".$mois_fr_abr." ".$annee;
 
if(isset($_POST["maj"])) {

if(!empty($_POST["lun"])) 
{ $lun = "Lundi : ".$_POST["heure_lun_c"].$_POST["min_lun_c"]." à ".$_POST["heure_lun_f"].$_POST["min_lun_f"];
$update=$bdd->prepare("UPDATE agenda SET lundi=? WHERE id_agent=?");
$update->execute(array($lun,$_SESSION["id_agent"]));
} else {
$update=$bdd->prepare("UPDATE agenda SET lundi=? WHERE id_agent=?");
$update->execute(array("0",$_SESSION["id_agent"]));
}
 
if(!empty($_POST["mar"])) 
{ $mar = "Mardi : ".$_POST["heure_mar_c"].$_POST["min_mar_c"]." à ".$_POST["heure_mar_f"].$_POST["min_mar_f"];
$update=$bdd->prepare("UPDATE agenda SET mardi=? WHERE id_agent=?");
$update->execute(array($mar,$_SESSION["id_agent"]));
} else {
$update=$bdd->prepare("UPDATE agenda SET mardi=? WHERE id_agent=?");
$update->execute(array("0",$_SESSION["id_agent"]));
}
 
if(!empty($_POST["mer"])) 
{ $mer = "Mercredi : ".$_POST["heure_mer_c"].$_POST["min_mer_c"]." à ".$_POST["heure_mer_f"].$_POST["min_mer_f"];
$update=$bdd->prepare("UPDATE agenda SET mercredi=? WHERE id_agent=?");
$update->execute(array($mer,$_SESSION["id_agent"]));
} else { 
$update=$bdd->prepare("UPDATE agenda SET mercredi=? WHERE id_agent=?");
$update->execute(array("0",$_SESSION["id_agent"]));
}
 
if(!empty($_POST["jeu"])) 
{ $jeu = "Jeudi : ".$_POST["heure_jeu_c"].$_POST["min_jeu_c"]." à ".$_POST["heure_jeu_f"].$_POST["min_jeu_f"]; 
$update=$bdd->prepare("UPDATE agenda SET jeudi=? WHERE id_agent=?");
$update->execute(array($jeu,$_SESSION["id_agent"]));
} else {
$update=$bdd->prepare("UPDATE agenda SET jeudi=? WHERE id_agent=?");
$update->execute(array("0",$_SESSION["id_agent"]));
}
 
if(!empty($_POST["ven"])) 
{ $ven = "Vendredi : ".$_POST["heure_ven_c"].$_POST["min_ven_c"]." à ".$_POST["heure_ven_f"].$_POST["min_ven_f"]; 
$update=$bdd->prepare("UPDATE agenda SET vendredi=? WHERE id_agent=?");
$update->execute(array($ven,$_SESSION["id_agent"]));
} else {
$update=$bdd->prepare("UPDATE agenda SET vendredi=? WHERE id_agent=?");
$update->execute(array("0",$_SESSION["id_agent"])); 
}

if(!empty($_POST["sam"])) 
{ $sam = "Samedi : ".$_POST["heure_sam_c"].$_POST["min_sam_c"]." à ".$_POST["heure_sam_f"].$_POST["min_sam_f"];
$update=$bdd->prepare("UPDATE agenda SET samedi=? WHERE id_agent=?");
$update->execute(array($sam,$_SESSION["id_agent"]));
} else { 
$update=$bdd->prepare("UPDATE agenda SET samedi=? WHERE id_agent=?");
$update->execute(array("0",$_SESSION["id_agent"]));
}
 
if(!empty($_POST["dim"])) 
{ $dim = "Dimanche : ".$_POST["heure_dim_c"].$_POST["min_dim_c"]." à ".$_POST["heure_dim_f"].$_POST["min_dim_f"];
$update=$bdd->prepare("UPDATE agenda SET dimanche=? WHERE id_agent=?");
$update->execute(array($dim,$_SESSION["id_agent"]));
} else { 
$update=$bdd->prepare("UPDATE agenda SET vendredi=? WHERE id_agent=?");
$update->execute(array("0",$_SESSION["id_agent"]));
 }

$update=$bdd->prepare("UPDATE agenda SET date_maj=? WHERE id_agent=?");
$update->execute(array($date,$_SESSION["id_agent"]));
header("location:mon.agenda.decide.php");

}

if(isset($_POST["off"])) {
 
$update=$bdd->prepare("UPDATE agenda SET indisponible=? WHERE id_agent=?");
$update->execute(array("1",$_SESSION["id_agent"]));
 
$update=$bdd->prepare("UPDATE agenda SET date_maj=? WHERE id_agent=?");
$update->execute(array($date,$_SESSION["id_agent"])); 
 
$msg = "Vous venez de mettre votre agenda en veuille !";

 
}

if(isset($_POST["on"])) {
 
$update=$bdd->prepare("UPDATE agenda SET indisponible=? WHERE id_agent=?");
$update->execute(array("0",$_SESSION["id_agent"]));
 
$update=$bdd->prepare("UPDATE agenda SET date_maj=? WHERE id_agent=?");
$update->execute(array($date,$_SESSION["id_agent"])); 
 
$msg = "Vous venez de mettre votre agenda en veuille !";

 
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="fontawesome-free-5.9.0-web/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/mon.agenda.css">
    <title>Mon Agenda</title>
</head>
<body>
   <?php require("header.decide.php"); ?>
 <div class="bloc-login">
<br>
<span class="title-msg">Modifier mon agenda</span>
       <br><br>
      <div>
     <form action="#" method="post">
        <input style="margin-top:30px;" type="checkbox" name="lun">
        <label>Lundi</label>
    <br><label>Disponible de </label>
    <select name="heure_lun_c">
     <?php for ($h=00;$h<=23;$h++) { ?>
     <option> <?php echo $h." h"; ?> </option> <?php } ?>
        </select> <span>:</span>
        <select name="min_lun_c">
     <?php for ($min=00;$min<=59;$min++) { ?>
     <option> <?php echo $min; ?> </option> <?php } ?>
        </select>
        <span>à</span> 
       <select name="heure_lun_f">
     <?php for ($h=00;$h<=23;$h++) { ?>
     <option> <?php echo $h." h"; ?> </option> <?php } ?>
        </select> :
        <select name="min_lun_f">
     <?php for ($min=00;$min<=59;$min++) { ?>
     <option> <?php echo $min; ?> </option> <?php } ?>
        </select>
       <br>
       <br><input type="checkbox" name="mar">
        <label>Mardi</label>
    <br><label>Disponible de </label>
    <select name="heure_mar_c">
     <?php for ($h=00;$h<=23;$h++) { ?>
     <option> <?php echo $h." h"; ?> </option> <?php } ?>
        </select> <span>:</span>
        <select name="min_mar_c">
     <?php for ($min=00;$min<=59;$min++) { ?>
     <option> <?php echo $min; ?> </option> <?php } ?>
        </select>
        <span>à</span> 
       <select name="heure_mar_f">
     <?php for ($h=00;$h<=23;$h++) { ?>
     <option> <?php echo $h." h"; ?> </option> <?php } ?>
        </select> :
        <select name="min_mar_f">
     <?php for ($min=00;$min<=59;$min++) { ?>
     <option> <?php echo $min; ?> </option> <?php } ?>
        </select>
       <br>
       <br><input type="checkbox" name="mer">
        <label>Mercredi</label>
    <br><label>Disponible de </label>
    <select name="heure_mer_c">
     <?php for ($h=00;$h<=23;$h++) { ?>
     <option> <?php echo $h." h"; ?> </option> <?php } ?>
        </select> <span>:</span>
        <select name="min_mer_c">
     <?php for ($min=00;$min<=59;$min++) { ?>
     <option> <?php echo $min; ?> </option> <?php } ?>
        </select>
        <span>à</span> 
       <select name="heure_mer_f">
     <?php for ($h=00;$h<=23;$h++) { ?>
     <option> <?php echo $h." h"; ?> </option> <?php } ?>
        </select> :
        <select name="min_mer_f">
     <?php for ($min=00;$min<=59;$min++) { ?>
     <option> <?php echo $min; ?> </option> <?php } ?>
        </select>
       <br>
       <br><input type="checkbox" name="jeu">
        <label>Jeudi</label>
    <br><label>Disponible de </label>
    <select name="heure_jeu_c">
     <?php for ($h=00;$h<=23;$h++) { ?>
     <option> <?php echo $h." h"; ?> </option> <?php } ?>
        </select> <span>:</span>
        <select name="min_jeu_c">
     <?php for ($min=00;$min<=59;$min++) { ?>
     <option> <?php echo $min; ?> </option> <?php } ?>
        </select>
        <span>à</span> 
       <select name="heure_jeu_f">
     <?php for ($h=00;$h<=23;$h++) { ?>
     <option> <?php echo $h." h"; ?> </option> <?php } ?>
        </select> :
        <select name="min_jeu_f">
     <?php for ($min=00;$min<=59;$min++) { ?>
     <option> <?php echo $min; ?> </option> <?php } ?>
        </select>
       <br>
       <br><input type="checkbox" name="ven">
        <label>Vendredi</label>
    <br><label>Disponible de </label>
    <select name="heure_ven_c">
     <?php for ($h=00;$h<=23;$h++) { ?>
     <option> <?php echo $h." h"; ?> </option> <?php } ?>
        </select> <span>:</span>
        <select name="min_ven_c">
     <?php for ($min=00;$min<=59;$min++) { ?>
     <option> <?php echo $min; ?> </option> <?php } ?>
        </select>
        <span>à</span> 
       <select name="heure_ven_f">
     <?php for ($h=00;$h<=23;$h++) { ?>
     <option> <?php echo $h." h"; ?> </option> <?php } ?>
        </select> :
        <select name="min_ven_f">
     <?php for ($min=00;$min<=59;$min++) { ?>
     <option> <?php echo $min; ?> </option> <?php } ?>
        </select>
       <br>
       <br><input type="checkbox" name="sam">
        <label>Samedi</label>
    <br><label>Disponible de </label>
    <select name="heure_sam_c">
     <?php for ($h=00;$h<=23;$h++) { ?>
     <option> <?php echo $h." h"; ?> </option> <?php } ?>
        </select> <span>:</span>
        <select name="min_sam_c">
     <?php for ($min=00;$min<=59;$min++) { ?>
     <option> <?php echo $min; ?> </option> <?php } ?>
        </select>
        <span>à</span> 
       <select name="heure_sam_f">
     <?php for ($h=00;$h<=23;$h++) { ?>
     <option> <?php echo $h." h"; ?> </option> <?php } ?>
        </select> :
        <select name="min_sam_f">
     <?php for ($min=00;$min<=59;$min++) { ?>
     <option> <?php echo $min; ?> </option> <?php } ?>
        </select>
       <br>
       <br><input type="checkbox" name="dim">
        <label>Dimanche</label>
    <br><label>Disponible de </label>
    <select name="heure_dim_c">
     <?php for ($h=00;$h<=23;$h++) { ?>
     <option> <?php echo $h." h"; ?> </option> <?php } ?>
        </select> <span>:</span>
        <select name="min_dim_c">
     <?php for ($min=00;$min<=59;$min++) { ?>
     <option> <?php echo $min; ?> </option> <?php } ?>
        </select>
        <span>à</span> 
       <select name="heure_dim_f">
     <?php for ($h=00;$h<=23;$h++) { ?>
     <option> <?php echo $h." h"; ?> </option> <?php } ?>
        </select> :
        <select name="min_dim_f">
     <?php for ($min=00;$min<=59;$min++) { ?>
     <option> <?php echo $min; ?> </option> <?php } ?>
        </select>
   <br>
   <br><button style="margin-left:0px" name="maj" type="submit"><i class="fa fa-arrow-alt-circle-down"></i> Mettre à jour</button>
  <?php 
  $a=$bdd->prepare("SELECT * FROM agenda WHERE id_agent=?");
  $a->execute(array($_SESSION["id_agent"]));
  $c=$a->fetch();  
  
  if($c["indisponible"] == 0) {
  
  ?>
   <button name="off" style="background:red;margin-left:0px" type="submit"><i class="fa fa-power-off"></i> Indisponible</button>
 <?php } else { ?>
   <button name="on" style="background:#ff8900;margin-left:0px" type="submit"><i class="fa fa-circle-notch"></i> Disponible</button>
 <?php } ?>
    </form>
   </div>
 </div>
</body>
</html>
<?php 
 } else { header("location:index.php"); }
?>
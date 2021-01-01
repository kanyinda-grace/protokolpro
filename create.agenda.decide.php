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
} else { $lun = "0"; }
 
if(!empty($_POST["mar"])) 
{ $mar = "Mardi : ".$_POST["heure_mar_c"].$_POST["min_mar_c"]." à ".$_POST["heure_mar_f"].$_POST["min_mar_f"]; 
} else { $mar = "0"; }
 
if(!empty($_POST["mer"])) 
{ $mer = "Mercredi : ".$_POST["heure_mer_c"].$_POST["min_mer_c"]." à ".$_POST["heure_mer_f"].$_POST["min_mer_f"]; 
} else { $mer = "0"; }
 
if(!empty($_POST["jeu"])) 
{ $jeu = "Jeudi : ".$_POST["heure_jeu_c"].$_POST["min_jeu_c"]." à ".$_POST["heure_jeu_f"].$_POST["min_jeu_f"]; 
} else { $jeu = "0"; }
 
if(!empty($_POST["ven"])) 
{ $ven = "Vendredi : ".$_POST["heure_ven_c"].$_POST["min_ven_c"]." à ".$_POST["heure_ven_f"].$_POST["min_ven_f"]; 
} else { $ven = "0"; }

if(!empty($_POST["sam"])) 
{ $sam = "Samedi : ".$_POST["heure_sam_c"].$_POST["min_sam_c"]." à ".$_POST["heure_sam_f"].$_POST["min_sam_f"]; 
} else { $sam = "0"; }
 
if(!empty($_POST["dim"])) 
{ $dim = "Dimanche : ".$_POST["heure_dim_c"].$_POST["min_dim_c"]." à ".$_POST["heure_dim_f"].$_POST["min_dim_f"]; 
} else { $dim = "0"; }

$ins=$bdd->prepare("INSERT INTO agenda (id_agent,lundi,mardi,mercredi,jeudi,vendredi,samedi,dimanche,indisponible
,date_maj) VALUES (?,?,?,?,?,?,?,?,?,?)");

$ins->execute(array($data["id_agent"],$lun,$mar,$mer,$jeu,$ven,$sam,$dim,"0",$date));

header("location:mon.agenda.php");

}
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
    <span style="color:green;font-size:32px">Crér mon Agenda</span>
    
    <form action="#" method="post">
        <input style="margin-top:30px;" type="checkbox" alt="lundi" name="lun">
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
       <br><input type="checkbox" alt="lundi" name="mar">
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
       <br><input type="checkbox" alt="lundi" name="mer">
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
       <br><input type="checkbox" alt="lundi" name="jeu">
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
       <br><input type="checkbox" alt="lundi" name="ven">
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
       <br><input type="checkbox" alt="lundi" name="sam">
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
       <br><input type="checkbox" alt="lundi" name="dim">
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
   <br><button name="maj" type="submit"><i class="fa fa-arrow-alt-circle-down"></i> Créer</button>
    </form>
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
<?php 
session_start();

include("base.php");

$a=$bdd->prepare("SELECT * FROM agent WHERE id_agent=?");
$a->execute(array($_SESSION["id_agent"]));
$data=$a->fetch();

  if (isset($_POST['sub'])) {
  extract($_POST);
                  
    $ps=$bdd->prepare("INSERT INTO audiance(motif_audiance,heur_audiance,min_audiance,jour_audiance,mois_audiance,annee_audiance,observation_audiance,id_correspondant,id_agent,id_agent_recois,traite_audiance,etat_audiance) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)") or die("erreur req");
       $param=array($motif_audiance,$heur_audiance,$min_audiance,$jour_audiance,$mois_audiance,$annee_audiance,$observation_audiance,$id_correspondant,$_SESSION["id_agent"],$id_agent,"0","0") or die("erreur param");
       $ps->execute($param);
   
       $ps=$bdd->prepare("INSERT INTO archive_audiance(motif_audiance_archive,heure_audiance_archive,min_audiance_archive,jour_audiance_archive,mois_audiance_archive,annee_audiance_archive,observation_audiance_archive,id_correspondant,id_agent,id_agent_recois) VALUES (?,?,?,?,?,?,?,?,?,?)") or die("erreur req");
       $param=array($motif_audiance,$heur_audiance,$min_audiance,$jour_audiance,$mois_audiance,$annee_audiance,$observation_audiance,$id_correspondant,$_SESSION["id_agent"],$id_agent) or die("erreur param");
       $ps->execute($param);
       
       $msg = "La demande d'audiance a été bien envoyé !";
   
       
   
        
         }
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="fontawesome-free-5.9.0-web/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/audiance.css">
    <title>Protokole Pro - Ajouter une fonction</title>
</head>

<body>
     <?php require("header.php"); ?>
    <div class="bloc-login">
        <img src="img/protokole.png">
        <div class="bloc-txt">
            <form action="" method="post" enctype="multipart/form-data">
                <br><br>
                <span class="title-msg">Ajouter une audiance</span>
                <?php if(isset($msg)) { ?><br><br>
                <p class="msg-error"><i class="fa fa-check-circle"></i> <?php echo $msg; ?></p><?php } ?>
                <br><input style="margin-top:30px" type="text" name="motif_audiance" placeholder="Motif...">
                <br><input style="margin-top:5px" type="text" name="observation_audiance" placeholder="Observation...">
                <br><label for="select">Heure :</label>
                <select style="width:50px" name="heur_audiance">
                    <?php for($a=0;$a<=23;$a++) { ?>
                    <option value="<?php echo $a; ?>"><?php echo $a; ?></option>
                    <?php } ?>
                </select>
                <select style="width:50px" name="min_audiance">
                    <?php for($a=0;$a<=59;$a++) { ?>
                    <option value="<?php echo $a; ?>"><?php echo $a; ?></option>
                    <?php } ?>
                </select>
                <br><label for="select">Date :</label>
                <select style="width:50px;margin-left:7px" name="jour_audiance">
                    <?php for($a=0;$a<=31;$a++) { ?>
                    <option value="<?php echo $a; ?>"><?php echo $a; ?></option>
                    <?php } ?>
                </select>
                <select style="width:50px" name="mois_audiance">
                    <?php for($a=0;$a<=12;$a++) { ?>
                    <option value="<?php echo $a; ?>"><?php echo $a; ?></option>
                    <?php } ?>
                </select>
                <select style="width:60px;" name="annee_audiance">
                    <?php for($a=2019;$a<=2023;$a++) { ?>
                    <option value="<?php echo $a; ?>"><?php echo $a; ?></option>
                    <?php } ?>
                </select>
                <br><label for="select">Correspondant :</label>
                <select style="margin-left:20px" name="id_correspondant">
                     <?php
                 $fonction = $bdd->query("SELECT * FROM correspondant ");
            
                 while($fonct=$fonction->fetch()){
                
          echo '<option value = "'.$fonct['id_correspondant'].'">'.$fonct['prenom_correspondant'].' '.$fonct['nom_correspondant'].'</option>';
                       
                
                 }?>
                </select>
                <br><label for="select">Destinataire :</label>
                <select style="margin-left:20px" name="id_agent">
                <?php 
                 $l=$bdd->query("SELECT * FROM agent");
                 while($a=$l->fetch()) {
                 ?>
                     <option value="<?php echo $a["id_agent"] ?>"><?php echo $a["prenom_agent"]." ".$a["nom_agent"] ?></option>
                     <?php } ?>
                </select>
                <br>
                <br><button type="submit" name="sub">Envoyer</button>
                <a href="correspondant.php">
                <button style="width:180px;margin-left:1px;background:green" type="button" name="sub">Nouveau Correspondant</button>
                </a>
            </form>
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
            modale_d.style.marginTop = "10px";
        }

        inline_d.onclick = function() {
            modale_d.style.marginTop = "-250px";
        }

    </script>
</body>

</html>

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
    <link rel="stylesheet" type="text/css" href="css/archivage-custom.css">
    <title>Protokole Pro - Ajouter une fonction</title>
</head>

<body>
     <?php require("header.php"); ?>
    <div class="bloc-login">
        <div class="bloc-txt">
                <br><br>
                <span class="title-msg">Archive des audiances</span>
            <br><br><br>
                <table>
                    <tr style="background:#6f6fff;color:#ffffff;height:30px;">
                        <td style="width:100px">Motif</td>
                        <td style="width:100px">Heure</td>
                        <td style="width:100px">Date</td>
                        <td style="width:100px">Observation</td>
                        <td style="width:100px">Correspondant</td>
                        <td style="width:100px">Agent</td>
                        <td style="width:100px">Destinataire</td>
                    </tr>
                    <?php
                    
                    $a=$bdd->query("SELECT * FROM archive_audiance");
                    while($n=$a->fetch()) {
                        
                    $c=$bdd->prepare("SELECT * FROM correspondant WHERE id_correspondant=?");
                    $c->execute(array($n["id_correspondant"]));
                    $cr=$c->fetch();
                        
                    $s=$bdd->prepare("SELECT * FROM agent WHERE id_agent=?");
                    $s->execute(array($n["id_agent"]));
                    $sr=$s->fetch();
                        
                    $sa=$bdd->prepare("SELECT * FROM agent WHERE id_agent=?");
                    $sa->execute(array($n["id_agent"]));
                    $saa=$sa->fetch();
                    ?>
                    <tr style="height:25px">
                        <td><?php echo $n["motif_audiance_archive"] ?></td>
                        <td><?php echo $n["heure_audiance_archive"]." h ".$n["min_audiance_archive"]; ?></td>
                        <td><?php echo $n["jour_audiance_archive"]." / ".$n["mois_audiance_archive"]." / ".$n["annee_audiance_archive"]; ?></td>
                        <td><?php echo $n["observation_audiance_archive"]; ?></td>
                        <td><?php echo $cr["prenom_correspondant"]." ".$cr["nom_correspondant"]; ?></td>
                        <td><?php echo $sr["prenom_agent"]." ".$sr["nom_agent"]; ?></td>
                        <td><?php echo $saa["nom_agent"]; ?></td>
                    </tr>
                    <?php 
                    }
                    ?>
                </table>
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

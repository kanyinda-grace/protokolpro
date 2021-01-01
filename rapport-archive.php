<?php 
session_start();

include("base.php");

$a=$bdd->prepare("SELECT * FROM agent WHERE id_agent=?");
$a->execute(array($_SESSION["id_agent"]));
$data=$a->fetch();

if(isset($_GET["search"])) {

$jour = intval($_GET["jour"]);
$mois = intval($_GET["mois"]);
$annee = intval($_GET["annee"]);
    
}
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
                <span class="title-msg">Rapport Journalier des courriers</span>
            <br><br><br>
            <form method="get">
                <br><label style="margin-left:13%" for="select">Date :</label>
                <select style="width:50px;margin-left:7px" name="jour">
                    <?php for($a=1;$a<=31;$a++) { ?>
                    <option value="<?php echo $a; ?>"><?php echo $a; ?></option>
                    <?php } ?>
                </select>
                <select style="width:50px" name="mois">
                    <?php for($a=1;$a<=12;$a++) { ?>
                    <option value="<?php echo $a; ?>"><?php echo $a; ?></option>
                    <?php } ?>
                </select>
                <select style="width:60px;" name="annee">
                    <?php for($a=2019;$a<=2023;$a++) { ?>
                    <option value="<?php echo $a; ?>"><?php echo $a; ?></option>
                    <?php } ?>
                </select>
                <button name="search" type="submit">Rechercher</button>
            </form>
            <br>
            <br>
            <?php
                    
                   if(isset($jour)) {
                    
                    $a=$bdd->prepare("SELECT * FROM archivage_courrier WHERE jour_archivage=? AND mois_archivage=? AND anne_archivage=?");
                    $a->execute(array($jour,$mois,$annee));
                       
                    $ct=$a->rowCount();
                    if($ct == 0) { echo "<span style='margin-left:13%'>Nous n'avons pas pu trouver les informations par rapport aux données entrées !</span>"; }
                    
                    while ($n=$a->fetch()) {
                        
                    $c=$bdd->prepare("SELECT * FROM correspondant WHERE id_correspondant=?");
                    $c->execute(array($n["id_correspondant"]));
                    $cr=$c->fetch();
                        
                    $s=$bdd->prepare("SELECT * FROM agent WHERE id_agent=?");
                    $s->execute(array($n["id_agent"]));
                    $sr=$s->fetch();
                        
                    $sa=$bdd->prepare("SELECT * FROM service WHERE id_service=?");
                    $sa->execute(array($n["id_service"]));
                    $saa=$sa->fetch();
                    ?>
            <table>
                    <tr style="background:#6f6fff;color:#ffffff;height:30px;">
                        <td style="width:100px">Motif</td>
                        <td style="width:100px">Heure</td>
                        <td style="width:100px">Date</td>
                        <td style="width:100px">Observation</td>
                        <td style="width:100px">Correspondant</td>
                        <td style="width:100px">Agent</td>
                        <td style="width:100px">Service</td>
                    </tr>
                    <tr style="height:25px">
                        <td><?php echo $n["objet_archivage"] ?></td>
                        <td><?php echo $n["heur_archivage"]." h ".$n["minute_archivage"]; ?></td>
                        <td><?php echo $n["jour_archivage"]." / ".$n["mois_archivage"]." / ".$n["anne_archivage"]; ?></td>
                        <td><?php echo $n["observation_archive"]; ?></td>
                        <td><?php echo $cr["prenom_correspondant"]." ".$cr["nom_correspondant"]; ?></td>
                        <td><?php echo $sr["prenom_agent"]." ".$sr["nom_agent"]; ?></td>
                        <td><?php echo $saa["libele_service"]; ?></td>
                    </tr>
                    <?php 
                    } }
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

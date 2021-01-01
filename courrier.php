<?php 

session_start();

include("base.php");

if(isset($_SESSION["id_agent"])) {

$a=$bdd->prepare("SELECT * FROM agent WHERE id_agent=?");
$a->execute(array($_SESSION["id_agent"]));
$data=$a->fetch();



 if (isset($_POST['sub'])) {
 extract($_POST);


    $objet_courrier_entrant = (strip_tags(ucfirst(trim($_POST["objet_courrier_entrant"]))));

    if (strlen($objet_courrier_entrant)<=50) {
                        
$ps=$bdd->prepare("INSERT INTO courrier_entrant(objet_courrier_entrant,jour_courrier_entrant,heur_courrier_entrant,minute_courrier_entrant,annee_courrier_entrant,mois_courrier_entrant,id_service,id_agent,id_correspondant,observation_courrier_entrant,vue_courrier_entrant) VALUES (?,?,?,?,?,?,?,?,?,?,?)") or die("erreur dans le insert");
$param=array($objet_courrier_entrant,$jour_courrier_entrant,$heur_courrier_entrant, $minute_courrier_entrant,$annee_courrier_entrant,$mois_courrier_entrant,$id_service,($_SESSION["id_agent"]),$id_correspondant,$observation_courrier_entrant,"0") or die("erreur param");
$ps->execute($param) or die("erreur dans execute");
   
$ps=$bdd->prepare("INSERT INTO archivage_courrier(objet_archivage,jour_archivage,heur_archivage,minute_archivage,anne_archivage,mois_archivage,id_service,id_agent,id_correspondant,observation_archive) VALUES (?,?,?,?,?,?,?,?,?,?)") or die("erreur dans le insert");
$param=array($objet_courrier_entrant,$jour_courrier_entrant,$heur_courrier_entrant, $minute_courrier_entrant,$annee_courrier_entrant,$mois_courrier_entrant,$id_service,($_SESSION["id_agent"]),$id_correspondant,$observation_courrier_entrant) or die("erreur param");
$ps->execute($param) or die("erreur dans execute");

$msg = "Votre courrier a été bien enregistré !"; 
    }else{
      $msg="l'objet ne peut pas depasser 50 caractére";
    }






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
            <form action="" method="post">
                <br><br>
                <span class="title-msg">Ajouter un courrier</span>
                <?php if(isset($msg)) { ?><br><br>
                <p class="msg-error"><i class="fa fa-check-circle"></i> <?php echo $msg; ?></p><?php } ?>
                <br><input style="margin-top:30px" type="text" name="objet_courrier_entrant" placeholder="Objet..." required="required">
                <br><label for="select">Heure :</label>
                <select style="width:50px" name="heur_courrier_entrant">
                    <?php for($a=0;$a<=23;$a++) { ?>
                    <option value="<?php echo $a; ?>"><?php echo $a; ?></option>
                    <?php } ?>
                </select>
                <select style="width:50px" name="minute_courrier_entrant">
                    <?php for($a=0;$a<=59;$a++) { ?>
                    <option value="<?php echo $a; ?>"><?php echo $a; ?></option>
                    <?php } ?>
                </select>
                <br><label for="select">Date :</label>
                <select style="width:50px;margin-left:7px" name="jour_courrier_entrant">
                    <?php for($a=1;$a<=31;$a++) { ?>
                    <option value="<?php echo $a; ?>"><?php echo $a; ?></option>
                    <?php } ?>
                </select>
                <select style="width:50px" name="mois_courrier_entrant">
                    <?php for($a=1;$a<=12;$a++) { ?>
                    <option value="<?php echo $a; ?>"><?php echo $a; ?></option>
                    <?php } ?>
                </select>
                <select style="width:60px;" name="annee_courrier_entrant">
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
                <br><label for="select">Service :</label>
                <select style="margin-left:70px" name="id_service">
                    <?php
                 $service = $bdd->query("SELECT * FROM service ");
            
                 while($fonct=$service->fetch()){
                
          echo '<option value = "'.$fonct['id_service'].'">'.$fonct['libele_service'].'</option>';
                       
                
                 }?>
                </select>
                 <br><label for="select">Observation :</label>
                <select style="margin-left:70px" name="observation_courrier_entrant">
                    <option >A traité</option>
      <option >En cours</option>
      <option >Déjà transmis</option>
      <option >A classer</option>
      <option >A integré</option>
      <option >A representer</option>
      <option >A réintegrer</option>
      <option >A analyser</option>
      <option >A participer</option>
      <option >Suite</option>
      <option >Planification</option>

                </select>
                <br>
                <br><button type="submit" name="sub">Enregistrer</button>
                <a href="correspondant.php">
                <button style="width:180px;margin-left:1px;background:green" type="button" name="sub">Nouveau Correspondant</button>
                </a>
            </form>
        </div>
        <div style="margin-top:100px" class="copy">
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
<?php 
 
 } else { header("location:index.php"); }

?>
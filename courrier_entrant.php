<?php 

session_start();

include("base.php");

if(isset($_SESSION["id_agent"])) {

$a=$bdd->prepare("SELECT * FROM agent WHERE id_agent=?");
$a->execute(array($_SESSION["id_agent"]));
$data=$a->fetch();



  if (isset($_POST['sub'])) {
  extract($_POST);
                  
$ps=$bdd->prepare("INSERT INTO courrier_sortant(objet_courrier_sortant,heur_courrier_sortant,minute_courrier_sortant,jour_courrier_sortant,mois_courrier_sortant,annee_courrier_sortant,id_agent,destinataire,observation_courrier_sortant) VALUES (?,?,?,?,?,?,?,?,?)") or die("erreur dans le insert");
$param=array($objet_courrier_sortant,$heur_courrier_sortant, $minute_courrier_sortant,$jour_courrier_sortant,$mois_courrier_sortant,$annee_courrier_sortant,($_SESSION["id_agent"]),$nom_destinataire,$observation_courrier_sortant) or die("erreur param");
$ps->execute($param) or die("erreur dans execute");
$msg = "Votre courrier a été bien enregistré !"; 
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
    <title>Protokole Pro - Ajouter un courrier</title>
</head>

<body>
     <?php require("header.php"); ?>
    <div class="bloc-login">
        <img src="img/protokole.png">
        <div class="bloc-txt">
            <form action="" method="post">
                <br><br>
                <span class="title-msg">Ajouter un courrier sortant</span>
                <?php if(isset($msg)) { ?><br><br>
                <p class="msg-error"><i class="fa fa-check-circle"></i> <?php echo $msg; ?></p><?php } ?>
                <br><input style="margin-top:30px" type="text" name="objet_courrier_sortant" placeholder="Objet...">
                <br><input style="margin-top:5px" type="text" name="nom_destinataire" placeholder="Destinataire...">
                <br><label for="select">Heure :</label>
                <select style="width:50px" name="heur_courrier_sortant">
                    <?php for($a=0;$a<=23;$a++) { ?>
                    <option value="<?php echo $a; ?>"><?php echo $a; ?></option>
                    <?php } ?>
                </select>
                <select style="width:50px" name="minute_courrier_sortant">
                    <?php for($a=0;$a<=59;$a++) { ?>
                    <option value="<?php echo $a; ?>"><?php echo $a; ?></option>
                    <?php } ?>
                </select>
                <br><label for="select">Date :</label>
                <select style="width:50px;margin-left:7px" name="jour_courrier_sortant">
                    <?php for($a=1;$a<=31;$a++) { ?>
                    <option value="<?php echo $a; ?>"><?php echo $a; ?></option>
                    <?php } ?>
                </select>
                <select style="width:50px" name="mois_courrier_sortant">
                    <?php for($a=1;$a<=12;$a++) { ?>
                    <option value="<?php echo $a; ?>"><?php echo $a; ?></option>
                    <?php } ?>
                </select>
                <select style="width:60px;" name="annee_courrier_sortant">
                    <?php for($a=2019;$a<=2023;$a++) { ?>
                    <option value="<?php echo $a; ?>"><?php echo $a; ?></option>
                    <?php } ?>
                </select>
                <br><label for="select">Correspondant :</label>
                <select style="margin-left:20px" name="id_correspondant">
                                         <?php
                 $service = $bdd->query("SELECT * FROM service ");
            
                 while($fonct=$service->fetch()){
                
          echo '<option value = "'.$fonct['id_service'].'">'.$fonct['libele_service'].'</option>';
                       
                
                 }?>

                </select>
                 <br><label for="select">Observation :</label>
                <select style="margin-left:70px" name="observation_courrier_sortant">
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
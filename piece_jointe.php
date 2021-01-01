<?php
session_start();

include("base.php");

if(isset($_SESSION["id_agent"])) {

$a=$bdd->prepare("SELECT * FROM agent WHERE id_agent=?");
$a->execute(array($_SESSION["id_agent"]));
$data=$a->fetch();



if(isset($_POST["sub"])) {
 
  extract($_POST);
    
  $fichier_image_piece_jointe = $_FILES['fichier_image_piece_jointe']['name'];
  $fichierTempo = $_FILES['fichier_image_piece_jointe']['tmp_name'];
  move_uploaded_file($fichierTempo,"image/".$fichier_image_piece_jointe);
           
 $ps=$bdd->prepare("INSERT INTO piece_jointe(id_correspondant,fichier_image_piece_jointe,id_type_piece_jointe,numero_piece_jointe) VALUES (?,?,?,?)") or die("erreur req");
 $param=array($id_correspondant,$fichier_image_piece_jointe,$id_piece_jointe,$numero_piece_jointe) or die("erreur param");
 $ps->execute($param);
 $msg = "tout est okay"; 
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
    <title>Protokole Pro - Ajouter une piece jointe</title>
</head>
    <body>
        <?php require"header.php"; ?>
    <div class="bloc-login">
        <img src="img/protokole.png">
        <div class="bloc-txt">
        <form action="" method="post" enctype="multipart/form-data">
        <br><br>
        <span class="title-msg">Ajouter une pièce jointe</span>
        <?php if(isset($msg)) { ?><br><br><p class="msg-error"><i class="fa fa-exclamation-triangle"></i> <?php echo $msg; ?></p><?php } ?>
        <br>
        <br><label>Type pièce jointe : </label>
         <select name="id_piece_jointe">
             <?php
                 $fonction = $bdd->query("SELECT * FROM type_piece_jointe ");
            
                 while($fonct=$fonction->fetch()){
                
          echo '<option value = "'.$fonct['id_piece_jointe'].'">'.$fonct['libele_piece_jointe'].'</option>';
                       
                
                 }?>
         </select>
            <br><label>Correspondant : </label>
         <select style="margin-left:13px" name="id_correspondant">
             <?php
                 $fonction = $bdd->query("SELECT * FROM correspondant ");
            
                 while($fonct=$fonction->fetch()){
                
          echo '<option value = "'.$fonct['id_correspondant'].'">'.$fonct['nom_correspondant'].'</option>';
                       
                
                 }?>
         </select>
         <br>
         <br><label class="tmp" for="card"><i class="fa fa-file-image"></i> Importer un exemplaire</label>
                <input id="card" type="file" name="fichier_image_piece_jointe">
         <br>
         <br><input type="text" name="numero_piece_jointe" placeholder="Numero de la pièce jointe...">
         <br><button type="submit" name="sub">Enregistrer</button>
        </form>
        </div>
   <div style="margin-top:120px" class="copy">
       <center>
    <span>Copyright© GLIXS 2019 (Global Litanga Innovantions, eXpériences &amp; Solutions)</span>
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
<?php } ?>
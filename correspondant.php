<?php 
session_start();

include("base.php");

$a=$bdd->prepare("SELECT * FROM agent WHERE id_agent=?");
$a->execute(array($_SESSION["id_agent"]));
$data=$a->fetch();

  if (isset($_POST['sub'])) {
   

    if (!empty($_POST['nom_correspondant']) AND !empty($_POST['postnom_correspondant']) AND !empty($_POST['prenom_correspondant']) AND !empty($_POST['telephone_correspondant']) AND !empty($_POST['email_correspondant']) AND !empty($_POST['adresse_correspondant']) )
     {
                      
    $nom_correspondant =strip_tags(htmlspecialchars(trim($_POST['nom_correspondant']))) ;
    $postnom_correspondant = strip_tags(htmlspecialchars(trim($_POST['postnom_correspondant'])));
    $prenom_correspondant = strip_tags(htmlspecialchars(trim($_POST['prenom_correspondant']))) ;
    $telephone_correspondant = strip_tags(htmlspecialchars(trim('telephone_correspondant'))) ;
    $email_correspondant = htmlspecialchars(trim('email_correspondant'));
    $adresse_correspondant = htmlspecialchars(trim('adresse_correspondant')); 
   
      if (strlen($nom_correspondant)<= 20) {
        if (strlen($postnom_correspondant)<= 20) {
            
             if (strlen($prenom_correspondant)<= 20) {
                       
                                $ps=$bdd->prepare("INSERT INTO correspondant(nom_correspondant,postnom_correspondant,prenom_correspondant,telephone_correspondant,email_correspondant,sexe_correspondant,adresse_correspondant,id_piece_jointe) VALUES (?,?,?,?,?,?,?,?)") or die("erreur req");
                      $param=array($nom_correspondant,$postnom_correspondant,$prenom_correspondant,$telephone_correspondant,$email_correspondant,$sexe_correspondant,$adresse_correspondant,"0") or die("erreur param");
           $ps->execute($param);
          $msg = "Le correspondant a été enregistrer";
          header("location:piece_jointe.php");

               }else{
                $msg="le prenom ne doit pas depasser 20 caractére";
               } 
            
        }else{$msg="le postnom ne doit pas depasser 20 caractére";}
      }else{$msg="le nom ne doit pas depasser 20 caracter";}
          

    
     
    
   
      
        

    

   
          
      }else{
        $msg = "veuillez remplir tout les champs";
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
                <span class="title-msg">Ajouter un correspondant</span>
                <?php if(isset($msg)) { ?><br><br>
                <p class="msg-error"><i class="fa fa-fa-check-circle"></i> <?php echo $msg; ?></p><?php } ?>
                <br><input style="margin-top:30px" type="text" name="nom_correspondant" placeholder="Nom...">
                <br><input style="margin-top:5px" type="text" name="postnom_correspondant" placeholder="Post-nom...">
                <br><input style="margin-top:5px" type="text" name="prenom_correspondant" placeholder="Prenom...">
                <br><label for="select">Sexe :</label>
                <select style="margin-left:10px" name="sexe_correspondant">
                <option value="Homme">Homme</option>
                <option value="Femme">Femme</option>
                </select>
                <br><input style="margin-top:5px" type="email" name="email_correspondant" placeholder="Adresse e-mail...">
                <br><input style="margin-top:5px" type="text" name="telephone_correspondant" placeholder="Téléphone...">
                <br><input style="margin-top:5px" type="text" name="adresse_correspondant" placeholder="Adresse...">
                <br><button type="submit" name="sub">Enregistrer</button>
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

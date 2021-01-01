<?php include("base.php");

  if (isset($_POST['sub'])) {
  extract($_POST);
  $nom = htmlspecialchars(trim($_POST['nom_agent']));
  $prenom = htmlspecialchars(trim($_POST['postnom_agent']));
  $telephone = htmlspecialchars(trim($_POST['telephone_agent']));
  $login = htmlspecialchars(trim($_POST['login_agent']));
  $password = htmlspecialchars(trim($_POST['password_agent']));
                  
        $ps=$bdd->prepare("INSERT INTO agent(nom_agent,postnom_agent,prenom_agent,telephone_agent,sexe_agent,login_agent,password_agent,id_service,id_fonction) VALUES (?,?,?,?,?,?,?,?,?)") or die("errur req");
            $param=array($nom,$postnom,$prenom,$telephone,$sexe,$login,$password,$service,$fonction) or die("erreur param");
            $ps->execute($param);
            echo "tout est okay"; 
           }
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="fontawesome-free-5.9.0-web/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/agent.css">
    <title>Protokole Pro - Ajouter une fonction</title>
</head>

<body>
    <header>
        <a href="index.php" style="background:darkblue;color:#ffffff">
            <img src="img/protokole-logo.png">
        </a>
        <div>
            <button id="menu"><i class="fa fa-bars"></i> Menu</button>
            <ul>
                <li><a class="a" style="background:darkblue;color:#ffffff" href="index.php">acceuil</a></li>
                <li><a class="a" href="list-c.php">Courrier <span class="ntf-out">12</span></a></li>
            </ul>
        </div>
        <div class="mid-modal" id="modale">
            <a href="#"><button>Accueil</button></a>
            <a href="#"><button>A propos</button></a>
            <button id="close">Fermer</button>
        </div>
    </header>
    <div class="bloc-login">
        <img src="img/protokole.png">
        <div class="bloc-txt">
            <form action="#" method="post">
                <br><br>
                <span class="title-msg">Ajouter un agent !</span>
                <?php if(isset($msg)) { ?><br><br>
                <p class="msg-error"><i class="fa fa-exclamation-triangle"></i> <?php echo $msg; ?></p><?php } ?>
                <br><input style="margin-top:20px" type="text" name="nom_agent" placeholder="Nom">
                <br><input style="margin-top:5px" type="text" name="prenom_agent" placeholder="Prenom...">
                <br><input style="margin-top:5px" type="text" name="postnom_agent" placeholder="Post-nom...">
                <br><label for="select">Sexe :</label>
                <select name="sexe_agent">
                    <option value="1">Homme</option>
                    <option value="2">Femme</option>
                </select>
                <br><input style="margin-top:5px" type="text" name="telephone_agent" placeholder="Téléphone...">
                <br><input style="margin-top:5px" type="text" name="login_agent" placeholder="login...">
                <br><input style="margin-top:5px" type="password" name="password_agent" placeholder="Mot de passe...">
                
                <br><label for="select">Service :</label>
                <select name="service">
                    <?php
                 $service = $bdd->query("SELECT * FROM service ");
            
                 while($fonct=$service->fetch()){
                
          echo '<option value = "'.$fonct['id_service'].'">'.$fonct['libele_service'].'</option>';
                       
                
                 }?>
                </select>
                <br><label for="select">Fonction :</label>
                <select name="fonction">
                   <?php
                 $fonction = $bdd->query("SELECT * FROM fonction ");
            
                 while($fonct=$fonction->fetch()){
                
          echo '<option value = "'.$fonct['id_fonction'].'">'.$fonct['nom_fonction'].'</option>';
                       
                
                 }?>
                </select>
                <br>
                <br><button type="sub" name="connexion">Connexion</button>
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

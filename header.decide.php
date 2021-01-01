<header>
<?php 

$a=$bdd->prepare("SELECT * FROM courrier_entrant WHERE id_service=? AND vue_courrier_entrant=0");
$a->execute(array($data["id_service"]));
$c=$a->rowCount(); 
 
$n=$bdd->query("SELECT * FROM audiance WHERE etat_audiance=0 ");
$aud=$n->rowCount(); 
 
?>
            <a href="menu.decide.php" style="background:darkblue;color:#ffffff">
            <img src="img/protokole-logo.png">
            </a>
         <div>
             <button id="menu"><i class="fa fa-bars"></i> Menu</button>
    <ul>
      <li>
       <a class="a" style="background:darkblue;color:#ffffff" href="menu.decide.php">accueil</a></li>
   <li>
    <span class="ntf-out"><?php echo $c; ?></span>
    <a class="a" href="listcorrier.decide.php"><i class="fa fa-bell"></i> Courrier
    </a>
   </li>
   <li>
    <span class="ntf-out"><?php echo $aud; ?></span>
    <a class="a" href="listaudi.decide.php">Audiance</a>
    </li>
    <li>
    <a class="a" href="verif.php">Agenda</a>
    </li>
    </ul>
         </div>
            <div class="mid-modal" id="modale">
  <a href="menu.php"><button>Accueil</button></a>
  <a href="listcorrier.php"><button>Courrier <span><?php echo "(".$c.")"; ?></span></button></a>
  <a href="listaudi.php"><button>Audiance <span><?php echo "(".$aud.")"; ?></span></button></a>
  <button id="close">Fermer</button>
 </div>
        </header>
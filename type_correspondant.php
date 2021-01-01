<?php include("base.php");

if (isset($_POST['sub'])) {
    extract($_POST);
$ps=$bdd->prepare("INSERT INTO type_correspondant(libele_type_correspondant,id_correspondant) VALUES (?,?)");
    $param=array($libele_type_correspondant,$id_correspondant);
    $ps->execute($param);
}




?>

              <form action="" method="post">
                  <br><label>service : </label>
                <select name="libele_type_correspondant">
                       <option>personne physique</option>
                       <option>personne morale</option>
                       
                </select><br><br>
                <br><label>correspondant : </label>
                <select name="id_correspondant">
                  <?php   $correspondant = $bdd->query("SELECT * FROM correspodant ");
                    while($cor=$correspondant->fetch()){
                    
          echo '<option value = "'.$cor['id_correspondant'].'">'.$cor['nom_correspondant'].'</option>';
                       
                
                 }?>
                       
                       
                </select><br><br>
             <br><button style="background: darkblue;" type="submit" name="sub">Enregistrer</button>
            
            </form>
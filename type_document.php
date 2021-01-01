<?php include("base.php");

if (isset($_POST['sub'])) {
    extract($_POST);
    $ps=$bdd->prepare("INSERT INTO correspondant(nom_service) VALUES (?)");
    $param=array($correspondant);
    $ps->execute($param);
}




?>

<form action="" method="post">
                <input type="text" name="type_correspondant">
                <select name="id_correspondant">
                       <option>personne physique</option>
                       <option>personne morale</option>
                       
                </select>
             <br><button style="background: darkblue;" type="submit" name="sub">Enregistrer</button>
            
            </form>
<?php
    include("base.php");
   $id = $_GET['id'];
   $select = $bdd->prepare('DELETE FROM fonction  WHERE id_fonction = ? ');
   $param = array($id);
   $select->execute($param);
   
   header("location :listecontenu.php");

?>
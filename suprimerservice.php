<?php
    include("base.php");
   $id = $_GET['id'];
   $select = $bdd->prepare('DELETE FROM service  WHERE id_service = ? ');
   $param = array($id);
   $select->execute($param);
   
   header("location :listecontenu.php");





?>
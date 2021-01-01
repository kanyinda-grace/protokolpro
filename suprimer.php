<?php
    include("base.php");
   $id = $_GET['id'];
   $select = $bdd->prepare('DELETE FROM agent  WHERE id_agent = ? ');
   $param = array($id);
   $select->execute($param);
   
   header("location :listecontenu.php");





?>
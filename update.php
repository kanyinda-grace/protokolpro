<?php 

include("base.php");
session_start();

$e=$bdd->prepare("UPDATE courrier_entrant SET vue_courrier_entrant=? WHERE id_courrier_entrant=?");
$e->execute(array("1",$_GET["update"]));
header("location:listcorrier.php");

?>
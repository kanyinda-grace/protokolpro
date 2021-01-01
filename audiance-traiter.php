<?php
session_start();
include("base.php");

$a=$bdd->prepare("UPDATE audiance SET etat_audiance=? WHERE id_audiance=?");
$a->execute(array("1",$_GET["update"]));
header("location:listaudi.php");

?>
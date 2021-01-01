<?php
session_start();
include("base.php");

$a=$bdd->prepare("UPDATE audiance SET traite_audiance=? WHERE id_audiance=?");
$a->execute(array($_SESSION["audi_date"],$_GET["update"]));
header("location:listaudi.decide.php");

?>
<?php
session_start();
include("base.php");

$a=$bdd->prepare("UPDATE audiance SET traite_audiance=? WHERE id_audiance=?");
$a->execute(array("Audiance réjétée",$_GET["update"]));
header("location:public.decide.php");

?>
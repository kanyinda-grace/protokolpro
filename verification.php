<?php 

session_start();
include("base.php");

$a=$bdd->prepare("SELECT * FROM agenda WHERE id_agent=?");
$a->execute(array($_SESSION["id_agent"]));
$c=$a->rowCount();

if ($c == 1) {

header("location:mon.agenda.decide.php");

} else {

header("location:cr.agenda.decide.php");
}

?>
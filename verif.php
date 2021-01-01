<?php

session_start();
include("base.php");

$a=$bdd->prepare("SELECT * FROM agent WHERE id_agent=?");
$a->execute(array($_SESSION["id_agent"]));
$data=$a->fetch();

if($data["categorie"] == "agent_special") {
header("location:menu.decide.php");
} else {
header("location:menu.php");
}

?>
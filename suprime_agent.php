<?php
session_start();
include 'connect.php';

//code pour supprimer un courrier
if(isset($_GET['supcourentra'])){
	
	$num=$_GET['supcourentra'];

$suprimer=$db->prepare("DELETE from agent
where id='$num' ") or die("erreure de requete");
$suprimer->execute(array($_GET['supcourentra']))or die("erreure de requete");
echo '<p style="color:red">  <script>alert( "agent supprimé avec succés ");window.location.href="Mise_Ajour_agent.php";</script> </p>';

//header("location:Mise_Ajour.php?Mise_Ajour=courrier");

	
}
?>


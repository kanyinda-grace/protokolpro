<?php

//Horizon Tech @jordanlulebo, horizon-php-time(framework).04/04/2019.
//Ce framework a été conçu pour but de traduire les élements de la fonction "date" en français, il est trés simple, trés facile à utiliser et à modifier.
// date("l") = $jour_fr (Abreviation de caractère : $jour_fr_abr ex: Janvier, jan)
// date("F") = $mois_fr (Abreviation de caractère : $mois_fr_abr ex: lundi, lun)

$date = date("l F d, Y");
$jour = date("l");
$jour_int = date("d");
$mois = date("F");
$annee = date("Y");
$heure = date("H");
$min = date("i");

switch ($jour) {
case "Monday";
$jour_fr = "Lundi";break;
case "Tuesday";
$jour_fr = "Mardi";break;
case "Wednesday";
$jour_fr = "Mercredi";break;
case "Thursday";
$jour_fr = "Jeudi";break;
case "Friday";
$jour_fr = "Vendredi";break;
case "Saturday";
$jour_fr = "Samedi";break;
case "Sunday";
$jour_fr = "Dimanche";break;
}

switch ($mois) {
case "January";
$mois_fr = "Janvier";break;
case "February";
$mois_fr = "Févier";break;
case "March";
$mois_fr = "Mars";break;
case "April";
$mois_fr = "Avril";break;
case "May";
$mois_fr = "Mai";break;
case "June";
$mois_fr = "Juin";break;
case "July";
$mois_fr = "Juillet";break;
case "August";
$mois_fr = "Août";break;
case "September";
$mois_fr = "Septembre";break;
case "October";
$mois_fr = "Octobre";break;
case "November";
$mois_fr = "Novembre";break;
case "December";
$mois_fr = "Décembre";break;
}

switch ($jour) {
case "Monday";
$jour_fr_abr = "Lun";break;
case "Tuesday";
$jour_fr_abr = "Mar";break;
case "Wednesday";
$jour_fr_abr = "Mer";break;
case "Thursday";
$jour_fr_abr = "Jeu";break;
case "Friday";
$jour_fr_abr = "Ven";break;
case "Saturday";
$jour_fr_abr = "Sam";break;
case "Sunday";
$jour_fr_abr = "Dim";break;
}

switch ($mois) {
case "January";
$mois_fr_abr = "Jan";break;
case "February";
$mois_fr_abr = "Fév";break;
case "March";
$mois_fr_abr = "Mar";break;
case "April";
$mois_fr_abr = "Avr";break;
case "May";
$mois_fr_abr = "Mai";break;
case "June";
$mois_fr_abr = "Jui";break;
case "July";
$mois_fr_abr = "Juil";break;
case "August";
$mois_fr_abr = "Août";break;
case "September";
$mois_fr_abr = "Sept";break;
case "October";
$mois_fr_abr = "Oct";break;
case "November";
$mois_fr_abr = "Nov";break;
case "December";
$mois_fr_abr = "Déc";break;
}
?>
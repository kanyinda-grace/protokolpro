<?php

if(isset($_POST["connexion"])) { $msg = "La base de données n'est pas opperationel !"; }

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="fontawesome-free-5.9.0-web/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/list-agent.css">
    <title>Protokole Pro - Ajouter une fonction</title>
</head>

<body>
    <header>
        <a href="index.php" style="background:darkblue;color:#ffffff">
            <img src="img/protokole-logo.png">
        </a>
        <div>
            <button id="menu"><i class="fa fa-bars"></i> Menu</button>
            <ul>
                <li><a class="a" style="background:darkblue;color:#ffffff" href="index.php">acceuil</a></li>
                <li><a class="a" href="list-c.php">Courrier <span class="ntf-out">12</span></a></li>
            </ul>
        </div>
        <div class="mid-modal" id="modale">
            <a href="#"><button>Accueil</button></a>
            <a href="#"><button>A propos</button></a>
            <button id="close">Fermer</button>
        </div>
    </header>
    <div class="bloc-login">
        <br>
        <span class="title-msg">Gestion des agents</span>
        <br><br>
        <br><div>
            <table>
                <thead>
                    <tr>
                        <th>Numero</th>
                        <th>Nom</th>
                        <th>Service</th>
                        <th>Paramètes</th>
                    </tr>
                </thead>
                <tbody>
                      <tr>
                        <td>1</td>
                        <td>Christian Ebala</td>
                        <td>Fonctionnaire</td>
                        <td>
                            <a href="#">Editer</a>, <a href="#">Supprimer</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <script>
        var modale_d = document.getElementById("modale");
        var butts_d = document.getElementById("menu");
        var inline_d = document.getElementById("close");

        butts_d.onclick = function() {
            modale_d.style.marginTop = "10px";
        }

        inline_d.onclick = function() {
            modale_d.style.marginTop = "-250px";
        }

    </script>
</body>

</html>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Atelier Pizza</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <h2>Gestion des Clients</h2>
    <a href="ajoutclient.html">Ajout</a>
    <a href="index.html">Accueil</a>
    <table>
        <tr>
            <th>
                Id.
            </th>
            <th>
                Nom
            </th>
            <th>
                Prenom
            </th>
            <th>
                Ville
            </th>
            <th>
                Age
            </th>
        </tr>

   
        <?php

        require_once __DIR__.'/../src/functions.php';

        $pdo = ConnectToBDD();
        listClients($pdo);

        ?>

    </table>
</body>
</html>
    
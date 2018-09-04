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
    <h2>Gestion des Commandes</h2>
    <a href="ajoutcommande.php">Ajout</a>
    <a href="index.html">Accueil</a>
    <table width="700px">
        <tr>
            <th>
                Id.
            </th>
            <th>
                N° Commande
            </th>
            <th>
                Date
            </th>
            <th>
                Livreur
            </th>
            <th>
                Client
            </th>
        </tr>

   
        <?php

        require_once __DIR__.'/../src/functions.php';

        $pdo = ConnectToBDD();
        listCommande($pdo);

        ?>

    </table>
</body>
</html>
    
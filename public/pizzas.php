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
    <h2>Gestion des Pizzas</h2>
    <a href="ajoutpizza.html">Ajout</a>
    <a href="index.html">Accueil</a>
    <table>
        <tr>
            <th>
                Id.
            </th>
            <th>
                Libellé
            </th>
            <th>
                Reference
            </th>
            <th>
                Prix
            </th>
            <th>
                Photo
            </th>
        </tr>

   
        <?php

        require_once __DIR__.'/../src/functions.php';

        $pdo = ConnectToBDD();
        listPizzas($pdo);

        ?>

    </table>
</body>
</html>
    
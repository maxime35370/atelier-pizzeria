<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ajout Commande</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <form action="ajoutcommandefini.php" method="post">
    <h1>Ajout d'une Commande</h1>
    <a href="commandes.php">annuler</a>
        <table>
            <tr><td>N° de Commande : </td><td><input type="text" name="numero"></td></tr>
            <tr><td>Date de commande : </td><td><input type="date" name="date"></td></tr>
            <tr><td>Livreur : </td><td>
           
           
            <?php
                require_once __DIR__.'/../src/functions.php';

                $pdo = ConnectToBDD();
                listLivreur($pdo);
            ?>
           </td>
           <tr><td>Client : </td><td>

            <?php
                require_once __DIR__.'/../src/functions.php';

                $pdo = ConnectToBDD();
                listClientPourCommande($pdo);
            ?>
            </td>

           
            <tr><td></td><td><input type="submit" value="Valider"></td></tr>
        </table>
    </form>
</body>
</html>
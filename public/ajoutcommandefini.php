<?php
    require_once __DIR__.'/../src/functions.php';

    $pdo = ConnectToBDD();
    addCommande($pdo);
?>
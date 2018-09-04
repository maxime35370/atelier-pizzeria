<?php

function ConnectToBDD() {
    try {
        $dsn = 'mysql:dbname=pizzeria;host=localhost';
        $user = 'root';
        $password = '';
        $pdo = new PDO($dsn, $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
        }   
    catch (PDOException $e) {
        echo 'Unable to connect :' .$e->getMessage();
        }
}


function listPizzas($pdo)
{
    try {
        $stmt = $pdo->prepare("
        SELECT id, libelle, reference, prix, url_image FROM pizza;
        ");
        $stmt->execute();
        
        while ($row = $stmt->fetch()) {
            echo '<tr><td>';
            echo $row['id'].'</td>
            <td>'.$row['libelle'].'</td>
            <td>'.$row['reference'].'</td>
            <td>'.$row ['prix'].'€</td>
            <td><img src="/images/'.$row['url_image'].'" width="200px"></td>
            <td><a href="#">Modifier</a></td>
            <td><a href="#">Supprimer</a></td>
            </tr>';
        }
    } 
    catch (PDOException $e) 
        {
        echo $e->getMessage();
        }
}

function listClients($pdo)
{
    try {
        $stmt = $pdo->prepare("
        SELECT id, nom, prenom, ville, age FROM client;
        ");
        $stmt->execute();
        
        while ($row = $stmt->fetch()) {
            echo '<tr><td>';
            echo $row['id'].'</td>
            <td>'.$row['nom'].'</td>
            <td>'.$row['prenom'].'</td>
            <td>'.$row ['ville'].'</td>
            <td>'.$row ['age'].'</td>
            <td><a href="#">Modifier</a></td>
            <td><a href="#">Supprimer</a></td>
            </tr>';
        }
    } 
    catch (PDOException $e) 
        {
        echo $e->getMessage();
        }
}

function listCommande($pdo)
{
    try {
        $stmt = $pdo->prepare("
        SELECT commande.id, commande.numero_commande, commande.date_commande, client.nom as client_nom, client.prenom as client_prenom, livreur.nom as livreur_nom, livreur.prenom as livreur_prenom FROM commande
        INNER JOIN client ON client.id = commande.client_id
        INNER JOIN livreur ON livreur.id = commande.livreur_id;
        ");
        $stmt->execute();
        while ($row = $stmt->fetch()) {
            echo '<tr>';
            echo '<td>'.$row['id'].'</td>
            <td>'. $row['numero_commande'].'</td>
            <td>'.$row['date_commande'].'</td>
            <td>'.$row['livreur_nom'].' '.$row['livreur_prenom'].'</td>
            <td>'.$row['client_nom'].' '.$row['client_prenom'].'</td>';
            echo '
            <td><a href="#">Modifier</a></td>
            <td><a href="#">Supprimer</a></td>
            </tr>';
        }
    } 
    catch (PDOException $e) 
    {
    echo $e->getMessage();
    }
}

function addPizza($pdo)
{
    try {
        $stmt = $pdo->prepare("
        INSERT INTO pizza (libelle, reference, prix, url_image)
        VALUES (:libelle, :reference, :prix, :url_image)
        ");
        $stmt->execute(['libelle' => ($_POST['libelle']),
        'reference' => ($_POST['reference']),
        'prix' => ($_POST['prix']),
        'url_image' => ($_POST['image'])]);
         
        echo 'La pizza '.$_POST['libelle']. ' a bien été ajouté à la base de donnée';
        echo '<br><br><a href="index.html">Accueil</a>';
    }
    catch (PDOException $e) 
    {
    echo $e->getMessage();
    }
}

function addClient($pdo)
{
    try {
        $stmt = $pdo->prepare("
        INSERT INTO client (nom, prenom, ville, age)
        VALUES (:nom, :prenom, :ville, :age)
        ");
        $stmt->execute(['nom' => ($_POST['nom']),
        'prenom' => ($_POST['prenom']),
        'ville' => ($_POST['ville']),
        'age' => ($_POST['age'])]);
         
        echo 'Le client '.$_POST['nom'].' '.$_POST['prenom']. ' a bien été ajouté à la base de donnée';
        echo '<br><br><a href="index.html">Accueil</a>';
    }
    catch (PDOException $e) 
    {
    echo $e->getMessage();
    }
}

function listLivreur($pdo)
{
    try 
    {
        $stmt = $pdo->prepare("
        SELECT id, nom, prenom FROM livreur
        ");
        $stmt->execute();
        echo('<select name="livreur">');
        while ($row = $stmt->fetch()) {
            echo ('<option value="'.$row['id'].'">'. $row['nom'].' '.$row['prenom'].'</option>');
        }
        echo('</select>');
    } 
    catch (PDOException $e) 
    {
    echo $e->getMessage();
    }
}

function listClientPourCommande($pdo)
{
    try 
    {
        $stmt = $pdo->prepare("
        SELECT id, nom, prenom FROM client
        ");
        $stmt->execute();
        echo('<select name="client">');
        while ($row = $stmt->fetch()) {
            echo ('<option value="'.$row['id'].'">'. $row['nom'].' '.$row['prenom'].'</option>');
        }
        echo('</select>');
    } 
    catch (PDOException $e) 
    {
    echo $e->getMessage();
    }
}

function addCommande($pdo)
{
    try {
        $stmt = $pdo->prepare("
        INSERT INTO commande (numero_commande, date_commande, livreur_id, client_id)
        VALUES (:numero, :date, :livreur, :client)
        ");
        $stmt->execute(['numero' => ($_POST['numero']),
        'date' => ($_POST['date']),
        'livreur' => ($_POST['livreur']),
        'client' => ($_POST['client'])]);
         
        echo 'La commande '.$_POST['numero'].' a bien été ajouté à la base de donnée';
        echo '<br><br><a href="index.html">Accueil</a>';
    }
    catch (PDOException $e) 
    {
    echo $e->getMessage();
    }
}
?>

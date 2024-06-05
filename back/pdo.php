<?php
function connectBdd()
{
    $host = "herogu.garageisep.com";
    $dbname = "ZdBjCh2KHG_cinemanage";
    $login = "qrscXGXvdi_cinemanage"; // root
    $password = "30s310qKDR2WnzuA";  // root
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $login, $password);
    } catch (PDOException $e) {
        echo "Erreur de connexion : " . $e->getMessage();
    }
    return $pdo;
    }
?>  
<?php

use Models\inventaire;


require '../Models/connexionDB.php';

$sql = "SELECT * FROM inventories ORDER BY date DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$inventories = $stmt->fetchAll(PDO::FETCH_ASSOC);



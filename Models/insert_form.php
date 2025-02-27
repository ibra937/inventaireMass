<?php
namespace Models;

class insert_form {
    function insert_inventory($date, $place) {
        require 'connexionDB.php';
        // Insertion des données dans la base de données
        $sql = "INSERT INTO inventories (place, date) VALUES (:place, :date)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':place', $place);
        $stmt->bindParam(':date', $date);
        if ($stmt -> execute()) {
            $inventory_id = $pdo->lastInsertId();
            return $inventory_id;
            echo($date);
            echo($place);
        } else {
            echo "Erreur : " . $stmt->errorInfo()[2];
        }
    }
    function insert_expenses($risingAmounts, $risingDescs, $inventory_id) {
        require 'connexionDB.php';
        // Insertion des données dans la base de données
        $sql = "INSERT INTO expenses (inventory_id, amount, description) VALUES (:inventory_id, :amount, :description)";
        $stmt = $pdo->prepare($sql);

        // Insérer chaque dépense dans la base
        foreach ($risingAmounts as $index => $amount) {
            $stmt->execute([
                ':inventory_id' => $inventory_id,
                ':amount' => $amount,
                ':description' => $risingDescs[$index]
            ]);
        }
        // Afficher les données récupérées
    }
    function insert_transport($transportAmounts, $transportDescs, $inventory_id) {
        require 'connexionDB.php';
        // Insertion des données dans la base de données
        $sql = "INSERT INTO transports (inventory_id, amount, description) VALUES (:inventory_id, :amount, :description)";
        $stmt = $pdo->prepare($sql);

        // Insérer chaque dépense dans la base
        foreach ($transportAmounts as $index => $amount) {
            $stmt->execute([
                ':inventory_id' => $inventory_id,
                ':amount' => $amount,
                ':description' => $transportDescs[$index]
            ]);
        }

    }
}
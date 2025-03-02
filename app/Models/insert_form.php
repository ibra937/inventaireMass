<?php
namespace app\Models;
require 'connexionDB.php';
class insert_form {
    private $conn;
    public function __construct(){
        global $conn;
        @$this->pdo = $conn;
    }
    public function insert()
    {

        // Récupérer les données
        @$place = $_POST["place"];
        $date = $_POST["date"];
        $risingAmounts = [];
        $risingDescs = [];
        $transportAmounts = [];
        $transportDescs = [];
        $repastAmounts = [];
        $repastDescs = [];
        $paymentAmounts = [];
        $paymentDescs = [];
        $salesAmounts = [];
        $salesDescs = [];
        $otherAmounts = [];
        $otherDescs = [];
        // Parcourir $_POST pour récupérer toutes les valeurs des champs "risingAmount" et "risingDesc"
        foreach ($_POST as $key => $value) {
            if (strpos($key, 'risingAmount') === 0) {
                // Si le nom commence par "risingAmount", c'est un montant de dépense
                $risingAmounts[] = $value;
            }
            if (strpos($key, 'risingDesc') === 0) {
                // Si le nom commence par "risingDesc", c'est une description de dépense
                $risingDescs[] = $value;
            }
            if (strpos($key, 'transportAmount') === 0) {
                // Si le nom commence par "transportAmount", c'est une description de dépense
                $transportAmounts[] = $value;
            }
            if (strpos($key, 'transportDesc') === 0) {
                // Si le nom commence par "transportDesc", c'est une description de dépense
                $transportDescs[] = $value;
            }
            if (strpos($key, 'repastAmount') === 0) {
                // Si le nom commence par "transportAmount", c'est une description de dépense
                $repastAmounts[] = $value;
            }
            if (strpos($key, 'repastDesc') === 0) {
                // Si le nom commence par "transportDesc", c'est une description de dépense
                $repastDescs[] = $value;
            }
            if (strpos($key, 'paymentAmount') === 0) {
                // Si le nom commence par "transportAmount", c'est une description de dépense
                $paymentAmounts[] = $value;
            }
            if (strpos($key, 'paymentDesc') === 0) {
                // Si le nom commence par "transportDesc", c'est une description de dépense
                $paymentDescs[] = $value;
            }
            if (strpos($key, 'salesAmount') === 0) {
                // Si le nom commence par "transportAmount", c'est une description de dépense
                $salesAmounts[] = $value;
            }
            if (strpos($key, 'salesDesc') === 0) {
                // Si le nom commence par "transportDesc", c'est une description de dépense
                $salesDescs[] = $value;
            }
            if (strpos($key, 'otherAmount') === 0) {
                // Si le nom commence par "transportAmount", c'est une description de dépense
                $otherAmounts[] = $value;
            }
            if (strpos($key, 'otherDesc') === 0) {
                // Si le nom commence par "transportDesc", c'est une description de dépense
                $otherDescs[] = $value;
            }
        }
        if ($inventory_id = $this->insert_inventory($date, $place)) {
            $this->insert_expenses($risingAmounts, $risingDescs, $inventory_id);
            $this->insert_transport($transportAmounts, $transportDescs, $inventory_id);
            $this->insert_repast($repastAmounts, $repastDescs, $inventory_id);
            $this->insert_payment($paymentAmounts, $paymentDescs, $inventory_id);
            $this->insert_sales($salesAmounts, $salesDescs, $inventory_id);
            $this->insert_other($otherAmounts, $otherDescs, $inventory_id);
        }
        if ($_POST['src'] == 'admin'){
            header("Location: inventory?src=inventory&success=true&id=$inventory_id");
        } else {
            header("Location: users/form?success=true");
        }
    }
    function insert_inventory($date, $place) {
        // Insertion des données dans la base de données
        $sql = "INSERT INTO inventories (place, date) VALUES (:place, :date)";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':place', $place);
        $stmt->bindParam(':date', $date);
        if ($stmt -> execute()) {
            $inventory_id = $this->pdo->lastInsertId();
            return $inventory_id;
            echo($date);
            echo($place);
        } else {
            echo "Erreur : " . $stmt->errorInfo()[2];
        }
    }
    function insert_expenses($risingAmounts, $risingDescs, $inventory_id) {
        // Insertion des données dans la base de données
        $sql = "INSERT INTO expenses (inventory_id, amount, description) VALUES (:inventory_id, :amount, :description)";
        $stmt = $this->pdo->prepare($sql);

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
        // Insertion des données dans la base de données
        $sql = "INSERT INTO transports (inventory_id, amount, description) VALUES (:inventory_id, :amount, :description)";
        $stmt = $this->pdo->prepare($sql);

        // Insérer chaque dépense dans la base
        foreach ($transportAmounts as $index => $amount) {
            $stmt->execute([
                ':inventory_id' => $inventory_id,
                ':amount' => $amount,
                ':description' => $transportDescs[$index]
            ]);
        }

    }
    function insert_repast($repastAmounts, $repastDescs, $inventory_id) {
        // Insertion des données dans la base de données
        $sql = "INSERT INTO repasts (inventory_id, amount, description) VALUES (:inventory_id, :amount, :description)";
        $stmt = $this->pdo->prepare($sql);

        // Insérer chaque dépense dans la base
        foreach ($repastAmounts as $index => $amount) {
            $stmt->execute([
                ':inventory_id' => $inventory_id,
                ':amount' => $amount,
                ':description' => $repastDescs[$index]
            ]);
        }

    }
    function insert_payment($paymentAmounts, $paymentDescs, $inventory_id) {
        // Insertion des données dans la base de données
        $sql = "INSERT INTO payments (inventory_id, amount, description) VALUES (:inventory_id, :amount, :description)";
        $stmt = $this->pdo->prepare($sql);

        // Insérer chaque dépense dans la base
        foreach ($paymentAmounts as $index => $amount) {
            $stmt->execute([
                ':inventory_id' => $inventory_id,
                ':amount' => $amount,
                ':description' => $paymentDescs[$index]
            ]);
        }

    }
    function insert_sales($salesAmounts, $salesDescs, $inventory_id) {
        // Insertion des données dans la base de données
        $sql = "INSERT INTO sales (inventory_id, amount, description) VALUES (:inventory_id, :amount, :description)";
        $stmt = $this->pdo->prepare($sql);

        // Insérer chaque dépense dans la base
        foreach ($salesAmounts as $index => $amount) {
            $stmt->execute([
                ':inventory_id' => $inventory_id,
                ':amount' => $amount,
                ':description' => $salesDescs[$index]
            ]);
        }

    }
    function insert_other($otherAmounts, $otherDescs, $inventory_id) {
        // Insertion des données dans la base de données
        $sql = "INSERT INTO others (inventory_id, amount, description) VALUES (:inventory_id, :amount, :description)";
        $stmt = $this->pdo->prepare($sql);

        // Insérer chaque dépense dans la base
        foreach ($otherAmounts as $index => $amount) {
            $stmt->execute([
                ':inventory_id' => $inventory_id,
                ':amount' => $amount,
                ':description' => $otherDescs[$index]
            ]);
        }

    }
}
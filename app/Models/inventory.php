<?php
namespace app\Models;
require 'connexionDB.php';

use PDO;

class inventory{
        private $pdo;
        public function __construct(){
            global $pdo;
            $this->pdo = $pdo;
        }
        public function allInventories() {
            $sql = "SELECT * FROM inventories ORDER BY created_at DESC";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $inventories = $stmt->fetchAll(PDO::FETCH_ASSOC);

            require 'app/Views/inventaire.php';
        }
        public function showInventory($inventory_id) {
            $inventory = $this->getInventories($inventory_id);
            $expenses = $this->getExpenses($inventory_id);
            $transports = $this->getTransports($inventory_id);
            $repasts = $this->getRepast($inventory_id);
            $payments = $this->getPayments($inventory_id);
            $sales = $this->getSales($inventory_id);
            $others = $this->getOthers($inventory_id);

            $totalExpenses = 0;
            foreach ($expenses as $expense) {
                $totalExpenses = $totalExpenses + $expense['amount'];
            }

            $totalTransports = 0;
            foreach ($transports as $transport) {
                $totalTransports = $totalTransports + $transport['amount'];
            }

            $totalRepasts = 0;
            foreach ($repasts as $repast) {
                $totalRepasts = $totalRepasts + $repast['amount'];
            }

            $totalPayments = 0;
            foreach ($payments as $payment) {
                $totalPayments = $totalPayments + $payment['amount'];
            }

            $totalSales = 0;
            foreach ($sales as $sale) {
                $totalSales = $totalSales + $sale['amount'];
            }

            $totalOthers = 0;
            foreach ($others as $other) {
                $totalOthers = $totalOthers + $other['amount'];
            }

            $sumOutput = $totalExpenses + $totalTransports + $totalRepasts + $totalOthers;
            $sumInput = $totalPayments + $totalSales;
            $solde = $sumInput - $sumOutput;

            if (!$inventory) {
                die("Inventaire introuvable.");
            }
            require 'app/Views/details_inventaire.php';
        }
        public function getInventories($id) {
            $sql = "SELECT * FROM inventories WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        public function getExpenses($id) {
            $sql = "SELECT * FROM expenses WHERE inventory_id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        public function getTransports($id) {
            $sql = "SELECT * FROM transports WHERE inventory_id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        public function getRepast($id) {
            $sql = "SELECT * FROM repasts WHERE inventory_id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        public function getPayments($id) {
            $sql = "SELECT * FROM payments WHERE inventory_id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        public function getSales($id) {
            $sql = "SELECT * FROM sales WHERE inventory_id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        public function getOthers($id) {
            $sql = "SELECT * FROM others WHERE inventory_id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
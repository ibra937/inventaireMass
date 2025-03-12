<?php
namespace app\Models;
require 'connexionDB.php';

use PDO;

class inventory{
        private $conn;
        public function __construct(){
            global $conn;
            @$this->pdo = $conn;
        }
        public function allInventories() {
            $sql = "SELECT * FROM inventories ORDER BY created_at DESC";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $inventories = $stmt->fetchAll(PDO::FETCH_ASSOC);

            require 'app/Views/inventaire.php';
        }
        public function weeklyInventories() {
            $sql = "SELECT WEEK(date) AS semaine, COUNT(*) AS total_inventaires 
                    FROM inventories 
                    GROUP BY semaine 
                    ORDER BY semaine DESC";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $weeklyInventories = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
            require 'app/Views/inventory_weekly.php';
        }
        public function details_weekly($num) {
            $sql = "UPDATE inventories SET week = WEEK(date);";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            
            $places = ['NORD FOIRE', 'BANLIEU', 'LOUGA', 'USA', 'TOUBA', 'THIES'];
            $result = [];
            foreach( $places as $place ) {
                $totalExpenses = $this->getExpensesWeek($num, $place);
                $totalTransports = $this->getTransportsWeek($num, $place);
                $totalRepasts = $this->getRepastsWeek($num, $place);
                $totalPayments = $this->getPaymentsWeek($num, $place);
                $totalSales = $this->getSalesWeek($num, $place);
                $totalOthers = $this->getOthersWeek($num, $place);
                
                $sumOutput = $totalExpenses + $totalRepasts + $totalTransports + $totalOthers;
                $sumInput = $totalPayments + $totalSales;
                $soldeWeek = $sumInput - $sumOutput;

                $result[$place] = [
                    'sumOutput' => $sumOutput,
                    'sumInput' => $sumInput,
                    'soldeWeek' => $soldeWeek
                ];
            }
            require 'app/Views/details_week.php';
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
        public function getExpensesWeek($week, $place) {
            // 1. Récupérer la somme des dépenses (expenses)
            $sqlExpenses = "SELECT SUM(e.amount) AS total_expenses FROM expenses e JOIN inventories i ON e.inventory_id = i.id
            WHERE i.week = ? AND i.place = ?";
            $stmt = $this->pdo->prepare($sqlExpenses);
            $stmt->execute([$week, $place]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row['total_expenses'] ?? 0;
        }
        public function getTransports($id) {
            $sql = "SELECT * FROM transports WHERE inventory_id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        public function getTransportsWeek($week, $place) {
            $sqlTransports = "SELECT SUM(t.amount) AS total_transports FROM transports t JOIN inventories i ON t.inventory_id = i.id
                WHERE i.week = ? AND i.place = ?";
            $stmt = $this->pdo->prepare($sqlTransports);
            $stmt->execute([$week, $place]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row['total_transports'] ?? 0;
        }
        public function getRepast($id) {
            $sql = "SELECT * FROM repasts WHERE inventory_id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        public function getRepastsWeek($week, $place) {
            $sqlRepasts = "SELECT SUM(r.amount) AS total_repasts
              FROM repasts r
              JOIN inventories i ON r.inventory_id = i.id
              WHERE i.week = ? AND i.place = ?";
            $stmt = $this->pdo->prepare($sqlRepasts);
            $stmt->execute([$week, $place]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row['total_repasts'] ?? 0;
        }
        public function getPayments($id) {
            $sql = "SELECT * FROM payments WHERE inventory_id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        public function getPaymentsWeek($week, $place) {
            $sqlPayments = "SELECT SUM(p.amount) AS total_payments FROM payments p JOIN inventories i ON p.inventory_id = i.id
              WHERE i.week = ? AND i.place = ?";
            $stmt = $this->pdo->prepare($sqlPayments);
            $stmt->execute([$week, $place]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row['total_payments'] ?? 0;
        }
        public function getSales($id) {
            $sql = "SELECT * FROM sales WHERE inventory_id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        public function getSalesWeek($week, $place) {
            $sqlSales = "SELECT SUM(s.amount) AS total_sales FROM sales s JOIN inventories i ON s.inventory_id = i.id
              WHERE i.week = ? AND i.place = ?";
            $stmt = $this->pdo->prepare($sqlSales);
            $stmt->execute([$week, $place]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row['total_sales'] ?? 0;
        }
        public function getOthers($id) {
            $sql = "SELECT * FROM others WHERE inventory_id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        public function getOthersWeek($week, $place) {
            $sqlOthers = "SELECT SUM(o.amount) AS total_others FROM others o JOIN inventories i ON o.inventory_id = i.id
              WHERE i.week = ? AND i.place = ?";
            $stmt = $this->pdo->prepare($sqlOthers);
            $stmt->execute([$week, $place]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row['total_others'] ?? 0;
        }
    }
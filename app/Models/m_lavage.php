<?php
    namespace App\Models;
    require 'app/Models/connexionDB.php';

    use PDO;

    class MLavage {
        private $conn;

       public function __construct() {
            global $conn;
            $this->conn = $conn;
        }

        public function getLavageData() {
            require 'app/Views/lavage/lavageJour.php';
        }
    }
<?php
require 'app/Models/inventory.php';

use app\Models\inventory;

$inventaireModel = new inventory();

    if (isset($_GET['src']) && $_GET['src'] == 'inventory') {
        if (isset($_GET['id'])) {
            $inventaireModel -> showInventory($_GET['id']);
        } else {
            die("Inventaire non spécifié.");
        }
    }

    if (isset($_GET['src']) && $_GET['src'] == 'index') {
       $inventaireModel -> allInventories();
    }
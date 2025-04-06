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

    if (isset($_GET['src']) && $_GET['src'] == 'week') {
        $inventaireModel -> weeklyInventories();
    }

    if (isset($_GET['src']) && $_GET['src'] == 'inventory_weekly') {
        $inventaireModel -> details_weekly($_GET['numweek']);
    }

    if (isset($_GET['src']) && $_GET['src'] == 'manager') {
        $inventaireModel -> manager();
    }

    if (isset($_GET['src']) && $_GET['src'] == 'details_manager') {
        $inventaireModel -> managerDetails($_GET['numweek']);
    }

<?php
require_once '../Models/insert_form.php';
    use Models\insert_form;

    $insert = new insert_form();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupérer les données
        $place = $_POST["place"];
        $date = $_POST["date"];
        $risingAmounts = [];
        $risingDescs = [];
        $transportAmounts = [];
        $transportDescs = [];

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
        }
        

        $inventory_id = $insert -> insert_inventory($date, $place);
        $insert -> insert_expenses($risingAmounts, $risingDescs, $inventory_id);
        $insert -> insert_transport($transportAmounts, $transportDescs, $inventory_id);
    }
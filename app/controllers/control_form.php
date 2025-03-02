<?php
require_once 'app/Models/insert_form.php';

use app\Models\insert_form;

$insert = new insert_form();


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $insert -> insert();
    }
    require 'app/Views/formulaire.php';

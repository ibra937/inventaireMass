<?php
require_once 'app/Models/insert_form.php';

use app\Models\insert_form;

$insert = new insert_form();

    if (@$_POST['src'] == 'gerant'){
      $insert -> insert();
    }
    if (@$_POST['src'] == 'admin') {
      $insert -> insertAdmin();
    }
    require 'app/Views/formulaire.php';

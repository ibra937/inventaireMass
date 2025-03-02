<?php

use app\Models\users;

require 'app/Models/users.php';
$users = new Users();

if (empty($_POST)) {
    $users -> login();
}

if (!empty($_POST) || @$_POST['src'] == 'connexion' || $to == 'form') {
    $users -> authenticate();
}
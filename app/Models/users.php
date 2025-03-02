<?php

namespace app\Models;

class users {
    const access_key = 'nouroudarayni@2025';
    public function authenticate() {
        $key = $_POST['pass_key'];
        if ($key == self::access_key) {
            $test = 'success';
            require 'app/Views/gerant/formUsers.php';
        } else {
            $test = 'echec';
            require 'app/Views/connexion.php';
        }
    }
    public function login() {
        require 'app/Views/connexion.php';
    }
}
<?php
    // Récupérer l'URL demandée
    $request = $_SERVER['REQUEST_URI'];

    // Supprimer les paramètres GET éventuels
    $request = parse_url($request, PHP_URL_PATH);

    // Supprimer le dossier parent si nécessaire
    $request = str_replace('/inventaire', '', $request);

    // Définition des routes
    switch ($request) {
        case '/admin':
            require 'app/Views/home.html'; // Page d'accueil par défaut
            break;

        case '/form':
            require 'app/controllers/control_form.php';
            break;

        case '/inventory':
            require 'app/controllers/inventory.php';
            break;

        case '/inventory_weekly':
            require 'app/controllers/inventory.php';
            break;

        case '/details_inventory':
            require 'app/controllers/inventory.php';
            break;

        case '/details_inventory_weekly':
            require 'app/controllers/inventory.php';
            break;

        case '/details_inventory_month':
            require 'app/controllers/inventory.php';
            break;

        case '/insert_form':

            require 'app/controllers/control_form.php';
            break;

        case '/users':
            $to = 'conn';
            require 'app/controllers/users.php';
            break;

        case '/users_form':
            $to = 'form';
            require 'app/controllers/users.php';
            break;

        case '/users/form':

            require 'app/Views/gerant/formUsers.php';
            break;

        case '/manager':
            require 'app/controllers/inventory.php';
            break;

        case '/details_manager':
            require 'app/controllers/inventory.php';
            break;

        case '/inventory_month':
            require 'app/controllers/inventory.php';
            break;

        case '/lavage':
            require 'app/controllers/c_lavage.php';
            break;

        default:
            http_response_code(404);
             // Page 404 personnalisée
            require 'app/Views/404.html';
            break;
    }

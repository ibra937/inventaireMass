<?php
    // Récupérer l'URL demandée
    $request = $_SERVER['REQUEST_URI'];

    // Supprimer les paramètres GET éventuels
    $request = parse_url($request, PHP_URL_PATH);

    // Supprimer le dossier parent si nécessaire
    $request = str_replace('/inventaire', '', $request);

    // Définition des routes
    switch ($request) {
        case '/':
            require 'app/Views/home.html'; // Page d'accueil par défaut
            break;

        case '/form':
            require 'app/controllers/control_form.php';
            break;

        case '/inventory':
            require 'app/controllers/inventory.php';
            break;

        case '/details_inventory':
            require 'app/controllers/inventory.php';
            break;

        case '/insert_form':

            require 'app/controllers/control_form.php';
            break;

        default:
            http_response_code(404);
            require 'Views/404.php'; // Page 404 personnalisée
            break;
    }


<?php
    try {
        $pdo = new PDO(
            'mysql:host=localhost;
            dbname=inventaire',
            'Ibra',
            '@d.Ibra2001'
        );
        $pdo->setAttribute(
            PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION
        );
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }

<?php
    /*try {
        $pdo = new PDO(
            'mysql:host=localhost;
            dbname=nourou',
            'root',
            ''
        );
        $pdo->setAttribute(
            PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION
        );
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }*/
    $dns = 'mysql:host=185.98.131.177;dbname=nouro2507910';
    $user = 'nouro2507910';
    $pass = 'M23042003s@';
    
    try {
        $conn = new PDO($dns, $user, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }

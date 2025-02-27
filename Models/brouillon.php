<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données des dépenses
    $risingAmounts = [];
    $risingDescs = [];

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
    }

    // Afficher les données récupérées
    echo "<pre>";
    print_r($risingAmounts);
    print_r($risingDescs);
    echo "</pre>";
}


try {
    // Connexion à la base de données
    $pdo = new PDO('mysql:host=localhost;dbname=ton_base', 'ton_utilisateur', 'ton_mot_de_passe');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Insertion des données dans la base de données
    $sql = "INSERT INTO depenses (amount, description) VALUES (:amount, :description)";
    $stmt = $pdo->prepare($sql);

    // Insérer chaque dépense dans la base
    foreach ($risingAmounts as $index => $amount) {
        $stmt->execute([
            ':amount' => $amount,
            ':description' => $risingDescs[$index]
        ]);
    }

    echo "Les données ont été enregistrées avec succès!";
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

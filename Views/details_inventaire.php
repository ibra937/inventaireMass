<?php
require '../Models/connexionDB.php';

if (isset($_GET['id'])) {
    $inventory_id = $_GET['id'];

    // Récupérer les informations de l'inventaire
    $sql = "SELECT * FROM inventories WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $inventory_id]);
    $inventory = $stmt->fetch(PDO::FETCH_ASSOC);

    // Récupérer les dépenses associées à cet inventaire
    $sqlExpenses = "SELECT * FROM expenses WHERE inventory_id = :id";
    $stmtExpenses = $pdo->prepare($sqlExpenses);
    $stmtExpenses->execute([':id' => $inventory_id]);
    $expenses = $stmtExpenses->fetchAll(PDO::FETCH_ASSOC);

    // Vous pouvez récupérer d'autres informations (transports, repas, etc.) de la même manière.
} else {
    die("Inventaire non spécifié.");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Assure que la page s'adapte à la largeur de l'écran -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de l'Inventaire - <?php echo htmlspecialchars($inventory['place']); ?></title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include 'header.php'; ?>

<div class="container mt-5">
    <h2 class="text-center"><?php echo htmlspecialchars($inventory['place']); ?> - <?php echo date("l d F Y", strtotime($inventory['date'])); ?></h2>

    <h4 class="mt-4">Dépenses</h4>
    <ul class="list-group">
        <?php foreach ($expenses as $expense) : ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <span><?php echo htmlspecialchars($expense['description']); ?></span>
                <span><?php echo number_format($expense['amount'], 0, ',', ' '); ?> F</span>
            </li>
        <?php endforeach; ?>
    </ul>
    <!-- Ajoutez ici d'autres sections pour les transports, repas, etc. -->
</div>

<?php include 'footer.php'; ?>

<!-- Bootstrap JS et dépendances -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

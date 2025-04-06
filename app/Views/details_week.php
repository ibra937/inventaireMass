<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Assure que la page s'adapte à la largeur de l'écran -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de l'Inventaire - <?php echo htmlspecialchars($place); ?></title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="app/Views/css.css" rel="stylesheet">
</head>
<body>

<?php include 'header.php'; ?>

<div class="container mt-5">

    <h2 class="text-center p-5">Inventaire-Semaine <?php echo($_GET['numweek']); ?> </h2>
    <?php foreach ($result as $place => $data): ?>

    <h3 class="text-center p-5"><? echo($place) ?></h3>

    <div class="table-responsive">
    <table class="table table-bordered text-center">
            <thead class="thead-light">
            <tr>
                <th>Catégorie</th>
                <th>Montant (F CFA)</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>DÉPENSE</td>
                <td><?php echo number_format($data['totalExpenses'], 2, ',', ' '); ?> F</td>
            </tr>
            <tr>
                <td>TRANSPORT</td>
                <td><?php echo number_format($data['totalTransports'], 2, ',', ' '); ?> F</td>
            </tr>
            <tr>
                <td>REPAS</td>
                <td><?php echo number_format($data['TotalRepasts'], 2, ',', ' '); ?> F</td>
            </tr>
            <tr>
                <td>PAYEMENT</td>
                <td><?php echo number_format($data['TotalPayments'], 2, ',', ' '); ?> F</td>
            </tr>
            <tr>
                <td>VENTE</td>
                <td><?php echo number_format($data['TotalSales'], 2, ',', ' '); ?> F</td>
            </tr>
            <tr>
                <td>AUTRE</td>
                <td><?php echo number_format($data['TotalOthers'], 2, ',', ' '); ?> F</td>
            </tr>
            <tr class="font-weight-bold text-success">
                <td>TOTAL DECAISSEMENT</td>
                <td><?php echo number_format($data['sumOutput'], 2, ',', ' '); ?> F</td>
            </tr>
            <tr class="font-weight-bold text-success">
                <td>TOTAL ENCAISSEMENT</td>
                <td><?php echo number_format($data['sumInput'], 2, ',', ' '); ?> F</td>
            </tr>
            </tbody>
        </table>
    </div>

    <?php endforeach; ?>
</div>

<?php include 'footer.php'; ?>

<!-- Bootstrap JS et dépendances -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

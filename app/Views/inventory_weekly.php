<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Le meta tag viewport permet une mise en page responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Inventaires</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="app/Views/css.css" rel="stylesheet">
</head>
<body>
<?php include 'header.php'; ?>

<div class="container mt-5">
    <h1 class="mb-4 text-center p-3">Liste des Inventaires</h1>
    <div class="mb-4">
        <a class="btn btn-dark btn-sm" href="inventory?src=index">
            Journalier
        </a>
        <a class="btn btn-primary btn-sm disabled" href="inventory_weekly?src=week">
            Hebdomadaire
        </a>
        <a class="btn btn-dark btn-sm" href="inventory_month?src=month">
            Mensuel
        </a>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
            <tr class="text-center">
                <th>Numero de semaines</th>
                <th>Nbr d'inventaires</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($weeklyInventories as $inventory) : ?>
                <tr class="text-center">
                    <td>Semaine <?php echo ($inventory['semaine']); ?></td>
                    <td><?php echo htmlspecialchars($inventory['total_inventaires']); ?></td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="details_inventory_weekly?src=inventory_weekly&numweek=<?php echo $inventory['semaine']; ?>">
                            Voir les détails
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>


    </div>
</div>

<?php include 'footer.php'; ?>

<!-- Bootstrap JS et dépendances -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

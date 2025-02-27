<?php
    require '../controllers/control_inventaire.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Le meta tag viewport permet une mise en page responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Inventaires</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include 'header.php'; ?>

<div class="container mt-5">
    <h1 class="mb-4 text-center">Liste des Inventaires</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
            <tr class="text-center">
                <th>ID</th>
                <th>Entrepôt</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($inventories as $inventory) : ?>
                <tr class="text-center">
                    <td><?php echo htmlspecialchars($inventory['id']); ?></td>
                    <td><?php echo htmlspecialchars($inventory['place']); ?></td>
                    <td><?php echo date("l d F Y", strtotime($inventory['date'])); ?></td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="details_inventaire.php?id=<?php echo $inventory['id']; ?>">
                            Voir les détails
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <div>
            <ul class="pagination justify-content-center">
                <!-- Bouton "Précédent" -->
                <li class="page-item <?php echo ($page <= 1) ? 'disabled' : ''; ?>">
                    <a class="page-link" href="?page=<?php echo $page - 1; ?>">Précédent</a>
                </li>

                <!-- Afficher les numéros de pages -->
                <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                    <li class="page-item <?php echo ($i == $page) ? 'active' : ''; ?>">
                        <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                    </li>
                <?php endfor; ?>

                <!-- Bouton "Suivant" -->
                <li class="page-item <?php echo ($page >= $totalPages) ? 'disabled' : ''; ?>">
                    <a class="page-link" href="?page=<?php echo $page + 1; ?>">Suivant</a>
                </li>
            </ul>
        </div>

    </div>
</div>

<?php include 'footer.php'; ?>

<!-- Bootstrap JS et dépendances -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

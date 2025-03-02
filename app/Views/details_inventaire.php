<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Assure que la page s'adapte à la largeur de l'écran -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de l'Inventaire - <?php echo htmlspecialchars($inventory['place']); ?></title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="app/Views/css.css" rel="stylesheet">
</head>
<body>
<style>
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
    @keyframes fadeOut {
        from { opacity: 1; }
        to { opacity: 0; }
    }
    .fade-in {
        animation: fadeIn 1s forwards;
    }
    .fade-out {
        animation: fadeOut 1s forwards;
    }
</style>


<?php include 'header.php'; ?>

<div class="container mt-5">

    <h2 class="text-center p-5"><?php echo htmlspecialchars($inventory['place']); ?> - <?php echo date("l d F Y", strtotime($inventory['date'])); ?></h2>

    <div id="successMessage" class="alert alert-success" style="display: none;">
        Enregistrement réussi !
    </div>

    <div class="card col-md mt-4 mb2">
        <div class="card-header  row p2  text-center">
            <h4 class="col-md-4">Total décaissement</h4>
            <h4 class="col-md-4">Total encaissements</h4>
            <h4 class="col-md-4">Solde</h4>
        </div>
        <div class="card-body  row text-center">
            <span class="col-md-4"><?php echo number_format($sumOutput, 2,',', ' '); ?> F</span>
            <span class="col-md-4"><?php echo number_format($sumInput, 2, ',', ' '); ?> F</span>
            <span class="col-md-4"><?php echo number_format($solde, 2, ',', ' '); ?> F</span>
        </div>
    </div>
    <details class="fade-in">
    <summary class="fade-in">
    <h2 class="text-center p-5">Les details de l'inventaire</h2>
    </summary>
    <h4 class="mt-4">Dépenses</h4>
    <ul class="list-group">
        <?php foreach ($expenses as $expense) : ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <span><?php echo number_format($expense['amount'], 0, ',', ' '); ?> F</span>
                <span><?php echo htmlspecialchars($expense['description']); ?></span>
            </li>
        <?php endforeach; ?>
        <?php echo($totalExpenses); ?>
    </ul>

    <h4 class="mt-4">Transports</h4>
    <ul class="list-group">
        <?php foreach ($transports as $transport) : ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <span><?php echo number_format($transport['amount'], 0, ',', ' '); ?> F</span>
                <span><?php echo htmlspecialchars($transport['description']); ?></span>
            </li>
        <?php endforeach; ?>
    </ul>

    <h4 class="mt-4">Repas</h4>
    <ul class="list-group">
        <?php foreach ($repasts as $repast) : ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <span><?php echo number_format($repast['amount'], 0, ',', ' '); ?> F</span>
                <span><?php echo htmlspecialchars($repast['description']); ?></span>
            </li>
        <?php endforeach; ?>
    </ul>

    <h4 class="mt-4">Payements</h4>
    <ul class="list-group">
        <?php foreach ($payments as $payment) : ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <span><?php echo number_format($payment['amount'], 0, ',', ' '); ?> F</span>
                <span><?php echo htmlspecialchars($payment['description']); ?></span>
            </li>
        <?php endforeach; ?>
    </ul>

    <h4 class="mt-4">Ventes</h4>
    <ul class="list-group">
        <?php foreach ($sales as $sale) : ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <span><?php echo number_format($sale['amount'], 0, ',', ' '); ?> F</span>
                <span><?php echo htmlspecialchars($sale['description']); ?></span>
            </li>
        <?php endforeach; ?>
    </ul>

    <h4 class="mt-4">Autres</h4>
    <ul class="list-group">
        <?php foreach ($others as $other) : ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <span><?php echo number_format($other['amount'], 0, ',', ' '); ?> F</span>
                <span><?php echo htmlspecialchars($other['description']); ?></span>
            </li>
        <?php endforeach; ?>
    </ul>
    </details>
</div>

<?php include 'footer.php'; ?>

<!-- Bootstrap JS et dépendances -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Récupère les paramètres de l'URL
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.get('success') === 'true') {
            // Sélectionne l'élément de message (il doit être présent dans ton HTML)
            const successMessage = document.getElementById('successMessage');

            // Affiche le message et lance l'animation de fade-in
            successMessage.style.display = "block";
            successMessage.classList.add('fade-in');

            // Après 3 secondes, déclenche l'animation de fade-out
            setTimeout(function(){
                successMessage.classList.remove('fade-in');
                successMessage.classList.add('fade-out');
            }, 3000);

            // Après 4 secondes, masque complètement le message
            setTimeout(function(){
                successMessage.style.display = "none";
            }, 4000);
        }
</script>

</body>
</html>

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

<?php include 'app/Views/header.php'; ?>

<div class="container mt-5">
  <!--code-->
  <div class="table-responsive p-5">
      <table class="table table-bordered text-center">
          <thead class="thead-dark">
          <tr>
              <th>Total Solde</th>
              <th>Total Depenses</th>
              <th>Reste</th>
          </tr>
          </thead>
          <tbody>
          <tr>
              <td><?php echo number_format($sumOutput, 2, ',', ' '); ?> F</td>
              <td><?php echo number_format($sumInput, 2, ',', ' '); ?> F</td>
              <td><?php echo number_format($solde, 2, ',', ' '); ?> F</td>
          </tr>
          </tbody>
      </table>
  </div>

  <div class="table-responsive">
    <h3 class="text-center mt-5">Solde</h3>
  <table class="table table-bordered text-center">
      <thead class="thead-light">
          <tr>
              <th>Date</th>
              <th>Description</th>
              <th>Montant (F CFA)</th>
          </tr>
      </thead>
      <tbody>
        <?php foreach ($weeklyInventories as $inventory): ?>
          <tr>
              <td><?php echo htmlspecialchars($inventory['date']); ?></td>
              <td><?php echo htmlspecialchars($inventory['intoDesc']); ?></td>
              <td><?php echo number_format($inventory['intoAmount'], 2, ',', ' '); ?> F</td>
          </tr>
          <?php endforeach; ?>
          </tbody>
      </table>
      <h3 class="text-center mt-5">Depenses</h3>
      <table class="table table-bordered text-center">
          <thead class="thead-light">
              <tr>
                  <th>Date</th>
                  <th>Description</th>
                  <th>Montant (F CFA)</th>
              </tr>
          </thead>
          <tbody>
            <?php foreach ($weeklyInventories as $inventory): ?>
              <tr>
                  <td><?php echo htmlspecialchars($inventory['date']); ?></td>
                  <td><?php echo htmlspecialchars($inventory['outaDesc']); ?></td>
                  <td><?php echo number_format($inventory['outaAmount'], 2, ',', ' '); ?> F</td>
              </tr>
              <?php endforeach; ?>
              </tbody>
          </table>
  </div>


</div>
</body>
</html>

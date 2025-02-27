<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire Inventaire Massamba</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../index.css">
</head>
<body>
<?php include 'header.php' ?>
<div class="container mt-3">
    <h1 class="text-center h4 mb-3">Inventaire Massamba</h1>
    <div class="container mt-3">
        <h1 class="text-center h4 mb-3">Inventaire Massamba</h1>
        <form method="POST" action="../controllers/control_form.php">
            <!-- Section Entrepôt et Date -->
            <div class="row mb-2">
                <div class="col-md-6">
                    <div class="form-group mb-2">
                        <select class="form-control form-control-sm" name="place" id="place" required placeholder="Selectionner un entrepot">
                            <option disabled selected>--Selectionner un entrepot--</option>
                            <option value="Nord Foire">Nord Foire</option>
                            <option value="Banlieu">Banlieu</option>
                            <option value="Touba">Touba</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-2">
                        <input type="date" class="form-control form-control-sm" name="date" id="date" required placeholder="Date">
                    </div>
                </div>
            </div>

            <!-- Section Dépenses -->
            <div class="card mb-2">
                <div class="card-header p-2">
                    <h3 class="h6 mb-0">Dépenses</h3>
                </div>
                <div class="card-body p-2">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <input type="text" class="form-control form-control-sm" name="risingAmount1" id="risingAmount1" placeholder="Montant: 0.000">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <input type="text" class="form-control form-control-sm" name="risingDesc1" id="risingDesc1" placeholder="Description: details de la depense">
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-sm btn-primary float-right" id="moreRising">+</button>
                </div>
            </div>

            <!-- Section Transport -->
            <div class="card mb-2">
                <div class="card-header p-2">
                    <h3 class="h6 mb-0">Transport</h3>
                </div>
                <div class="card-body p-2">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <input type="text" class="form-control form-control-sm" name="transportAmount1" id="transportAmount1" placeholder="Montant: 0.000">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <input type="text" class="form-control form-control-sm" name="transportDesc1" id="transportDesc1" placeholder="Description: details de la depense">
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-sm btn-primary float-right">+</button>
                </div>
            </div>

            <!-- Section Repas -->
            <div class="card mb-2">
                <div class="card-header p-2">
                    <h3 class="h6 mb-0">Repas</h3>
                </div>
                <div class="card-body p-2">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <input type="text" class="form-control form-control-sm" name="repastAmount1" id="repastAmount1" placeholder="Montant: 0.000">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <input type="text" class="form-control form-control-sm" name="repastDesc1" id="repastDesc1" placeholder="Description: details de la depense">
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-sm btn-primary float-right">+</button>
                </div>
            </div>

            <!-- Section Autres -->
            <div class="card">
                <div class="card-header">
                    <h3 class="h6 mb-0">Autres</h3>
                </div>
                <div class="card-body p-2">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <input type="text" class="form-control form-control-sm" name="OtherAmount1" id="OtherAmount1" placeholder="Montant: 0.000">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <input type="text" class="form-control form-control-sm" name="OtherDesc1" id="OtherDesc1" placeholder="Description: details de la depense">
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-sm btn-primary float-right">+</button>
                </div>
            </div>

            <!-- Bouton Enregistrer -->
            <div class="text-center mt-3">
                <button type="submit" class="btn btn-success btn-sm">Enregistrer</button>
            </div>
        </form>
    </div>

</div>

<?php include 'footer.php'; ?>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="form.js"></script>
</body>
</html>
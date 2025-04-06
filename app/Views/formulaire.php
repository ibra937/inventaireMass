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
    <link href="app/Views/css.css" rel="stylesheet">
</head>
<body style="background: #efefef;">
  <style>
    body {
        background: #efefef;
    }
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
<?php include 'header.php' ?>
    <div class="container mt-3">
        <h1 class="text-center h4 mb-0 p-2 ">Inventaire NourouDarayni</h1>
        <div class="container mt-3">
        <h1 class="text-center h4 mt-3 mb-3 p-3 ">Inventaire NourouDarayni</h1>
        <?php
            if (@$test == 'success') {
                echo ("
                    <div id='successMessage' class='alert alert-success' role='alert' style='display: none;'>
                        Clé d'acces correct
                    </div>
                    ");
            } else {
                echo ("
                    <div id='successMessage' class='alert alert-success' style='display: none;'>
                        Enregistrement réussi !
                    </div>
                ");
            }
        ?>
        <form id="myForm" method="POST" action="insert_form" class="text-center">
            <!-- Section Date -->
            <div class="card mb2 ">
                <div class="card-header p2">
                    <h3 class="h6 mb-0">Date</h3>
                </div>
                <div class="card-body p-2">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group mb-2">
                                <input type="date" class="form-control form-control-sm" name="date" id="date" required placeholder="Date">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section Entree -->
            <div class="card mb-2 mt-2">
                <div class="card-header p-2">
                    <h3 class="h6 mb-0">Solde</h3>
                </div>
                <div class="card-body p-2" id="into">
                    <div class="row" id="blockInto">
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <input type="text" class="form-control form-control-sm" name="intoAmount1" id="intoAmount1" placeholder="Montant: 0.000">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <input type="text" class="form-control form-control-sm" name="intoDesc1" id="intDesc1" placeholder="Description: details du solde">
                            </div>
                        </div>
                    </div>
                </div>
                    <button  type="button" class="btn btn-sm float-right" id="moreInto">+</button>
            </div>


            <!-- Section Sortie -->
            <div class="card">
                <div class="card-header">
                    <h3 class="h6 mb-0">Depenses</h3>
                </div>
                <div class="card-body p-2" id="outa">
                    <div class="row" id="blockOuta">
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <input type="text" class="form-control form-control-sm" name="outaAmount1" id="outaAmount1" placeholder="Montant: 0.000">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <input type="text" class="form-control form-control-sm" name="outaDesc1" id="outaDesc1" placeholder="Description: details de la depense">
                            </div>
                        </div>
                    </div>
                </div>
                    <button type="button" class="btn btn-sm float-right" id="moreOuta">+</button>
            </div>


            <!-- message de confirmation -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-center" id="exampleModalLabel">Confirmation</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Vous allez enregistrer un inventaire ! Assurez-vous que tout est bien remplit.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-alert" data-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-success" id="confirmSubmit">Sauvegarder</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bouton Enregistrer -->
            <div class="text-center mt-3">
                <input type="hidden" name="src" value="admin">
                <button type="button" id="submit" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal">Enregistrer</button>
            </div>
        </form>
    </div>


<?php include 'footer.php'; ?>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="app/Views/admin/formAdmin.js"></script>
</body>
</html>

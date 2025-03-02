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
<body style="">
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
<div class="container mt-3">
    <h1 class="text-center h4 mb-3">Inventaire Nouroudarayni</h1>
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
            <!-- Section Entrepôt et Date -->
            <div class="card mb2 ">
                <div class="card-header p2">
                    <h3 class="h6 mb-0">Date et Place</h3>
                </div>
                <div class="card-body p-2">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <select class="form-control form-control-sm" name="place" id="place" required>
                                    <option value="" disabled selected>--Selectionner un entrepot--</option>
                                    <option value="NORD FOIRE">NORD FOIRE</option>
                                    <option value="BANLIEU">BANLIEU</option>
                                    <option value="USA">USA</option>
                                    <option value="TOUBA">TOUBA</option>
                                    <option value="LOUGA">LOUGA</option>
                                    <option value="THIES">THIES</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <input type="date" class="form-control form-control-sm" name="date" id="date" required placeholder="Date">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section Dépenses -->
            <div class="card mb-2 mt-2">
                <div class="card-header p-2">
                    <h3 class="h6 mb-0">Dépenses</h3>
                </div>
                <div class="card-body p-2" id="rising">
                    <div class="row" id="blockRising">
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
                </div>
                    <button  type="button" class="btn btn-sm float-right" id="moreRising">+</button>
            </div>

            <!-- Section Transport -->
            <div class="card mb-2">
                <div class="card-header p-2">
                    <h3 class="h6 mb-0">Transport</h3>
                </div>
                <div class="card-body p-2" id="transport">
                    <div class="row" id="blockTransport">
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
                </div>
                    <button type="button" class="btn btn-sm float-right" id="moreTransport">+</button>
            </div>

            <!-- Section Repas -->
            <div class="card mb-2">
                <div class="card-header p-2">
                    <h3 class="h6 mb-0">Repas</h3>
                </div>
                <div class="card-body p-2" id="repast">
                    <div class="row" id="blockRepast">
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
                </div>
                    <button type="button" class="btn btn-sm float-right" id="moreRepast">+</button>
            </div>

            <!-- Section payement -->
            <div class="card mb-2">
                <div class="card-header p-2">
                    <h3 class="h6 mb-0">Payements</h3>
                </div>
                <div class="card-body p-2" id="payment">
                    <div class="row" id="blockPayment">
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <input type="text" class="form-control form-control-sm" name="paymentAmount1" id="paymentAmount1" placeholder="Montant: 0.000">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <input type="text" class="form-control form-control-sm" name="paymentDesc1" id="paymentDesc1" placeholder="Description: details de la depense">
                            </div>
                        </div>
                    </div>
                </div>
                    <button type="button" class="btn btn-sm float-right" id="morePayment">+</button>
            </div>

            <!-- Section Ventes -->
            <div class="card mb-2">
                <div class="card-header p-2">
                    <h3 class="h6 mb-0">Ventes</h3>
                </div>
                <div class="card-body p-2" id="sales">
                    <div class="row" id="blockSales">
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <input type="text" class="form-control form-control-sm" name="salesAmount1" id="salesAmount1" placeholder="Montant: 0.000">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <input type="text" class="form-control form-control-sm" name="salesDesc1" id="salesDesc1" placeholder="Description: details de la depense">
                            </div>
                        </div>
                    </div>
                </div>
                    <button type="button" class="btn btn-sm float-right" id="moreSales">+</button>
            </div>

            <!-- Section Autres -->
            <div class="card">
                <div class="card-header">
                    <h3 class="h6 mb-0">Autres</h3>
                </div>
                <div class="card-body p-2" id="other">
                    <div class="row" id="blockOther">
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <input type="text" class="form-control form-control-sm" name="otherAmount1" id="otherAmount1" placeholder="Montant: 0.000">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <input type="text" class="form-control form-control-sm" name="otherDesc1" id="otherDesc1" placeholder="Description: details de la depense">
                            </div>
                        </div>
                    </div>
                </div>
                    <button type="button" class="btn btn-sm float-right" id="moreOther">+</button>
            </div>
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
                <input type="hidden" name="src" value="gerant">
                <button type="button" id="submit" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal">Enregistrer</button>
            </div>
        </form>
    </div>

</div>

<?php include 'app/Views/footer.php'; ?>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="app/Views/form.js"></script>
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
            }, 6000);

            // Après 4 secondes, masque complètement le message
            setTimeout(function(){
                successMessage.style.display = "none";
            }, 7000);
        }
    });

</script>
</body>
</html>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
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

<div class="container d-flex flex-column align-items-center  justify-content-center mb-4" style="height: 100vh">
    <h1 class="text-center mb-5">CLE D'ACCES AU FORMULAIRE</h1>
    <?php
        if (@$test == 'echec') {
            echo (
                    "<div class='alert alert-danger alert-dismissible fade show' id='successMessage' role='alert'>Clé d'acces incorrect</div>"
            );
        } else {
            echo ("
                <div id='successMessage' class='alert alert-success' style='display: none;'>
                    Enregistrement réussi !
                </div>
            ");
        }
    ?>
    <!-- Formulaire d'inscription -->
    <form id="registrationForm" method="POST" action="users">
        <!-- Champ Pass Key -->
        <div class="mb-3 mt-5 mb-5">
            <label for="pass_key" class="form-label">Entrez votre clé d'accès</label>
            <input type="text" name="pass_key" id="pass_key" class="form-control" maxlength="18" required>
            <small class="form-text text-muted">Le clé d'accès vous a normalement été envoyé!.</small>
        </div>

        <!-- Bouton d'enregistrement -->
        <div class="text-center mt-5">
            <input type="hidden" name="src" value="connexion">
            <button type="submit" class="btn btn-success mt-5" data-bs-toggle="modal" data-bs-target="#confirmationModal">Se connecter</button>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const successMessage = document.getElementById('successMessage');
        if (successMessage) {
            // Afficher le message et appliquer l'animation fade-in
            successMessage.style.display = "block";
            successMessage.classList.add('fade-in');

            // Après 3 secondes, démarrer l'animation fade-out
            setTimeout(function(){
                successMessage.classList.remove('fade-in');
                successMessage.classList.add('fade-out');
            }, 3000);

            // Masquer complètement le message après l'animation fade-out (1 seconde)
            setTimeout(function(){
                successMessage.style.display = "none";
            }, 4000);
        }
    })
</script>
</body>
</html>


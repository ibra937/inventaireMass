
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Inventaire</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            background: #f8f9fa;
        }
        .sidebar {
            min-width: 220px;
            max-width: 220px;
            background: #343a40;
            color: #fff;
            min-height: 100vh;
            transition: left 0.3s;
        }
        .sidebar .nav-link {
            color: #adb5bd;
        }
        .sidebar .nav-link.active, .sidebar .nav-link:hover {
            color: #fff;
            background: #495057;
        }
        .content {
            padding: 2rem;
        }
        .navbar {
            background: #fff;
            box-shadow: 0 2px 4px rgba(0,0,0,0.03);
        }
        @media (max-width: 991.98px) {
            .sidebar {
                position: fixed;
                left: -220px;
                top: 56px;
                height: calc(100% - 56px);
                z-index: 1040;
            }
            .sidebar.show {
                left: 0;
            }
            .content {
                padding: 1rem;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand navbar-light sticky-top">
        <div class="container-fluid">
            <button class="btn btn-outline-secondary d-lg-none me-2" id="sidebarToggle">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand fw-bold" href="#">Inventaire Dashboard</a>
            <div class="d-flex align-items-center">
                <span class="me-3">Bienvenue, Utilisateur</span>
                <a href="connexion.php" class="btn btn-outline-secondary btn-sm">Déconnexion</a>
            </div>
        </div>
    </nav>
    <div class="d-flex">
        <nav class="sidebar d-flex flex-column p-3" id="sidebarMenu">
            <h5 class="mb-4">Navigation</h5>
            <ul class="nav nav-pills flex-column mb-auto">
                <li><a href="dashboard.php" class="nav-link active">Dashboard</a></li>
                <li><a href="inventaire.php" class="nav-link">Inventaire</a></li>
                <li><a href="formulaire.php" class="nav-link">Ajouter Produit</a></li>
                <li><a href="inventory_month.php" class="nav-link">Inventaire Mensuel</a></li>
                <li><a href="inventory_weekly.php" class="nav-link">Inventaire Hebdomadaire</a></li>
                <li><a href="details_inventaire.php" class="nav-link">Détails Inventaire</a></li>
                <li><a href="admin/manager.php" class="nav-link">Gestion Admin</a></li>
                <li><a href="gerant/formUsers.php" class="nav-link">Utilisateurs</a></li>
                <li><a href="lavage/lavageJour.php" class="nav-link">Lavage du Jour</a></li>
            </ul>
        </nav>
        <main class="content flex-fill">
            <h2 class="mb-4">Vue d’ensemble</h2>
            <div class="row g-4">
                <div class="col-md-4 col-12">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Produits en stock</h5>
                            <p class="card-text display-6 fw-bold text-primary">120</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Alertes de stock</h5>
                            <p class="card-text display-6 fw-bold text-danger">5</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Utilisateurs actifs</h5>
                            <p class="card-text display-6 fw-bold text-success">8</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-5">
                <h4>Statistiques récentes</h4>
                <div class="card shadow-sm">
                    <div class="card-body">
                        <p>Graphique ou tableau ici (à intégrer avec Chart.js ou autre selon besoin).</p>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Sidebar toggle for mobile
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            document.getElementById('sidebarMenu').classList.toggle('show');
        });
        // Optional: close sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            var sidebar = document.getElementById('sidebarMenu');
            var toggle = document.getElementById('sidebarToggle');
            if (window.innerWidth < 992 && sidebar.classList.contains('show')) {
                if (!sidebar.contains(event.target) && !toggle.contains(event.target)) {
                    sidebar.classList.remove('show');
                }
            }
        });
    </script>
</body>
</html>
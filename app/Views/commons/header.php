<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Adhérents</title>
    <link rel="stylesheet" href="<?= base_url('/bootstrap.css') ?>">
    <link rel="stylesheet" href="<?= base_url('/style.css') ?>">
    <script src="<?= base_url('/bootstrap.js') ?>"></script>
</head>
<body>
<header>
    <nav class="navbar bg-dark navbar-expand-lg border-body" data-bs-theme="dark">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="/membre/inscription">Inscrire un Membre</a></li>
                <li class="nav-item"><a class="nav-link" href="/groupe/creer">Créer un Groupe</a></li>
                <li class="nav-item"><a class="nav-link" href="/materiel/ajouter">Ajouter du Matériel</a></li>
                <li class="nav-item"><a class="nav-link" href="/commande">Passer une Commande</a></li>
            </ul>

            <?php if(session()->get('isLoggedIn')): ?>
                <!-- Alignement à droite pour le nom, prénom et le lien de déconnexion -->
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <span class="nav-link">
                            <?= session()->get('prenom') . ' ' . session()->get('nom') ?>
                        </span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/membre/deconnexion">Déconnexion</a>
                    </li>
                </ul>
            <?php endif; ?>
        </div>
    </nav>
</header>


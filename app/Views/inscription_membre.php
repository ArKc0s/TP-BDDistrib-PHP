<?= $this->include('commons/header') ?>

<div class="container">
    <h2>Inscription de Membre</h2>
    <form action="/membre/inscription" method="post">
        <div class="form-group">
            <label for="nom">Nom:</label>
            <input type="text" id="nom" name="nom" class="form-control">
        </div>

        <div class="form-group">
            <label for="prenom">Prénom:</label>
            <input type="text" id="prenom" name="prenom" class="form-control">
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" class="form-control">
        </div>

        <!-- Autres champs selon besoin -->

        <button type="submit" class="btn">Inscrire</button>
    </form>
</div>

<?= $this->include('commons/footer') ?>


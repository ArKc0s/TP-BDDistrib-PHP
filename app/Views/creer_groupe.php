<?= $this->include('commons/header') ?>

<div class="container mt-1">
    <h2>Création de Groupe</h2>
    <form action="/chemin/creation_groupe" method="post">
        <div class="form-group">
            <label for="nom_groupe">Nom du Groupe:</label>
            <input type="text" id="nom_groupe" name="nom_groupe" class="form-control">
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea id="description" name="description" class="form-control"></textarea>
        </div>

        <!-- Ajouter d'autres champs au besoin -->

        <button type="submit" class="btn btn-success">Créer Groupe</button>
    </form>

</div>

<?= $this->include('commons/footer') ?>


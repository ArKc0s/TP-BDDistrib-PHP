<?= $this->include('commons/header') ?>

<div class="container mt-1">
    <h2>Ajout de Matériel</h2>
    <form action="/ajout_materiel" method="post">
        <div class="form-group">
            <label for="nom_materiel">Nom du Matériel:</label>
            <input type="text" id="nom_materiel" name="nom_materiel" class="form-control">
        </div>

        <div class="form-group">
            <label for="type">Description:</label>
            <input type="text" id="type" name="type" class="form-control">
        </div>

        <div class="form-group">
        <label for="quantite">Quantité:</label>
        <input type="number" id="quantite" name="quantite" class="form-control">
        </div>

        <!-- Ajouter d'autres champs au besoin -->

        <button type="submit" class="btn btn-success">Ajouter Matériel</button>
    </form>
</div>
<?= $this->include('commons/footer') ?>
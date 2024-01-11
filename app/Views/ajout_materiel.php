<?= $this->include('commons/header') ?>

    <form action="/chemin/ajout_materiel" method="post">
        <label for="nom_materiel">Nom du Matériel:</label>
        <input type="text" id="nom_materiel" name="nom_materiel">

        <label for="type">Type:</label>
        <input type="text" id="type" name="type">

        <label for="quantite">Quantité:</label>
        <input type="number" id="quantite" name="quantite">

        <!-- Ajouter d'autres champs au besoin -->

        <button type="submit">Ajouter Matériel</button>
    </form>

<?= $this->include('commons/footer') ?>
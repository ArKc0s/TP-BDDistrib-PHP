<?= $this->include('commons/header') ?>

    <form action="/chemin/creation_groupe" method="post">
        <label for="nom_groupe">Nom du Groupe:</label>
        <input type="text" id="nom_groupe" name="nom_groupe">

        <label for="description">Description:</label>
        <textarea id="description" name="description"></textarea>

        <!-- Ajouter d'autres champs au besoin -->

        <button type="submit">Créer Groupe</button>
    </form>

<?= $this->include('commons/footer') ?>


<?= $this->include('commons/header') ?>

<div class="container mt-1">
    <h2>Création de Groupe</h2>
    <form action="/api/groupe/creation" method="post">
        <div class="form-group">
            <label for="nom_groupe">Numéro du Groupe:</label>
            <input type="text" id="num_groupe" name="num_groupe" class="form-control" value="<?= $next_num ?>" readonly>
        </div>

        <div class="form-group">
            <label for="nom_groupe">Nom du Groupe:</label>
            <input type="text" id="nom_groupe" name="nom_groupe" class="form-control">
        </div>

        <div class="form-group">
            <label for="description">Ville:</label>
            <select id="ville" name="ville" class="form-control">
                <?php foreach($villes as $v):?>
                    <option value="<?= $v["_id"] ?>"><?= $v["nom"] . " (" . $v["code_postal"] . ")" ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Créer Groupe</button>
    </form>

</div>

<?= $this->include('commons/footer') ?>


<?= $this->include('commons/header') ?>

<div class="container mt-1">
    <h2>Ajout de Matériel</h2>
    <form action="/api/materiel/ajout" method="post">
        <div class="form-group">
            <label for="marque">Marque:</label>
            <input type="text" id="marque" name="marque" class="form-control">
        </div>

        <div class="form-group">
            <label for="modele">Modèle:</label>
            <input type="text" id="modele" name="modele" class="form-control">
        </div>

        <div class="form-group">
            <label for="group">Numéro du groupe:</label>
            <select id="group" name="group" class="form-control">
                <?php foreach($groupes as $g):?>
                    <option value="<?= $g["_id"] ?>"><?= $g["nom"] . " (" . $g["numero_groupe"] . ")" ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="type">Type:</label>
            <select id="type" name="type" class="form-control">
                <option value="Screen">Ecran</option>
                <option value="Keyboard">Clavier</option>
                <option value="Mouse">Souris</option>
                <option value="Laptop">Ordinateur Portable</option>
                <option value="Desktop">Tour d'ordinateur</option>
                <option value="Printer">Imprimante</option>
                <option value="Scanner">Scanner</option>
                <option value="Projector">Projecteur</option>
                <option value="Server">Serveur</option>
                <option value="Speaker">Enceinte</option>
                <option value="Other">Autre...</option>
            </select>
        </div>

        <div class="form-group">
            <label for="numeroDeSerie">Numéro de série:</label>
            <input type="text" id="numeroDeSerie" name="numeroDeSerie" class="form-control">
        </div>

        <div class="form-group">
            <label for="prix">Prix:</label>
            <input type="number" id="prix" name="prix" class="form-control">
        </div>

        <!-- Ajouter d'autres champs au besoin -->

        <button type="submit" class="btn btn-success">Ajouter Matériel</button>
    </form>
</div>
<?= $this->include('commons/footer') ?>
<?= $this->include('commons/header') ?>

<div class="container mt-1">
    <h2>Historique des commandes</h2>
    <form action="/historique" method="post">
        <div class="row">

        <div class="form-group">
            <label for="nom_matos">Matériel:</label>
            <input type="text" id="nom_matos" name="nom_matos" class="form-control">
        </div>

        </div>

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="client">Membre Client:</label>
                    <input type="text" id="client" name="client" class="form-control">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="actif">Membre Actif:</label>
                    <input type="text" id="actif" name="actif" class="form-control">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="date_debut">Date de Début:</label>
                    <input type="date" id="date_debut" name="date_debut" class="form-control">
                </div>
            </div>
            <div class="col">

                <div class="form-group">
                    <label for="date_fin">Date de Fin:</label>
                    <input type="date" id="date_fin" name="date_fin" class="form-control">
                </div>

            </div>
        </div>

        <button type="submit" class="btn btn-success">Rechercher</button>
    </form>

    <?php if (!empty($commandes)) : ?>
        <table class="table" border="1">
            <thead>
                <tr>
                    <th>ID Commande</th>
                    <th>ID Membre Client</th>
                    <th>ID Membre Actif</th>
                    <th>Date</th>
                    <th>Liste</th>
                    <th>Prix Total</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($commandes as $commande) : ?>
                    <tr>
                        <td><?= $commande['_id'] ?></td>
                        <td><?= $commande['id_membre_client'] ?></td>
                        <td><?= $commande['id_membre_actif'] ?></td>
                        <td><?= $commande['date']->toDateTime()->format('Y-m-d H:i:s') ?></td>
                        <td><?= implode(', ', iterator_to_array($commande['list'])) ?></td>
                        <td><?= $commande['prix_total'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <p>Aucune commande trouvée pour les 10 dernières années.</p>
    <?php endif; ?>

</div>

<?= $this->include('commons/footer') ?>


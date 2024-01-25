<?= $this->include('commons/header') ?>

<div class="container mt-1">
    <h2>Inscription de Membre</h2>
    <?php if(isset($validation)):?>
        <div class="alert alert-warning">
            <?= $validation->listErrors() ?>
        </div>
    <?php endif;?>
    <form action="<?php echo base_url('store'); ?>" method="post">

        <!-- Champ Actif -->
        <div class="form-group">
            <label for="actif">Actif:</label>
            <select id="actif" name="actif" class="form-control" required>
                <option value="">Sélectionner...</option>
                <option value="oui">Oui</option>
                <option value="non">Non</option>
            </select>
        </div>

        <!-- Champ Numéro de Groupe -->
        <div class="form-group">
            <label for="numerogroupe">Numéro de Groupe:</label>
            <select id="numerogroupe" name="numerogroupe" class="form-control" required>
                <option value="">Sélectionner le groupe...</option>
                <!-- Suppose que tu as un tableau $groupes quelque part dans ton code PHP -->
                <?php foreach ($groupes as $groupe): ?>
                    <option value="<?= $groupe['id'] ?>"><?= $groupe['nom'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Champ Nom -->
        <div class="form-group">
            <label for="nom">Nom:</label>
            <input type="text" id="nom" name="nom" class="form-control" required minlength="2" maxlength="50">
        </div>

        <!-- Champ Prénom -->
        <div class="form-group">
            <label for="prenom">Prénom:</label>
            <input type="text" id="prenom" name="prenom" class="form-control" required minlength="2" maxlength="50">
        </div>

        <!-- Champ Adresse -->
        <div class="form-group">
            <label for="adresse">Adresse:</label>
            <input type="text" id="adresse" name="adresse" class="form-control" required minlength="2" maxlength="100">
        </div>

        <!-- Champ Ville -->
        <div class="form-group">
            <label for="ville">Ville:</label>
            <select id="ville" name="ville" class="form-control" required>
                <option value="">Sélectionner la ville...</option>
                <?php foreach ($villes as $ville): ?>
                    <option value="<?= $ville['id'] ?>"><?= $ville['nom'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Champ Email -->
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" class="form-control" required minlength="4" maxlength="100">
        </div>

        <!-- Champ Mot de Passe -->
        <div class="form-group">
            <label for="password">Mot de Passe:</label>
            <input type="password" id="password" name="password" class="form-control" required minlength="4" maxlength="50">
        </div>

        <!-- Champ Confirmation du Mot de Passe -->
        <div class="form-group">
            <label for="confirmpassword">Confirmer le Mot de Passe:</label>
            <input type="password" id="confirmpassword" name="confirmpassword" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Inscrire</button>
    </form>
</div>

<?= $this->include('commons/footer') ?>


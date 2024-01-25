<?= $this->include('commons/header') ?>

<div class="container mt-1">
    <h2>Connexion</h2>

    <?php if(session()->getFlashdata('msg')):?>
        <div class="alert alert-warning">
            <?= session()->getFlashdata('msg') ?>
        </div>
    <?php endif;?>

    <form action="/loginAuth" method="post">

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

        <button type="submit" class="btn btn-primary">Se Connecter</button>
    </form>
</div>

<?= $this->include('commons/footer') ?>

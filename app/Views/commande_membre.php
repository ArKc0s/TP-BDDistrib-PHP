<?= $this->include('commons/header') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passer une commande</title>
</head>
<body>
    <h2>Formulaire de Commande</h2>
    <form action="traitement_commande.php" method="post">
    <div class="form-group">
        <label for="membre_commande">Membre qui passe la commande:</label>
        <input type="text" id="membre_commande" name="membre_commande" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="membre_client">Client:</label>
        <input type="text" id="membre_client" name="membre_client" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="date_commande">Date de Commande:</label>
        <input type="date" name="date_commande" required>
    </div>
    <div class="form-group">
        <label for="list_materiel">Matériel:</label>
        <input type="text" id="list_materiel" name="list_materiel" class="form-control" required>
    </div>
        <input type="submit" value="Passer la commande">
    </form>
</body>
</html>


<?= $this->include('commons/footer') ?>


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
               
        <label for="date_commande">Date de Commande:</label>
        <input type="date" name="date_commande" required><br>

        <label for="quantite">Quantité:</label>
        <input type="number" name="quantite" required><br>

        <input type="submit" value="Passer la commande">
    </form>
</body>
</html>


<?= $this->include('commons/footer') ?>


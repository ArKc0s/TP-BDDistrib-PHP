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
        <?php
        // Connexion à la base de données MongoDB (à adapter selon votre configuration)
        $client = new MongoDB\Client("mongodb://localhost:27017");
        $db = $client->selectDatabase("votre_base_de_donnees");

        // Récupérer la liste des membres pour la liste déroulante
        $membresCollection = $db->selectCollection("membres");
        $membresCursor = $membresCollection->find([], ['projection' => ['nom' => 1]]);
        
        echo '<label for="id_membre">Sélectionnez le Membre:</label>';
        echo '<select name="id_membre" required>';
        
        // Afficher chaque membre comme une option dans la liste déroulante
        foreach ($membresCursor as $membre) {
            echo '<option value="' . $membre["_id"] . '">' . $membre["nom"] . '</option>';
        }

        echo '</select><br>';
        
        // Récupérer les noms de matériel depuis la base de données MongoDB
        $materielsCollection = $db->selectCollection("materiels");
        $materielsCursor = $materielsCollection->find([], ['projection' => ['nom_materiel' => 1, 'prix' => 1]]);
        
        echo '<label for="materiaux">Choisissez un Matériel:</label>';
        echo '<select name="materiaux[]" multiple required>';
        
        // Afficher chaque matériel comme une option dans la liste déroulante
        foreach ($materielsCursor as $materiel) {
            echo '<option value="' . $materiel["_id"] . '">' . $materiel["nom_materiel"] . ' - Prix: ' . $materiel["prix"] . '</option>';
        }

        echo '</select><br>';
        ?>
        
        <label for="date_commande">Date de Commande:</label>
        <input type="date" name="date_commande" required><br>

        <label for="quantite">Quantité:</label>
        <input type="number" name="quantite" required><br>

        <input type="submit" value="Passer la commande">
    </form>
</body>
</html>


<?= $this->include('commons/footer') ?>


<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use App\Models\Ville;
use App\Models\Groupe;
use App\Models\Materiel;
use App\Models\Membre;
use App\Models\Commande;
use \MongoDB\BSON\UTCDateTime;

class PopulateDB extends BaseCommand
{
    /**
     * The Command's Group
     *
     * @var string
     */
    protected $group = 'custom';

    /**
     * The Command's Name
     *
     * @var string
     */
    protected $name = 'populate:database';

    /**
     * The Command's Description
     *
     * @var string
     */
    protected $description = 'Populate MongoDB database with sample data';

    /**
     * Actually execute a command.
     *
     * @param array $params
     */
    public function run(array $params)
    {
        $this->showMessage("Populating database...");

        $villeModel = new Ville();
        $groupeModel = new Groupe();
        $materielModel = new Materiel();
        $membreModel = new Membre();
        $commandeModel = new Commande();
        

        // Ajout de villes dans la base de données
        $parisId = $this->addSampleVille($villeModel, 'Paris', 75000);
        $marseilleId = $this->addSampleVille($villeModel, 'Marseille', 13000);

        $toulouseId = $this->addSampleVille($villeModel, 'Toulouse', 31000);
        $valenciennesId = $this->addSampleVille($villeModel, 'Valenciennes', 59300);
        $savignyId = $this->addSampleVille($villeModel, 'Savigny-le-temple', 77176);
        $beuvryId = $this->addSampleVille($villeModel, 'Beuvry', 62660);
        $carnieresId = $this->addSampleVille($villeModel, 'Carnières', 59217);



        // Add sample groups
        $group1Id = $this->addSampleGroupe($groupeModel, '001', 'Group 1', $parisId);
        $group2Id = $this->addSampleGroupe($groupeModel, '002', 'Group 2', $marseilleId);
        $group3Id = $this->addSampleGroupe($groupeModel, '003', 'Group 3', $toulouseId);
        $group4Id = $this->addSampleGroupe($groupeModel, '004', 'Group 4', $valenciennesId);
        $group5Id = $this->addSampleGroupe($groupeModel, '005', 'Group 5', $savignyId);
        $group6Id = $this->addSampleGroupe($groupeModel, '006', 'Group 6', $beuvryId);
        $group7Id = $this->addSampleGroupe($groupeModel, '007', 'Group 7', $carnieresId);



        // Add sample materials
        $this->addSampleMateriel($materielModel, $group1Id, 'ABC123', 'Brand A', 'Model X', 'Type 1', 100.50);

        $this->addSampleMateriel($materielModel, $group2Id, 'DEF456', 'Brand B', 'Model Y', 'Type 2', 150.75);
        $this->addSampleMateriel($materielModel, $group3Id, 'GHI789', 'Brand C', 'Model Z', 'Type 3', 200.00);
        $this->addSampleMateriel($materielModel, $group4Id, 'JKL012', 'Brand D', 'Model A', 'Type 4', 250.25);
        $this->addSampleMateriel($materielModel, $group5Id, 'MNO345', 'Brand E', 'Model B', 'Type 5', 300.50);
        $this->addSampleMateriel($materielModel, $group6Id, 'PQR678', 'Brand F', 'Model C', 'Type 6', 350.75);
        $this->addSampleMateriel($materielModel, $group7Id, 'STU901', 'Brand G', 'Model D', 'Type 7', 400.00);
        $this->addSampleMateriel($materielModel, $group1Id, 'VWX234', 'Brand H', 'Model E', 'Type 8', 450.25);
        $this->addSampleMateriel($materielModel, $group2Id, 'YZA567', 'Brand I', 'Model F', 'Type 9', 500.50);
        $this->addSampleMateriel($materielModel, $group3Id, 'BCD890', 'Brand J', 'Model G', 'Type 10', 550.75);
        $this->addSampleMateriel($materielModel, $group4Id, 'EFG123', 'Brand K', 'Model H', 'Type 11', 600.00);
        $this->addSampleMateriel($materielModel, $group5Id, 'HIJ456', 'Brand L', 'Model I', 'Type 12', 650.25);
        $this->addSampleMateriel($materielModel, $group6Id, 'KLM789', 'Brand M', 'Model J', 'Type 13', 700.50);
        $this->addSampleMateriel($materielModel, $group7Id, 'NOP012', 'Brand N', 'Model K', 'Type 14', 750.75);


        // Add sample members
        $member1Id = $this->addSampleMembre($membreModel, $group1Id, 'John', 'Doe', '123 Main St', 'Paris', 'john@example.com', true, 'password123');
        $member2Id = $this->addSampleMembre($membreModel, $group2Id, 'Jane', 'Doe', '456 Oak St', 'Marseille', 'jane@example.com', true, 'password456');

        $member3Id = $this->addSampleMembre($membreModel, $group3Id, 'Bob', 'Smith', '789 Elm St', 'Toulouse', 'bob@example.com', true, 'password789');
        $member4Id = $this->addSampleMembre($membreModel, $group4Id, 'Mary', 'Smith', '012 Pine St', 'Valenciennes', 'mary@example.com', true, 'password012');
        $member5Id = $this->addSampleMembre($membreModel, $group5Id, 'Mike', 'Jones', '345 Cedar St', 'Savigny-le-temple', 'mike@example.com', true, 'password345');

        // Add sample orders
        $this->addSampleCommande($commandeModel, $member1Id, $member2Id, new UTCDateTime(strtotime('now')), ['ABC123'], 251.25);
        $this->addSampleCommande($commandeModel, $member2Id, $member3Id, new UTCDateTime(strtotime('now')), ['GHI789', 'JKL012'], 450.25);
        $this->addSampleCommande($commandeModel, $member3Id, $member4Id, new UTCDateTime(strtotime('now')), ['MNO345', 'PQR678'], 650.25);
        $this->addSampleCommande($commandeModel, $member4Id, $member5Id, new UTCDateTime(strtotime('now')), ['STU901', 'VWX234'], 850.25);
        $this->addSampleCommande($commandeModel, $member5Id, $member1Id, new UTCDateTime(strtotime('now')), ['YZA567', 'BCD890'], 1050.25);



        $this->showMessage("Database populated successfully.");
    }

    protected function addSampleVille(Ville $model, string $nom, int $codePostal)
    {
        $model->createVille($nom, $codePostal);
        $this->showMessage("Added city: $nom, Code Postal: $codePostal");

        // Return the newly created city's ID
        return $model->getOne(['nom' => $nom])['_id'];
    }

    protected function addSampleGroupe(Groupe $model, string $numeroGroupe, string $nom, string $villeId)
    {
        $model->createGroupe($numeroGroupe, $nom, $villeId);
        $this->showMessage("Added group: $numeroGroupe, Name: $nom, Ville ID: $villeId");

        // Return the newly created group's ID
        return $model->getOne(['numero_groupe' => $numeroGroupe])['_id'];
    }

    protected function addSampleMateriel(Materiel $model, string $groupeId, string $numeroSerie, string $marque, string $modele, string $type, float $prix)
    {
        $model->createMateriel($groupeId, $numeroSerie, $marque, $modele, $type, $prix);
        $this->showMessage("Added material: $groupeId, Numero de serie: $numeroSerie, Marque: $marque, Modele: $modele, Type: $type, Prix: $prix");
    }

    protected function addSampleMembre(Membre $model, string $groupeId, string $prenom, string $nom, string $adresse, string $ville, string $email, bool $actif, string $motdepasse)
    {
        $model->createMembre($groupeId, $nom, $prenom, $adresse, $ville, $email, $actif, $motdepasse);
        $this->showMessage("Added member: Groupe ID: $groupeId, Prenom: $prenom, Nom: $nom, Adresse: $adresse, Ville: $ville, Email: $email, Actif: $actif, Mot de Passe: $motdepasse");

        // Return the newly created member's ID
        return $model->getOne(['nom' => $nom, 'prenom' => $prenom])['_id'];
    }

    protected function addSampleCommande(Commande $model, string $clientMemberId, string $activeMemberId, \MongoDB\BSON\UTCDateTime $date, array $materielList, float $prixTotal)
    {
        $model->createCommande($clientMemberId, $activeMemberId, $date, $materielList, $prixTotal);
        $this->showMessage("Added order: Client Member ID: $clientMemberId, Active Member ID: $activeMemberId, Date: {$date->toDateTime()->format('Y-m-d H:i:s')}, Materiel List: " . implode(', ', $materielList) . ", Prix Total: $prixTotal");
    }

    protected function showMessage($message)
    {
        CLI::write($message, 'green');
    }
}

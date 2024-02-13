<?php

namespace App\Controllers;

use App\Models\Commande;
use App\Models\Materiel;
use App\Models\Membre;
use ci4mongodblibrary\Libraries\Mongo;
use DateTime;
use MongoDB\BSON\ObjectId;
use MongoDB\BSON\UTCDateTime;

class HistoriqueController extends BaseController
{
    public function index()
    {
        // 
    }

    public function search()
    {
        // Charger le modèle Commande
        $commandeModel = new Commande();
        $membreModel = new Membre();
        $materielModel = new Materiel();

        $membres = $membreModel->getList();
        $materiels = $materielModel->getList();

        // Récupérer les valeurs du formulaire
        $nomMatos = $this->request->getPost('nom_matos');
        $client = $this->request->getPost('client');
        $actif = $this->request->getPost('actif');
        $dateDebut = $this->request->getPost('date_debut');
        $dateFin = $this->request->getPost('date_fin');

        $whereCondition = [];

        // Calcul de la date d'il y a 10 ans en millisecondes pour UTCDateTime
        $dateIlYaDixAns = new DateTime();
        $dateIlYaDixAns->modify('-10 years');
        $timestampIlYaDixAns = $dateIlYaDixAns->getTimestamp() * 1000; // Conversion en millisecondes

        // Création d'un objet UTCDateTime avec ce timestamp
        $utcDateIlYaDixAns = new UTCDateTime($timestampIlYaDixAns);

        // Ajout de la condition de base pour ne pas remonter plus loin que 10 ans
        // Assure-toi que le champ de date dans ta base de données est correctement référencé ici
        $whereCondition['date'] = ['$gte' => $utcDateIlYaDixAns];

        // Ensuite, tu ajoutes les autres conditions spécifiques
        if ($nomMatos != "") {
            $whereCondition['list'] = ['$in' => [$nomMatos]];
        }

        if ($client != "") {
            $whereCondition['id_membre_client'] = $client;
        }

        if ($actif != "") {
            $whereCondition['id_membre_actif'] = $actif;
        }

        // Pour les plages de dates spécifiées par l'utilisateur, tu dois les intégrer de manière à ne pas outrepasser la limite de 10 ans
        if (!empty($dateDebut)) {
            $whereCondition['date']['$gte'] = new UTCDateTime(max(strtotime($dateDebut) * 1000, $timestampIlYaDixAns));
        }
        if (!empty($dateFin)) {
            // S'assure que dateFin ne dépasse pas la date actuelle, en supposant que tu ne veux pas de futur
            $dateFinTimestamp = min(strtotime($dateFin . ' 23:59:59') * 1000, (new DateTime())->getTimestamp() * 1000);
            $whereCondition['date']['$lte'] = new UTCDateTime($dateFinTimestamp);
        }

        // Récupérer la liste des commandes
        $commandes = $commandeModel->getList(where: $whereCondition);

        foreach($commandes as $c) {
            $membreActif = $membreModel->getOne(where: ['_id' => new ObjectId($c['id_membre_actif'])]);
            $membreClient = $membreModel->getOne(where: ['_id' => new ObjectId($c['id_membre_client'])]);
            $c['id_membre_actif'] = $membreActif['prenom'] . " " . $membreActif['nom'];
            $c['id_membre_client'] = $membreClient['prenom'] . " " . $membreClient['nom'];
        }

        // Passer les données à la vue
        return view('history_page', ['commandes' => $commandes, 'materiels' => $materiels, 'membres' => $membres]);
    }
}

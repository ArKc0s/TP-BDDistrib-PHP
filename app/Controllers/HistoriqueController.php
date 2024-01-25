<?php

namespace App\Controllers;

use App\Models\Commande;
use App\Models\Membre;
use ci4mongodblibrary\Libraries\Mongo;
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

        // Récupérer les valeurs du formulaire
        $nomMatos = $this->request->getPost('nom_matos');
        $client = $this->request->getPost('client');
        $actif = $this->request->getPost('actif');
        $dateDebut = $this->request->getPost('date_debut');
        $dateFin = $this->request->getPost('date_fin');

        // Construire la condition de filtrage
        $whereCondition = [];

        // Définir la condition pour récupérer les commandes des 10 dernières années
        $whereCondition = ['date' => ['$gte' => new UTCDateTime(strtotime('-10 years') * 1000)]];

        if (!empty($nomMatos)) {
            // Ajouter la condition pour le matériel
            $whereCondition['list'] = $nomMatos;
        }

        if (!empty($client)) {
            // Ajouter la condition pour le membre client
            $whereCondition['id_membre_client'] = $client;
        }

        if (!empty($actif)) {
            // Ajouter la condition pour le membre actif
            $whereCondition['id_membre_actif'] = $actif;
        }

        if (!empty($dateDebut)) {
            // Ajouter la condition pour la date de début
            $whereCondition['date']['$gte'] = new UTCDateTime(strtotime($dateDebut) * 1000);
        }

        if (!empty($dateFin)) {
            // Ajouter la condition pour la date de fin
            $whereCondition['date']['$lte'] = new UTCDateTime(strtotime($dateFin . ' 23:59:59') * 1000);
        }

        // Récupérer la liste des commandes
        // $commandes = $commandeModel->getList($whereCondition);
        $commandes = [];

        // Passer les données à la vue
        return view('history_page', ['commandes' => $commandes]);
    }
}

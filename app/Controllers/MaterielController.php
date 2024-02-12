<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class MaterielController extends BaseController
{
    public function index()
    {
        //
    }

    // TO CHECK
    public function ajout_materiel() {
            // Vérifier si le formulaire est soumis
            if ($this->input->server('REQUEST_METHOD') == 'POST') {
                // Récupérer les données soumises
                $nom_materiel = $this->input->post('nom_materiel');
                $type = $this->input->post('type');
                $quantite = $this->input->post('quantite');

                // Valider les données si nécessaire (à implémenter)

                // Insérer les données dans la base de données
                $this->load->model('Materiel'); // Assurez-vous de charger votre modèle
                $this->Materiel->inserer_materiel($nom_materiel, $type, $quantite);

                // Redirection vers la même page
                redirect('MaterielController/ajout_materiel');
            } else {
                // Afficher la vue du formulaire
                $this->load->view('ajout_materiel');
            }
}

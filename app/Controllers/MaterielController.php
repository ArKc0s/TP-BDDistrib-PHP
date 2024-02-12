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
    public function ajouter() {
            // Vérifier si le formulaire est soumis
            if ($this->request->getMethod() == 'post') {
                // Récupérer les données soumises
                $nom_materiel = $this->request->getPost('nom_materiel');
                $type = $this->request->getPost('type');
                $quantite = $this->request->getPost('quantite');

                // Valider les données si nécessaire (à implémenter)

                // Insérer les données dans la base de données
                $this->load->model('Materiel'); // Assurez-vous de charger votre modèle
                $this->Materiel->inserer_materiel($nom_materiel, $type, $quantite);

                // Redirection vers la même page
//                TODO: redirect to the same page mais réussir parce que j'y arrive pas
                return redirect()->to('ajout_materiel');
            } else {
                // Afficher la vue du formulaire
                return view('ajout_materiel');
            }
        }
}

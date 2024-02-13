<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Groupe;
use App\Models\Materiel;
use CodeIgniter\HTTP\ResponseInterface;

class MaterielController extends BaseController
{
    public function index()
    {
        //
    }

    // TO CHECK
//    public function ajouter() {
//            // Vérifier si le formulaire est soumis
//            if ($this->request->getMethod() == 'post') {
//                // Récupérer les données soumises
//                $nom_materiel = $this->request->getPost('nom_materiel');
//                $type = $this->request->getPost('type');
//                $quantite = $this->request->getPost('quantite');
//
//                // Valider les données si nécessaire (à implémenter)
//
//                // Insérer les données dans la base de données
//                $this->load->model('Materiel'); // Assurez-vous de charger votre modèle
//                $this->Materiel->inserer_materiel($nom_materiel, $type, $quantite);
//
//                $groupe = new Groupe();
//                $data['groupes'] = $groupe->getList() ;// Récupérer les groupes pour le formulaire
//                // Afficher la vue du formulaire
//                // Redirection vers la même page
////                TODO: redirect to the same page mais réussir parce que j'y arrive pas
//                return redirect()->back();
//            } else {
//                $groupe = new Groupe();
//                $data['groupes'] = $groupe->getList() ;// Récupérer les groupes pour le formulaire
//                // Afficher la vue du formulaire
//                return view('ajout_materiel' , $data);
//            }
//        }

    public function creer()
    {
        $groupe = new Groupe();
        $data['groupes'] = $groupe->getList();
        return view('ajout_materiel', $data);
    }

    public function ajoutAPI()
    {
        $data = $this->request->getPost();
        $materiel = new Materiel();
        $materiel->createMateriel($data["group"], $data["numeroDeSerie"], $data["marque"], $data["modele"], $data["type"], $data["prix"]);
        return redirect()->back();
    }
}

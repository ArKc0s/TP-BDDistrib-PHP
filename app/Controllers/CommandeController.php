<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Membre;
use App\Models\Materiel;

class CommandeController extends BaseController
{
    public function index()
    {
        //
    }

    public function commander()
    {
        $membres = new Membre();
        $materiels = new Materiel();
        $data['concatenatedNames'] = $membres->getList(where: ['actif' => true]);
        $data['concatenatedNamesClient'] = $membres->getList();
        $data['concatenatedNamesMateriel'] = $materiels->getList();
        return view('commande_membre',$data);
    }
    public function creationAPI()
    {
        $data = $this->request->getPost();
        $commande = new Commande();
        $commande->createCommande($data["num_groupe"], $data["nom_groupe"], $data["ville"]);

        return redirect()->back();
    }
}
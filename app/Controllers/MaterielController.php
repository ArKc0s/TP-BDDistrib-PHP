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

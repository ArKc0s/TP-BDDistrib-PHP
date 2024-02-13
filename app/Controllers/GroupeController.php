<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Groupe;
use App\Models\Ville;
use CodeIgniter\HTTP\ResponseInterface;

class GroupeController extends BaseController
{
    public function index()
    {
        //
    }

    public function creer()
    {
        $groupe = new Groupe();
        $ville = new Ville();
        $data['next_num'] = sprintf("%03d", intval($groupe->getLastNum()) + 1);
        $data["villes"] = $ville->getList();
        return view('creer_groupe', $data);
    }

    public function creationAPI()
    {
        $data = $this->request->getPost();
        $groupe = new Groupe();
        $groupe->createGroupe($data["num_groupe"], $data["nom_groupe"], $data["ville"]);

        return redirect()->back();
    }
}

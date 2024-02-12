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
}
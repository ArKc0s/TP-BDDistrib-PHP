<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Membre;

class CommandeController extends BaseController
{
    public function index()
    {
        //
    }

    public function commander()
    {
        $membres = new Membre();
        $data = $membres->getList(where: ['actif' => 1]);
        return view('commande_membre',$data);
    }
}
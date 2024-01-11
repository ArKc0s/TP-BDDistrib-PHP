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

    public function ajouter()
    {
        return view('ajout_materiel');
    }
}

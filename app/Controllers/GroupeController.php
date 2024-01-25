<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class GroupeController extends BaseController
{
    public function index()
    {
        //
    }

    public function creer()
    {
        return view('creer_groupe');
    }
}

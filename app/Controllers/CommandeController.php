<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class CommandeController extends BaseController
{
    public function index()
    {
        //
    }

    public function commander()
    {
        return view('commande_membre');
    }
}
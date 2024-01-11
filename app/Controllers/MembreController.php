<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class MembreController extends BaseController
{
    public function index()
    {
        //
    }

    public function inscription()
    {
        return view('inscription_membre');
    }
}

<?php

namespace App\Controllers;

use App\Models\Commande;
use App\Models\Membre;

class HistoriqueController extends BaseController
{
    public function index()
    {
        // 
    }
    
    public function search()
    {
        return view('history_page');
    }
}

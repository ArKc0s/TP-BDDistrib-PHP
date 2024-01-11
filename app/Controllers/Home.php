<?php

namespace App\Controllers;

use App\Models\ItemModel;


class Home extends BaseController
{
    /**
     * @throws \Exception
     */
    public function index()
    {

        return view('inscription_membre');
    }
}

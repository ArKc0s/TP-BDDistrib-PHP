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

        $data = [];

        $itemModel = new ItemModel();

        $data['items'] = $itemModel->getOne('item');

        var_dump($data['items']);

        $itemModel->createUser("Wadin", "Léo");

        //return view('welcome_message', $data);
    }
}

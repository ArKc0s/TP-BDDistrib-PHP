<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Membre;
use CodeIgniter\HTTP\ResponseInterface;

class MembreController extends BaseController
{

    public function connexion()
    {
        return view('connexion_membre');
    }

    public function deconnexion()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/membre/connexion');
    }

    public function inscription()
    {
        $data['villes'] =  [['id' => 0, 'nom' => 'test']];
        $data['groupes'] =  [['id' => 0, 'nom' => 'test']];
        return view('inscription_membre', $data);
    }

    public function store()
    {
        helper(['form']);
        $rules = [
            'actif' => 'required',
            'numerogroupe' => 'required',
            'nom'          => 'required|min_length[2]|max_length[50]',
            'prenom'          => 'required|min_length[2]|max_length[50]',
            'adresse'          => 'required|min_length[2]|max_length[100]',
            'ville'          => 'required',
            'email'         => 'required|min_length[4]|max_length[100]|valid_email|',
            'password'      => 'required|min_length[4]|max_length[50]',
            'confirmpassword'  => 'matches[password]'
        ];

        if($this->validate($rules)){
            $userModel = new Membre();
            $data = [
                'actif' => $this->request->getVar('actif'),
                'numero_groupe' => $this->request->getVar('numerogroupe'),
                'nom'     => $this->request->getVar('nom'),
                'prenom'     => $this->request->getVar('prenom'),
                'adresse'     => $this->request->getVar('adresse'),
                'ville'     => $this->request->getVar('ville'),
                'email'    => $this->request->getVar('email'),
                'password' => $this->request->getVar('password'),
            ];
            $userModel->createMembre($data['numero_groupe'], $data['nom'], $data['prenom'],$data['adresse'], $data['ville'], $data['email'], $data['actif'], $data['password']);
            return redirect()->to('/membre/inscription')->with('validation', "Inscription réussie");
        }else{
            return redirect()->to('/membre/inscription')->with('validation', $this->validator);
        }

        //TODO: Changer le with ça marche pas mais pas grave pour le moment (Author: Léo)

    }

    public function loginAuth()
    {
        $session = session();
        $userModel = new Membre();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $data = $userModel->getOne(where: ['email' => $email]);
        if($data){
            $pass = $data['mot_de_passe'];
            if($password == $pass) {
                $ses_data = [
                    'id' => $data['_id'],
                    'nom' => $data['nom'],
                    'prenom' => $data["prenom"],
                    'email' => $data['email'],
                    'isLoggedIn' => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/commande');
            }
        }

        $session->setFlashdata('msg', 'Email ou mot de passe incorrect(s).');
        return redirect()->to('/membre/connexion');
    }
}

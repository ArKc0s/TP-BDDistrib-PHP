<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Commande;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Membre;
use App\Models\Materiel;
use MongoDB\BSON\ObjectId;
use MongoDB\BSON\UTCDateTime;
use DateTime;

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
    public function creationAPIcommande()
    {
        $totalPrice = 0;
        $data = $this->request->getPost();
        $commande = new Commande();
        $materiel = new Materiel();
        $dateObject = new DateTime($data["date_commande"]);
        // Get the timestamp in milliseconds
        $timestampMilliseconds = $dateObject->getTimestamp() * 1000;
        // Create a UTCDateTime object
        $utcDate = new UTCDateTime($timestampMilliseconds);
        $numerosDeSerie = []; // Initialisation du tableau
        $emplacements = 0;
        foreach ($data["list_materiel"] as $materielId) {
            $materielInfo = $materiel->getOne(where: ['_id' => new ObjectId($materielId)]);
            // Vérifier si $materielInfo existe avant d'accéder à l'attribut 'prix'
            if ($materielInfo) {
                $numerosDeSerie [$emplacements]= $materielInfo['numero_de_serie'];
                $totalPrice += $materielInfo['prix'];
                $emplacements++;
            }
        }
        //echo ($totalPrice);
        $commande->createCommande($data["membre_client"], $data["membre_commande"], $utcDate, $numerosDeSerie, $totalPrice);
        return redirect()->back();
    }
}
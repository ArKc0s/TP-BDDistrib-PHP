<?php

namespace App\Models;

use CodeIgniter\Model;

class Membre extends Model
{
    protected $table            = 'membres';
    protected $primaryKey       = 'id_membre';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['numéro_groupe','nom','prénom','adresse','email','actif','mot_de_passe'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getMembre()
    {
        // Exemple de requête pour récupérer la liste des champs
        $query = $this->db->query("SELECT CONCAT(nom,' ',prénom) FROM membres WHERE actif = 1");
        
        // Renvoie le résultat sous forme de tableau d'objets
        return $query->getResult();
    }

    public function getClient()
    {
        // Exemple de requête pour récupérer la liste des champs
        $query = $this->db->query("SELECT CONCAT(nom,' ',prénom) FROM membres");
        
        // Renvoie le résultat sous forme de tableau d'objets
        return $query->getResult();
    }

}

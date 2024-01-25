<?php

namespace App\Models;

use CodeIgniter\Model;

class Matériel extends Model
{
    protected $table            = 'matériels';
    protected $primaryKey       = 'id_matériel';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_groupe','numéro_de_série','marque','modèle','type','prix'];

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

    public function getMateriel()
    {
        // Exemple de requête pour récupérer la liste des champs
        $query = $this->db->query("SELECT CONCAT(modèle,' ',marque) FROM materiels");
        
        // Renvoie le résultat sous forme de tableau d'objets
        return $query->getResult();
    }
}

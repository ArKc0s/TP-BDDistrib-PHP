<?php

namespace App\Models;
use ci4mongodblibrary\Libraries\Mongo;

class Materiel
{
    /*
    * @var Mongo
     */
    protected $m;

    /**
     *
     */
    public function __construct()
    {
        $this->m = new Mongo();
    }

    /**
     * @return mixed
     */
    public function getIndexes()
    {
        return $this->m->listindexes($materiels);
    }

    /**
     * @param string $idgroupe
     * @param string $numerodeserie
     * @param string $marque
     * @param string $modele
     * @param string $type
     * @param float $prix
     * @return mixed
     */
    public function createMateriel(string $idgroupe, string $numerodeserie, string $marque, string $modele, string $type, float $prix)
    {
        return $this->m->insertOne("materiels", ["id_groupe" => $idgroupe, "numero_de_serie" => $numerodeserie, "marque" => $marque, "modele" => $modele, "type" => $type, "prix" => $prix]);
    }

    /**
     * @param array $where
     * @param array $options
     * @param array $select
     * @return mixed
     * @throws \Exception
     */
    public function getList( array $where = [], array $options = [], array $select = [])
    {
        return $this->m->options($options)->select($select)->where($where)->find($materiels)->toArray();
    }

    public function getOne( array $where = [], array $options = [], array $select = [])
    {
        return $this->m->options($options)->select($select)->where($where)->findOne($materiels);
    }

// TO CHECK
    public function inserer_materiel($marque, $model, $type, $prix, $idGroupe, $numeroDeSerie)
    {
        $materiel = [
            "marque" => $marque,
            "model" => $model,
            "type" => $type,
            "prix" => $prix,
            "id_groupe" => $idGroupe,
            "numero_de_serie" => $numeroDeSerie
        ];
        $this->m->insertOne("materiels", $materiel);
    }
}
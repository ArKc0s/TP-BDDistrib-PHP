<?php

namespace App\Models;
use ci4mongodblibrary\Libraries\Mongo;

class Membre
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
        return $this->m->listindexes($membres);
    }

    /**
     *
     * @param string $numerogroupe
     * @param string $nom 
     * @param string $prenom
     * @param string $adresse
     * @param string $villeID
     * @param string $email
     * @param bool $actif
     * @param string $motdepasse
     * @return mixed
     */
    public function createMembre(string $numerogroupe, string $nom, string $prenom, string $adresse, string $villeID, string $email, bool $actif, string $motdepasse)
    {
        return $this->m->insertOne("membres", ["numero_groupe" => $numerogroupe, "nom" => $nom, "prenom" => $prenom, "adresse" => $adresse, "ville" => $villeID, "email" => $email, "actif" => $actif, "mot_de_passe" => $motdepasse]);
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
        return $this->m->options($options)->select($select)->where($where)->find("membres")->toArray();
    }

    public function getOne( array $where = [], array $options = [], array $select = [])
    {
        return $this->m->options($options)->select($select)->where($where)->findOne("membres");
    }
}
<?php

namespace App\Models;
use ci4mongodblibrary\Libraries\Mongo;


class Groupe
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
     * @param string $collection
     * @return mixed
     */

    public function getIndexes()
    {
        return $this->m->listindexes('groupes');
    }

    public function createGroupe(string $numero_groupe, string $nom, Ville $ville)
    {
        $this->m->insertOne('groupes', ['numero_groupe' => $numero_groupe, 'nom' => $nom, 'ville' => $ville]);
    }

    public function getList(array $where = [], array $options = [], array $select = [])
    {
        return $this->m->options($options)->select($select)->where($where)->find('groupes')->toArray();
    }

    public function getOne(array $where = [], array $options = [], array $select = [])
    {
        return $this->m->options($options)->select($select)->where($where)->findOne('groupes');
    }
}

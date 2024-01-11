<?php

namespace App\Models;
use ci4mongodblibrary\Libraries\Mongo;


class Adresse
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
        return $this->m->listindexes('adresses');
    }

    public function createAdresse(string $numero, int $rue, Ville $ville)
    {
        $this->m->insertOne('adresses', ['numero' => $numero, 'rue' => $rue, 'ville' => $ville]);
    }

    public function getList(array $where = [], array $options = [], array $select = [])
    {
        return $this->m->options($options)->select($select)->where($where)->find('adresses')->toArray();
    }

    public function getOne(array $where = [], array $options = [], array $select = [])
    {
        return $this->m->options($options)->select($select)->where($where)->findOne('adresses');
    }
}

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
     * @return mixed
     */
    public function getIndexes()
    {
        return $this->m->listindexes('adresses');
    }

    /**
     * @param string $numero
     * @param int $rue
     * @param Ville $ville
     */
    public function createAdresse(string $numero, int $rue, string $ville_id)
    {
        $this->m->insertOne('adresses', ['numero' => $numero, 'rue' => $rue, 'ville_id' => $ville_id]);
    }

    /**
     * @param array $where
     * @param array $options
     * @param array $select
     * @return mixed
     * @throws \Exception
     */
    public function getList(array $where = [], array $options = [], array $select = [])
    {
        return $this->m->options($options)->select($select)->where($where)->find('adresses')->toArray();
    }

    /**
     * @param array $where
     * @param array $options
     * @param array $select
     * @return mixed
     * @throws \Exception
     */
    public function getOne(array $where = [], array $options = [], array $select = [])
    {
        return $this->m->options($options)->select($select)->where($where)->findOne('adresses');
    }
}

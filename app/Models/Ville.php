<?php

namespace App\Models;
use ci4mongodblibrary\Libraries\Mongo;


class Ville
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

    /**
     * @param array $nom
     * @param array $code_postal
     * @return mixed
     */
    public function createVille(string $nom, int $code_postal)
    {
        $this->m->insertOne('villes', ['nom' => $nom, 'code_postal' => $code_postal]);
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
        return $this->m->options($options)->select($select)->where($where)->find('villes')->toArray();
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
        return $this->m->options($options)->select($select)->where($where)->findOne('villes');
    }
}

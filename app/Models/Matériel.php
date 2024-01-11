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
        return $this->m->listindexes($materials);
    }

    /**
     * @param array $credentials
     * @return mixed
     */
    public function createOneItem(array $credentials)
    {
        return $this->m->insertOne($materials, $credentials);
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
        return $this->m->options($options)->select($select)->where($where)->find($materials)->toArray();
    }

    public function getOne( array $where = [], array $options = [], array $select = [])
    {
        return $this->m->options($options)->select($select)->where($where)->findOne($materials);
    }
}
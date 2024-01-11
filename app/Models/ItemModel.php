<?php

namespace App\Models;
use ci4mongodblibrary\Libraries\Mongo;

//MODELE POURRI QUI PUE DU CUL
class ItemModel
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
    public function getIndexes(string $collection)
    {
        return $this->m->listindexes($collection);
    }

    /**
     * @param string $collection
     * @param array $credentials
     * @return mixed
     */
    public function createOneItem(string $collection, array $credentials)
    {
        return $this->m->insertOne($collection, $credentials);
    }

    public function createUser($nom, $prenom)
    {
        return $this->m->insertOne("users", ["nom" => $nom, "prenom" => $prenom]);
    }

    /**
     * @param string $collection
     * @param array $where
     * @param array $options
     * @param array $select
     * @return mixed
     * @throws \Exception
     */
    public function getList(string $collection, array $where = [], array $options = [], array $select = [])
    {
        return $this->m->options($options)->select($select)->where($where)->find($collection)->toArray();
    }

    public function getOne(string $collection, array $where = [], array $options = [], array $select = [])
    {
        return $this->m->options($options)->select($select)->where($where)->findOne($collection);
    }

}
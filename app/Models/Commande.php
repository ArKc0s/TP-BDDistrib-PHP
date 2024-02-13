<?php

namespace App\Models;
use ci4mongodblibrary\Libraries\Mongo;
use DateTime;
use MongoDB\BSON\UTCDateTime;

class Commande
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
        return $this->m->listindexes("commandes");
    }

    /**
     * @param string $idmembreclient
     * @param string $idmembreactif
     * @param string $date
     * @param array $list
     * @param float $prixtotal
     * @return mixed
     */
    public function createCommande(string $idmembreclient, string $idmembreactif, UTCDateTime $date, array $list, float $prixtotal)
    {
        return $this->m->insertOne("commandes", ["id_membre_client" => $idmembreclient, "id_membre_actif" => $idmembreactif, "date" => $date, "list" => $list, "prix_total" => $prixtotal]);
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
        return $this->m->options($options)->select($select)->where($where)->find("commandes")->toArray();
    }

    public function getLastTenYears()
    {
        // Calcul de la date d'il y a 10 ans en millisecondes pour UTCDateTime
        $dateIlYaDixAns = new DateTime();
        $dateIlYaDixAns->modify('-10 years');
        $timestampIlYaDixAns = $dateIlYaDixAns->getTimestamp() * 1000; // Conversion en millisecondes

        // Création d'un objet UTCDateTime avec ce timestamp
        $utcDateIlYaDixAns = new UTCDateTime($timestampIlYaDixAns);

        // Ajout du critère de date dans $where
        $where['date'] = ['$gte' => $utcDateIlYaDixAns];

        return $this->m->options([])->select([])->where($where)->find("commandes")->toArray();
    }

    public function getOne( array $where = [], array $options = [], array $select = [])
    {
        return $this->m->options($options)->select($select)->where($where)->findOne("commandes");
    }
}

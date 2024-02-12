#!/bin/bash

docker build -t codeigniter4 .

docker-compose up -d rs-01 rs-02
echo "Démarrage des instances MongoDB, veuillez patienter..."
sleep 20
docker-compose exec rs-01 sh -c "mongo --port 27013 < /scripts/init-shard.js"

docker-compose up -d rs-conf-01 rs-conf-02
echo "Démarrage des instances de configuration MongoDB, veuillez patienter..."
sleep 20
docker-compose exec rs-conf-01 sh -c "mongo --port 27017 < /scripts/init-config.js"

docker-compose up -d mongos
echo "Démarrage du router MongoDB, veuillez patienter..."
sleep 30
docker-compose exec mongos sh -c "mongo --port 27020 < /scripts/init-router.js"

docker-compose up -d web
echo "Démarrage de l'application web !"


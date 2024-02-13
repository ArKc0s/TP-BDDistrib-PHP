# Distributed Data Base Project
## Introduction
This class project aim to implement a distributed database system. In this project we created a small app monitoring the materials and orders in an IT club.
The main purpose was to learn how to create a distributed database using mangodb and docker containers.

We also use some documentation to help us set up the docker containers and the database. We used the following documentation:
- [Docker](https://docs.docker.com/)
- [MongoDB](https://docs.mongodb.com/)
- [CodeIgniter](https://codeigniter.com/user_guide/)
- [Bootstrap](https://getbootstrap.com/docs/5.0/getting-started/introduction/)
- [PHP](https://www.php.net/manual/en/)
- [HTML/CSS](https://www.w3schools.com/)
- [minhhungit/mongodb-cluster-docker-compose](https://github.com/minhhungit/mongodb-cluster-docker-compose)
- [shinsenter/php](https://github.com/shinsenter/php)

## Technologies
- Docker
- MongoDB
- Php (CodeIgniter)
- HTML/CSS (Bootstrap)

## Initial Setup
To run the project you need to have docker open and running. Then you can run the following command to start the containers:
```bash
sh init.sh
```
This will start the containers and the app will be available at http://localhost<br>
Be patient, since we don't know your computer's efficiency, we put some sleep time in the script to make sure the containers are up and running before the app starts.

## Docker Containers
We have created multiples containers.
One is for the app. The others are for the database and the replica set.
The containers are linked together using a docker network.
We decided that the app doesn't need more than two replicas, therefore, we have the following containers:
- web
- rs-01
- rs-02
- rs-config-01
- rs-config-02
- mongos

The web container allow us to access the app using the technology PHP CodeIgniter.

The rs-01 and rs-02 are the two replicas of the database. They are linked to the rs-config-01 and rs-config-02 containers which are the configuration servers.
mongos is the router to access the database.

All the commands needed to build the images and launch the docker containers are in the init.sh file.

## App
We have implemented few functions to test the link with the database and the containers:
- Login
- Create a new group
- Create a new member of the club
- Add a new material
- Place an order as a customer
- Access the list of the orders from the last ten years with some filters
  - Search by date range
  - Search by client member
  - Search by active member
  - Search by material

## Database
Here is a scheme of our collections and the links between them.
![Diagramme sans nom.drawio.png](..%2F..%2F..%2F..%2F..%2F..%2F..%2F..%2FDownloads%2FDiagramme%20sans%20nom.drawio.png)

## Team
[Léo Wadin](https://github.com/ArKc0s)<br>
[Aurélien Houdart](https://github.com/Zaykiri)<br>
[Elena Beylat](https://github.com/PetitCheveu)<br>

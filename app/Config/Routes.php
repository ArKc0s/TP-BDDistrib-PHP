<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'MembreController::connexion');
$routes->get('/membre/inscription', 'MembreController::inscription',['filter' => 'authGuard']);
$routes->get('/membre/connexion', 'MembreController::connexion');
$routes->get('/membre/deconnexion', 'MembreController::deconnexion',['filter' => 'authGuard']);
$routes->get('/groupe/creer', 'GroupeController::creer',['filter' => 'authGuard']);
$routes->get('/materiel/ajouter', 'MaterielController::creer',['filter' => 'authGuard']);
$routes->get('/commande', 'CommandeController::commander',['filter' => 'authGuard']);
$routes->get('/historique', 'HistoriqueController::search',['filter' => 'authGuard']);


$routes->match(['get', 'post'], '/store', 'MembreController::store');
$routes->match(['get', 'post'], '/loginAuth', 'MembreController::loginAuth');

$routes->post('/api/groupe/creation', 'GroupeController::creationAPI',['filter' => 'authGuard']);

$routes->post('/api/materiel/ajout', 'MaterielController::ajoutAPI',['filter' => 'authGuard']);

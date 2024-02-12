<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'MembreController::inscription');
$routes->get('/membre/inscription', 'MembreController::inscription');
$routes->get('/groupe/creer', 'GroupeController::creer');
$routes->get('/materiel/ajouter', 'MaterielController::ajouter');
$routes->get('/commande', 'CommandeController::commander');
// TODO : être authentifié comme membre actif pour accéder à cette page
$routes->get('/historique', 'HistoriqueController::search');

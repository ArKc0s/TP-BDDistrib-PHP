<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'MembreController::inscription');
$routes->get('/membre/inscription', 'MembreController::inscription');
$routes->get('/groupe/creer', 'GroupeController::creer');
$routes->get('/materiel/ajouter', 'MaterielController::ajouter');

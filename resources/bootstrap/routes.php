<?php
/**
 * @copyright	Copyright 2010-2013, The Titon Project
 * @license		http://opensource.org/licenses/bsd-license.php
 * @link		http://titon.io
 */

use Titon\Common\Registry;
use Titon\Route\Router;
use Titon\Route\Route;

/** @type \Titon\Route\Router $router */
$router = Registry::factory('Titon\Route\Router');

// Custom routes
$router->map(new Route('/static/(path)', ['module' => 'common', 'controller' => 'static', 'action' => 'index']));
$router->map(new Route('/static', ['module' => 'common', 'controller' => 'static', 'action' => 'index']));

// Initialize
$router->initialize();
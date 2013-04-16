<?php
/**
 * @copyright	Copyright 2010-2013, The Titon Project
 * @license		http://opensource.org/licenses/bsd-license.php
 * @link		http://titon.io
 */

use Titon\Common\Registry;
use Titon\Route\LocaleRoute;
use Titon\Route\Router;
use Titon\Route\Route;

$router = Registry::factory('Titon\Route\Router');

// Custom paths
$router->map(new LocaleRoute('/static/{action}', ['module' => 'common', 'controller' => 'static']));

// Initialize
$router->initialize();
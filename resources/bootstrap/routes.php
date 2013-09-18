<?php
/**
 * @copyright   2010-2013, The Titon Project
 * @license     http://opensource.org/licenses/bsd-license.php
 * @link        http://titon.io
 */

use Titon\Common\Registry;
use Titon\Route\Router;
use Titon\G11n\Route\LocaleRoute;

/** @type \Titon\Route\Router $router */
$router = Registry::factory('Titon\Route\Router');

// Enable locale resolving
$router->on('g11n', Registry::factory('Titon\G11n\G11n'));

// Custom routes
$router->map(new LocaleRoute('static.page', '/static/(path)', ['module' => 'common', 'controller' => 'static', 'action' => 'index']));
$router->map(new LocaleRoute('static', '/static', ['module' => 'common', 'controller' => 'static', 'action' => 'index']));

// Override for locale support
$router->map(new LocaleRoute('action.ext', '/{module}/{controller}/{action}.{ext}'));
$router->map(new LocaleRoute('action', '/{module}/{controller}/{action}'));
$router->map(new LocaleRoute('controller', '/{module}/{controller}'));
$router->map(new LocaleRoute('module', '/{module}'));
$router->map(new LocaleRoute('root', '/'));

// Initialize
$router->initialize();
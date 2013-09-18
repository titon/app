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

// Custom routes
$router->map(new LocaleRoute('static.page', '/static/(path)', ['module' => 'common', 'controller' => 'static', 'action' => 'index']));
$router->map(new LocaleRoute('static', '/static', ['module' => 'common', 'controller' => 'static', 'action' => 'index']));

// Override for locale support
$router->map('action.ext', new LocaleRoute('/{module}/{controller}/{action}.{ext}'));
$router->map('action', new LocaleRoute('/{module}/{controller}/{action}'));
$router->map('controller', new LocaleRoute('/{module}/{controller}'));
$router->map('module', new LocaleRoute('/{module}'));
$router->map('root', new LocaleRoute('/'));

// Initialize
$router->initialize();
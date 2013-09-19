<?php
/**
 * @copyright   2010-2013, The Titon Project
 * @license     http://opensource.org/licenses/bsd-license.php
 * @link        http://titon.io
 */

use Titon\Common\Registry;
use Titon\Route\Router;
use Titon\G11n\Route\LocaleRoute;

$router = $app->getRouter();

// Enable locale resolving
$router->on('g11n', $g11n);

// Custom routes
$router->map(new LocaleRoute('static.page', '/static/(path)', ['module' => 'common', 'controller' => 'static', 'action' => 'index']));
$router->map(new LocaleRoute('static', '/static', ['module' => 'common', 'controller' => 'static', 'action' => 'index']));

// Initialize
$router->initialize();
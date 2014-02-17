<?php
/**
 * @copyright   2010-2014, The Titon Project
 * @license     http://opensource.org/licenses/bsd-license.php
 * @link        http://titon.io
 */

use Titon\Http\Exception\UnauthorizedException;
use Titon\Http\Response;
use Titon\Mvc\Application;
use Titon\G11n\Route\LocaleRoute;
use Titon\Route\Route;
use Titon\Route\Router;

/**
 * --------------------------------------------------------------
 *  Routing
 * --------------------------------------------------------------
 *
 * Routes can be mapped that point to an internal module,
 * controller, and action. Routes will be matched against the
 * URL in the order they are defined. If no match is found, an
 * exception is thrown that triggers an error page.
 */

$app = Application::getInstance();
$router = $app->getRouter();

/**
 * Enable locale resolving if the g11n library is being used.
 * This will redirect URLs that do not start with a locale.
 */
$router->on('g11n', $app->get('g11n'));

/**
 * --------------------------------------------------------------
 *  Filters
 * --------------------------------------------------------------
 *
 * Once a route has been matched, any filters attached to the
 * route will be triggered. Filters allow for the interruption
 * of the current flow.
 */

$router->filter('auth', function(Router $router, Route $route) {
    throw new UnauthorizedException();
});

$router->filter('guest', function(Router $router, Route $route) {
    Response::redirect('/')->respond();
    exit();
});

/**
 * --------------------------------------------------------------
 *  Routes
 * --------------------------------------------------------------
 *
 * Routes can be grouped, which allows for prefixes,
 * suffixes, filters, and more, to only be applied to routes
 * defined with that group.
 *
 * If you plan on using g11n, use the LocaleRoute class,
 * else use the base Route class.
 */

$router->map('static.page', new LocaleRoute('/static/(path)', 'Main\Static@index'));
$router->map('static', new LocaleRoute('/static', 'Main\Static@index'));

/**
 * Default routes that catch all basic combinations.
 */
$router->group([], function(Router $router) {
    $router->map('action.ext', new LocaleRoute('/{module}/{controller}/{action}.{ext}'));
    $router->map('action', new LocaleRoute('/{module}/{controller}/{action}'));
    $router->map('controller', new LocaleRoute('/{module}/{controller}'));
    $router->map('module', new LocaleRoute('/{module}'));
    $router->map('root', new LocaleRoute('/'));
});

/**
 * Initialize and match a route against the current URL.
 */
$router->initialize();
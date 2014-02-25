<?php
/**
 * @copyright   2010-2014, The Titon Project
 * @license     http://opensource.org/licenses/bsd-license.php
 * @link        http://titon.io
 */

use Titon\Cache\Cache;
use Titon\Common\Registry;
use Titon\Controller\Controller\ErrorController;
use Titon\Db\Database;
use Titon\Environment\Environment;
use Titon\G11n\G11n;
use Titon\Mvc\Application;
use Titon\Mvc\View;
use Titon\View\Helper\BlockHelper;
use Titon\View\Helper\Html\AssetHelper;
use Titon\View\Helper\Html\HtmlHelper;
use Titon\View\View\Engine\TemplateEngine;

$app = Application::getInstance();

/**
 * --------------------------------------------------------------
 *  Component Mapping
 * --------------------------------------------------------------
 *
 * Components are objects that should be accessed globally
 * through the application layer. These components are the
 * gears that drive the application.
 *
 * All components can be accessed through their key by
 * calling get() on the application object.
 */

$app
    ->set('env', new Environment(['bootstrapPath' => RESOURCES_DIR . 'environments/']))
    ->set('cache', new Cache())
    ->set('g11n', new G11n())
    ->set('db', new Database());

/**
 * --------------------------------------------------------------
 *  Dependency Management
 * --------------------------------------------------------------
 *
 * The Registry layer allows classes to be stored in memory for
 * later retrieval. Classes may also be factory'd using their
 * namespace. The Registry only provides an object persistence
 * layer, anything more, like IoC containers, and service
 * locators will require third-party libraries.
 *
 * We suggest the following dependency libraries.
 *
 *  - PHP DI - http://mnapoli.fr/PHP-DI/
 *  - Symfony DI - http://symfony.com/components/DependencyInjection
 *  - Aura DI - http://auraphp.com/packages/Aura.Di/1.1.1/
 */

/**
 * Define the controller to use for error handling.
 */
Registry::register('titon.controller', function() {
    return new ErrorController();
});

/**
 * Define the view to use for error handling,
 * and as the primary view used by MainController.
 */
Registry::register('titon.view', function() use ($app) {
    $view = new View();

    // Pass route params to the engine making it accessible to the view config
    $view->setEngine(new TemplateEngine($app->getRouter()->current()->getParams()));

    // Add helpers that can be accessible in the views
    $view
        ->addHelper('html', new HtmlHelper())
        ->addHelper('block', new BlockHelper())
        ->addHelper('asset', new AssetHelper(['webroot' => $app->getWebroot()]));

    // Set variables that are also accessible
    $view->setVariables([
        'env' => $app->get('env')->current()->getKey()
    ]);

    return $view;
});
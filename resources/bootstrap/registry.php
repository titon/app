<?php
/**
 * @copyright   2010-2014, The Titon Project
 * @license     http://opensource.org/licenses/bsd-license.php
 * @link        http://titon.io
 */

use Titon\Cache\Cache;
use Titon\Common\Registry;
use Titon\Db\Database;
use Titon\Environment\Environment;
use Titon\G11n\G11n;
use Titon\Mvc\Application;

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
 * Register a class through a closure that will be lazy-loaded
 * once it's retrieved by calling Registry::get().
 */
Registry::register('service', function() {
    // return new instance
});

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

Application::getInstance()
    ->set('env', new Environment(['bootstrapPath' => RESOURCES_DIR . 'environments/']))
    ->set('cache', new Cache())
    ->set('g11n', new G11n())
    ->set('db', new Database());
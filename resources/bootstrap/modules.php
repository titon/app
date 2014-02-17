<?php
/**
 * @copyright   2010-2014, The Titon Project
 * @license     http://opensource.org/licenses/bsd-license.php
 * @link        http://titon.io
 */

use Titon\Mvc\Application;

/**
 * --------------------------------------------------------------
 *  Modules
 * --------------------------------------------------------------
 *
 * A module represents a self-contained micro-application.
 * Each module will have its own set of controllers, models,
 * views, libraries, classes, and assets, and can be located
 * in the modules folder.
 *
 * Modules are meant to be modular, in that they should be
 * pluggable into any application. If packaged correctly,
 * they can be installed through Composer.
 */

$app = Application::getInstance();

/**
 * Add modules that should be accessed by URL.
 * The module key will be used as the route part in the URL.
 */
$app->addModule(new Main\MainModule('main', MODULES_DIR . 'Main'));
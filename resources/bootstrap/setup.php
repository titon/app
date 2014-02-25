<?php
/**
 * @copyright   2010-2014, The Titon Project
 * @license     http://opensource.org/licenses/bsd-license.php
 * @link        http://titon.io
 */

use Titon\Common\Config;
use Titon\Debug\Debugger;
use Titon\Debug\Logger;
use Titon\Mvc\Application;

$app = Application::getInstance();

/**
 * --------------------------------------------------------------
 *  Setup
 * --------------------------------------------------------------
 *
 * The setup file is called first in the bootstrap stack.
 * All settings and initialization that are required by other
 * classes and components should be defined in this file.
 */

date_default_timezone_set('UTC');

/**
 * --------------------------------------------------------------
 *  Debugging
 * --------------------------------------------------------------
 *
 * Enable the debugger to handle errors and exceptions.
 * A logger can be defined to log all exceptions.
 */

Debugger::initialize();
Debugger::setLogger(new Logger(TEMP_DIR . '/logs'));

/**
 * --------------------------------------------------------------
 *  Error Handling
 * --------------------------------------------------------------
 *
 * A custom error handler can be defined that can output error
 * pages for uncaught exceptions. By default, the Application
 * object handles errors by initializing an ErrorController
 * and rendering a template with the View.
 */

Debugger::setHandler([$app, 'handleError']);

/**
 * --------------------------------------------------------------
 *  Configuration
 * --------------------------------------------------------------
 *
 * Define the primary configurations used within the application.
 * These values can be conveniently accessed via methods on
 * the Config class -- Config::salt().
 */

Config::set('app', [
    'name' => 'Titon',
    'salt' => 'AN3sk8ANjsSl1Hwx910APs7lq8nmsP5LQmKC',
    'encoding' => 'UTF-8'
]);

/**
 * --------------------------------------------------------------
 *  Resource Mapping
 * --------------------------------------------------------------
 *
 * Define an array lookup paths for specific types of resources.
 * These paths will automatically be injected into classes that
 * make use of them -- for example, G11n and View.
 */

Config::set('titon.path', [
    'resources' => [
        RESOURCES_DIR,
        // Inherit all locales and messages from the G11n package
        VENDOR_DIR . 'titon/g11n/src/resources'
    ],
    'views' => [
        VIEWS_DIR
    ]
]);
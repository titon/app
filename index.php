<?php
/**
 * Titon: A PHP 5.4 Modular Framework
 *
 * @copyright	Copyright 2010, Titon
 * @link		http://github.com/titon
 * @license		http://opensource.org/licenses/bsd-license.php (The BSD License)
 */

//declare(encoding='UTF-8');

use \titon\Titon;

/**
 * Compare the PHP version so that the application is running in 5.3!
 */
if (version_compare(PHP_VERSION, '5.3.0') == -1) {
	trigger_error(sprintf('Titon: Application requires PHP 5.3.x to run correctly, please upgrade your environment. You are using %s.', PHP_VERSION), E_USER_ERROR);
}

/**
 * Convenience constants for the directory, path and namespace separators.
 */
define('DS', '/');
define('PS', PATH_SEPARATOR);
define('NS', '\\');

/**
 * Define the folders that contain the app and Titon files.
 */
define('APP', str_replace(NS, DS, __DIR__) . DS);
define('ROOT', dirname(APP) . DS);
define('TITON', ROOT . 'titon' . DS);

/**
 * Load the core Titon files and initialize dispatcher; throw fatal error if libraries could not be found.
 */
$bootstrap = TITON . 'bootstrap.php';

if (!file_exists($bootstrap)) {
	trigger_error('Titon: Framework bootstrap failed to load the core libraries. Please check your paths and configuration.', E_USER_ERROR);
}

include_once $bootstrap;

/**
 * Dispatch the framework.
 */
Titon::run();
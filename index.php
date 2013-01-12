<?php
/**
 * @copyright	Copyright 2010-2013, The Titon Project
 * @license		http://opensource.org/licenses/bsd-license.php
 * @link		http://titon.io
 */

/**
 * Compare the PHP version so that the application is running in 5.4!
 */
if (version_compare(PHP_VERSION, '5.4.0') == -1) {
	trigger_error(sprintf('Titon requires PHP 5.4.x to run correctly, please upgrade your environment. You are using %s.', PHP_VERSION), E_USER_ERROR);
}

/**
 * Convenience constants for the directory, path and namespace separators.
 */
define('DS', DIRECTORY_SEPARATOR);
define('PS', PATH_SEPARATOR);
define('NS', '\\');

/**
 * Define critical location paths.
 */
define('TITON', __DIR__ . DS);
define('VENDOR_DIR', TITON . 'vendor' . DS);
define('MODULES_DIR', TITON . 'modules' . DS);
define('RESOURCES_DIR', TITON . 'resources' . DS);
define('TEMP_DIR', TITON . 'temp' . DS);

/**
 * Bootstrap configuration.
 */
require RESOURCES_DIR . 'bootstrap/setup.php';
require RESOURCES_DIR . 'bootstrap/environments.php';
require RESOURCES_DIR . 'bootstrap/locales.php';
require RESOURCES_DIR . 'bootstrap/routes.php';
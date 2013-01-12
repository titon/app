<?php
/**
 * @copyright	Copyright 2010-2013, The Titon Project
 * @license		http://opensource.org/licenses/bsd-license.php
 * @link		http://titon.io
 */

/**
 * Confirm the application has the correct PHP version.
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
 * Initialize autoloading with Composer.
 */

$composer = require_once VENDOR_DIR . 'autoload.php';

\Titon\Common\Registry::set($composer, 'Composer');

/**
 * Bootstrap configuration (order does matter).
 */
require_once RESOURCES_DIR . 'bootstrap/setup.php';
require_once RESOURCES_DIR . 'bootstrap/environments.php';
require_once RESOURCES_DIR . 'bootstrap/locales.php';
require_once RESOURCES_DIR . 'bootstrap/routes.php';
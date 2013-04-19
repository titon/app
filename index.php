<?php
/**
 * @copyright	Copyright 2010-2013, The Titon Project
 * @license		http://opensource.org/licenses/bsd-license.php
 * @link		http://titon.io
 */

/**
 * Validate the environment is running 5.4.
 */
if (version_compare(PHP_VERSION, '5.4.0') == -1) {
	trigger_error(sprintf('Titon requires PHP 5.4 to run correctly, please upgrade your environment. You are using %s.', PHP_VERSION), E_USER_ERROR);
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
define('APP_DIR', __DIR__ . DS);
define('VENDOR_DIR', APP_DIR . 'vendor' . DS);
define('MODULES_DIR', APP_DIR . 'modules' . DS);
define('RESOURCES_DIR', APP_DIR . 'resources' . DS);
define('TEMP_DIR', APP_DIR . 'temp' . DS);
define('VIEWS_DIR', APP_DIR . 'views' . DS);

/**
 * Initialize autoloading with Composer.
 */
$composer = require_once VENDOR_DIR . 'autoload.php';
$composer->add('Common', MODULES_DIR);

Titon\Common\Registry::set($composer, 'Titon.composer');

/**
 * Bootstrap application with configuration.
 * Order is important; routing should be triggered last.
 */
foreach (['setup', 'environments', 'locales', 'events', 'modules', 'routes'] as $config) {
	$path = sprintf(RESOURCES_DIR . 'bootstrap/%s.php', $config);

	if (file_exists($path)) {
		require_once $path;
	}
}

/**
 * Run the application!
 */
$app = Titon\Mvc\Application::getInstance();
$app->run();
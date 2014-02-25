<?php
/**
 * @copyright   2010-2014, The Titon Project
 * @license     http://opensource.org/licenses/bsd-license.php
 * @link        http://titon.io
 */

use Titon\Common\Registry;
use Titon\Http\Request;
use Titon\Http\Response;
use Titon\Mvc\Application;

/**
 * Validate the environment is running 5.4.
 */
if (version_compare(PHP_VERSION, '5.4.0') === -1) {
    trigger_error(sprintf('Titon requires PHP 5.4 to run correctly, please upgrade your environment. You are using %s.', PHP_VERSION), E_USER_ERROR);
}

/**
 * Verify this script isn't called directly.
 */
if (__FILE__ === str_replace(['\\', '/'], DIRECTORY_SEPARATOR, $_SERVER['SCRIPT_FILENAME'])) {
    trigger_error('Application failed to run. Please run through the webroot.', E_USER_ERROR);
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
define('WEB_DIR', APP_DIR . 'web' . DS);

/**
 * --------------------------------------------------------------
 *  Composer Autoloader
 * --------------------------------------------------------------
 *
 * Make use of Composers built-in autoloader for all classes and
 * vendor libraries used in the application. Store a reference
 * to composer in case we need to modify the loader.
 */

$composer = require_once VENDOR_DIR . 'autoload.php';

Registry::set($composer, 'titon.composer');

/**
 * --------------------------------------------------------------
 *  Application Bootstrap
 * --------------------------------------------------------------
 *
 * Now it's time to start the application. We can do this by
 * instantiating a new Application object. We'll use a multiton
 * so that we can access the Application object statically.
 * Lastly, pass in a Request and Response object as constructor
 * parameters, which will be passed down to child classes.
 */

$app = Application::getInstance('default', [new Request(), new Response()]);

/**
 * Bootstrap the application with configuration.
 * Order here is extremely critical, do not change!
 */
foreach (['setup', 'registry', 'environments', 'cache', 'locales', 'database', 'modules', 'routes'] as $config) {
    $path = sprintf(RESOURCES_DIR . 'bootstrap/%s.php', $config);

    if (file_exists($path)) {
        require_once $path;
    }
}

/**
 * Now we can run the application. We want to pass the webroot
 * so that symlinking of assets work properly.
 */
$app->run(WEB_DIR);
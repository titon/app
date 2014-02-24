<?php
/**
 * @copyright   2010-2014, The Titon Project
 * @license     http://opensource.org/licenses/bsd-license.php
 * @link        http://titon.io
 */

use Titon\Cache\Storage\FileSystemStorage;
use Titon\Common\Config;
use Titon\Debug\Debugger;
use Titon\Mvc\Application;

/**
 * --------------------------------------------------------------
 *  Development
 * --------------------------------------------------------------
 *
 * Configuration pertaining to development environments should
 * be defined here. It will be bootstrapped automatically.
 */

$app = Application::getInstance();

/**
 * Update caching to use the file system.
 */
$app->get('cache')->addStorage('default', new FileSystemStorage([
    'directory' => TEMP_DIR . 'cache/'
]));

/**
 * Enable error reporting.
 */
Debugger::enable(true);

/**
 * Define database login credentials.
 */
Config::set('db.default', [
    'host' => 'localhost',
    'port' => 3306,
    'user' => 'root',
    'pass' => '',
    'database' => '',
    'encoding' => 'utf8'
]);
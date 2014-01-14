<?php
/**
 * @copyright   2010-2013, The Titon Project
 * @license     http://opensource.org/licenses/bsd-license.php
 * @link        http://titon.io
 */

use Titon\Cache\Storage\MemcacheStorage;
use Titon\Common\Config;
use Titon\Mvc\Application;

$app = Application::getInstance();

// Use memcache in prod
$app->get('cache')->addStorage(new MemcacheStorage('default'));

// Set database login
Config::set('db.common', [
    'host' => 'localhost',
    'port' => 3306,
    'user' => 'user',
    'pass' => 'pass'
]);
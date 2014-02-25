<?php
/**
 * @copyright   2010-2014, The Titon Project
 * @license     http://opensource.org/licenses/bsd-license.php
 * @link        http://titon.io
 */

use Titon\Cache\Storage\FileSystemStorage;
use Titon\Cache\Storage\MemoryStorage;
use Titon\Mvc\Application;

$app = Application::getInstance();

/**
 * --------------------------------------------------------------
 *  Caching
 * --------------------------------------------------------------
 *
 * A storage engine can be defined to cache data for a duration.
 * Engines that differ between environments should be installed
 * through environment bootstraps.
 */

/** @type \Titon\Cache\Cache $cache */
$cache = $app->get('cache');

/**
 * Cache data for the duration of the request.
 */
$cache->addStorage('default', new MemoryStorage());

/**
 * Cache globalization messages.
 */
$cache->addStorage('g11n', new FileSystemStorage(['directory' => TEMP_DIR . 'cache/g11n/']));

/**
 * Cache database queries.
 */
$cache->addStorage('sql', new FileSystemStorage(['directory' => TEMP_DIR . 'cache/sql/']));
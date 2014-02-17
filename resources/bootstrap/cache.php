<?php
/**
 * @copyright   2010-2014, The Titon Project
 * @license     http://opensource.org/licenses/bsd-license.php
 * @link        http://titon.io
 */

use Titon\Cache\Storage\FileSystemStorage;
use Titon\Cache\Storage\MemoryStorage;
use Titon\Mvc\Application;

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
$cache = Application::getInstance()->get('cache');

/**
 * Cache data for the duration of the request.
 */
$cache->addStorage(new MemoryStorage('default'));

/**
 * Cache globalization messages.
 */
$cache->addStorage(new FileSystemStorage('g11n', ['directory' => TEMP_DIR . 'cache']));

/**
 * Cache database queries.
 */
$cache->addStorage(new FileSystemStorage('sql', ['directory' => TEMP_DIR . 'cache']));
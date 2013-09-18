<?php
/**
 * @copyright   2010-2013, The Titon Project
 * @license     http://opensource.org/licenses/bsd-license.php
 * @link        http://titon.io
 */

use Titon\Cache\Storage\MemoryStorage;
use Titon\Common\Config;
use Titon\Common\Registry;
use Titon\Debug\Logger;
use Titon\Model\Mysql\MysqlDriver;

/** @type \Titon\Model\Connection $db */
$db = Registry::factory('Titon\Model\Connection');

// Load MySQL driver
$db->addDriver(new MysqlDriver('common', Config::get('db.common')))
    ->setStorage(new MemoryStorage('sql'))
    ->setLogger(new Logger(TEMP_DIR . 'logs/'));
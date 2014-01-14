<?php
/**
 * @copyright   2010-2013, The Titon Project
 * @license     http://opensource.org/licenses/bsd-license.php
 * @link        http://titon.io
 */

use Titon\Cache\Storage\MemoryStorage;
use Titon\Common\Config;
use Titon\Debug\Logger;
use Titon\Db\Mysql\MysqlDriver;

/** @type \Titon\Db\Connection $db */
/*$db = $app->get('db');

// Load MySQL driver (requires db-mysql package)
$db->addDriver(new MysqlDriver('common', Config::get('db.common')))
    ->setStorage(new MemoryStorage('sql'))
    ->setLogger(new Logger(TEMP_DIR . 'logs/'));*/
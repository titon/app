<?php
/**
 * @copyright   2010-2014, The Titon Project
 * @license     http://opensource.org/licenses/bsd-license.php
 * @link        http://titon.io
 */

use Titon\Mvc\Application;

/**
 * --------------------------------------------------------------
 *  Database Connections
 * --------------------------------------------------------------
 *
 * Drivers can be used for database connections and are used
 * internally by the Repository and Model classes. All drivers,
 * excluding NoSQL drivers, use and require PDO extensions.
 */

$app = Application::getInstance();

/** @type \Titon\Db\Database $db */
$db = $app->get('db');

/**
 * Install the MySQL driver (requires db-mysql package).
 */
/*$db->addDriver('default', new MysqlDriver(Config::get('db.default')))
    ->setStorage($app->get('cache')->getStorage('sql'))
    ->setLogger(new Logger(TEMP_DIR . 'logs/sql/'));*/

/**
 * --------------------------------------------------------------
 *  Migrations
 * --------------------------------------------------------------
 */
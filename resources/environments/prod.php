<?php
/**
 * @copyright	Copyright 2010-2013, The Titon Project
 * @license		http://opensource.org/licenses/bsd-license.php
 * @link		http://titon.io
 */

use Titon\Common\Config;
use Titon\Debug\Debugger;

// Disable error reporting
Debugger::enable(false);

// Set database login
Config::set('db.common', [
	'host' => 'localhost',
	'port' => 3306,
	'user' => 'user',
	'pass' => 'pass'
]);
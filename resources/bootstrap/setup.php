<?php
/**
 * @copyright	Copyright 2010-2013, The Titon Project
 * @license		http://opensource.org/licenses/bsd-license.php
 * @link		http://titon.io
 */

use Titon\Common\Config;
use Titon\Debug\Debugger;
use Titon\Debug\Logger;

/**
 * Dates should always be UTC!
 */
date_default_timezone_set('UTC');

/**
 * Enable the debugger and logger to handle errors and exceptions.
 */
Debugger::initialize();
Debugger::setLogger(new Logger(TEMP_DIR . '/logs'));

/**
 * Define the primary configurations used by the application.
 */
Config::set('App', [
	'name' => 'Titon',
	'salt' => 'AN3sk8ANjsSl1Hwx910APs7lq8nmsP5LQmKC',
	'encoding' => 'UTF-8'
]);

/**
 * Define available lookup paths for specific resources.
 */
Config::set('Titon.path', [
	'resources' => [
		RESOURCES_DIR,
		MODULES_DIR . '{module}/resources',
		VENDOR_DIR . 'titon/g11n/src/resources'
	],
	'views' => [
		VIEWS_DIR
	]
]);
<?php
/**
 * @copyright	Copyright 2010-2013, The Titon Project
 * @license		http://opensource.org/licenses/bsd-license.php
 * @link		http://titon.io
 */

use Titon\Common\Config;

/**
 * Define the primary configuration used by the application.
 */
Config::set('App', [
	'name' => 'Titon',
	'salt' => 'AN3sk8ANjsSl1Hwx910APs7lq8nmsP5LQmKC',
	'encoding' => 'UTF-8'
]);

/**
 * Define the available resource locations.
 */
Config::set('Resource.paths', [
	RESOURCES_DIR,
	MODULES_DIR . '{module}/resources'
]);
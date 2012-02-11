<?php
/**
 * Titon: A PHP 5.4 Modular Framework
 *
 * @copyright	Copyright 2010, Titon
 * @link		http://github.com/titon
 * @license		http://opensource.org/licenses/bsd-license.php (The BSD License)
 */

namespace app\config;

use \titon\Titon;

/**
 * INI Settings
 *
 * Define application specific INI settings here as this file is bootstrapped first in the dispatch cycle.
 */

// Multibyte - http://php.net/manual/book.mbstring.php
ini_set('mbstring.func_overload', 7);

/**
 * Environments
 *
 * From here you can define all types of environmental configurations and host mappings.
 * The specific environment configuration file is loaded based on the current hostname.
 */

use \titon\core\Environment;

Titon::environment()
	->setup('dev', Environment::DEVELOPMENT, array('localhost', 'titon', '127.0.0.1'))
	->fallbackAs('dev');

/**
 * Configuration
 *
 * Define configuration values that should be global and persist across all environments.
 * Place environment specific config within the environment specific file.
 */

Titon::config()
	->set('App', array(
		'name' => 'Titon',
		'salt' => '66c63d989368170aff46040ab2353923',
		'seed' => 'nsdASDn7012dn1dsjSa',
		'encoding' => 'UTF-8'
	))
	->set('Debug', array(
		'level' => 2,
		'email' => ''
	));

/**
 * Caching
 *
 * Setup unique storage engines to cache your data throughout your application.
 * A storage engine implementing the Storage interface can be instantiated using the Titon::cache() system.
 */

use \titon\libs\storage\cache\FileSystemStorage;
use \titon\libs\storage\cache\MemoryStorage;

/**
 * Globalization
 */

use \titon\libs\translators\core\PhpTranslator;

/*Titon::g11n()
	->setup(array(
		'en',
		'en-gb' => array(
			'timezone' => 'Europe/London'
		),
		'es',
		'es-mx'
	))
	->fallbackAs('en')
	->setTranslator(new PhpTranslator())
	;//->setStorage(new MemoryStorage()); */


/**
 * Dispatching
 */

use \titon\libs\dispatchers\front\FrontLightDispatcher;

Titon::dispatch()->setup(new FrontLightDispatcher());
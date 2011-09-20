<?php
/**
 * Titon: The PHP 5.3 Micro Framework
 *
 * @copyright	Copyright 2009-2010, Titon
 * @link		http://github.com/titon
 * @license		http://opensource.org/licenses/bsd-license.php (The BSD License)
 */

namespace app\modules\pages;

use \titon\Titon;

/**
 * Each module contains its own specific bootstrap file. This bootstrap is automatically included within the dispatch cycle.
 * The bootstrap can be used to quickly configure the module, its controllers, and other libraries. 
 * You may also place custom global functions here specific to this module.
 */

Titon::app()->setup('pages', __DIR__, array(
	'index' => 'IndexController'
));

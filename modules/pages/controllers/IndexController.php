<?php
/**
 * Titon: A PHP 5.4 Modular Framework
 *
 * @copyright	Copyright 2010, Titon
 * @link		http://github.com/titon
 * @license		http://opensource.org/licenses/bsd-license.php (The BSD License)
 */

namespace app\modules\pages\controllers;

use \app\AppController;

/**
 * Each module requires an IndexController to be the entry point for the module.
 */
class IndexController extends AppController {

	/**
	 * The index() action is called automatically as the index page of a controller.
	 */
	public function index() {
		//$this->engine->set('pageTitle', 'Titon: Controller');
	}

}
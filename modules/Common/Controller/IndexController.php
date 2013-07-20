<?php
/**
 * @copyright	Copyright 2010-2013, The Titon Project
 * @license		http://opensource.org/licenses/bsd-license.php
 * @link		http://titon.io
 */

namespace Common\Controller;

/**
 * Handles the root index of the application.
 *
 * @package Common\Controller
 */
class IndexController extends CommonController {

	/**
	 * Index action.
	 */
	public function index() {
		$this->getView()->setVariable('pageTitle', 'Titon Framework');

		// Some kind of logic here
		// View will automatically be rendered
	}

}
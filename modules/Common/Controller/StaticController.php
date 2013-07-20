<?php
/**
 * @copyright	Copyright 2010-2013, The Titon Project
 * @license		http://opensource.org/licenses/bsd-license.php
 * @link		http://titon.io
 */

namespace Common\Controller;

use Titon\G11n\Utility\Inflector;

/**
 * The static controller will handle all static pages.
 *
 * @package Common\Controller
 */
class StaticController extends CommonController {

	/**
	 * Grab any path after /static/ in the URL and use that as the template to render.
	 */
	public function index() {
		$path = $this->config->get('path') ?: 'index';

		// Remove action from being formatted into the template path
		if ($path !== 'index') {
			$this->config->remove('action');
		}

		// Set a page title based off the path
		$this->getView()->setVariable('pageTitle', Inflector::normalCase(str_replace('/', ' ', $path)));
	}

}
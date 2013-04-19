<?php
/**
 * @copyright	Copyright 2010-2013, The Titon Project
 * @license		http://opensource.org/licenses/bsd-license.php
 * @link		http://titon.io
 */

namespace Common\Controller;

use Titon\Mvc\Controller\AbstractController;
use Titon\Mvc\Engine\ViewEngine;
use Titon\Mvc\Helper\Html\HtmlHelper;
use Titon\Mvc\View;

/**
 * Common controller that all other controllers should inherit.
 * Will define shared functionality.
 */
class CommonController extends AbstractController {

	/**
	 * Set the view rendering layer.
	 */
	public function initialize() {
		$view = new View($this->getModule()->getViewPath());
		$view->setEngine(new ViewEngine());
		$view->addHelper('html', new HtmlHelper());

		$this->setView($view);
	}

}
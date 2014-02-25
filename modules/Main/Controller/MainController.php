<?php
/**
 * @copyright   2010-2014, The Titon Project
 * @license     http://opensource.org/licenses/bsd-license.php
 * @link        http://titon.io
 */

namespace Main\Controller;

use Titon\Common\Registry;
use Titon\Mvc\Controller;

/**
 * Main controller defines shared functionality that all other controllers should inherit.
 *
 * @package Main\Controller
 */
abstract class MainController extends Controller {

    /**
     * Set the view rendering layer.
     */
    public function initialize() {
        parent::initialize();

        /** @type \Titon\View\View $view */
        $view = Registry::get('titon.view');
        $view->addPath($this->getModule()->getViewPath());

        $this->setView($view);
    }

}
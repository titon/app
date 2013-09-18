<?php
/**
 * @copyright   2010-2013, The Titon Project
 * @license     http://opensource.org/licenses/bsd-license.php
 * @link        http://titon.io
 */

namespace Common\Controller;

use Titon\Common\Registry;
use Titon\Controller\Controller\AbstractController;
use Titon\View\Engine\ViewEngine;
use Titon\View\Helper\Html\AssetHelper;
use Titon\View\Helper\Html\HtmlHelper;
use Titon\View\View;

/**
 * Common controller that all other controllers should inherit.
 * Will define shared functionality.
 *
 * @package Common\Controller
 */
class CommonController extends AbstractController {

    /**
     * Set the view rendering layer.
     */
    public function initialize() {
        $env = Registry::factory('Titon\Environment\Environment');

        $view = new View($this->getModule()->getViewPath());
        $view->setEngine(new ViewEngine());
        $view->addHelper('html', new HtmlHelper());
        $view->addHelper('asset', new AssetHelper());
        $view->setVariables([
            'env' => $env->current()->getKey()
        ]);

        $this->setView($view);
    }

}
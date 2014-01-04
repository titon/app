<?php
/**
 * @copyright   2010-2013, The Titon Project
 * @license     http://opensource.org/licenses/bsd-license.php
 * @link        http://titon.io
 */

namespace Common\Controller;

use Titon\Common\Registry;
use Titon\Controller\Controller\AbstractController;
use Titon\Mvc\Application;
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
        $app = Application::getInstance();

        // Pass route params to the engine making it accessible to the view config
        $engine = new ViewEngine($app->getRouter()->current()->getParams());

        // Initiate a new view renderer with template paths set to the current module
        $view = new View($this->getModule()->getViewPath());
        $view->setEngine($engine);

        // Add helpers that can be accessible in the views
        $view->addHelper('html', new HtmlHelper());
        $view->addHelper('asset', new AssetHelper());

        // Set variables that are also accessible
        $view->setVariables([
            'env' => $app->get('env')->current()->getKey()
        ]);

        $this->setView($view);
    }

}
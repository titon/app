<?php
/**
 * @copyright   2010-2014, The Titon Project
 * @license     http://opensource.org/licenses/bsd-license.php
 * @link        http://titon.io
 */

namespace Main\Controller;

use Titon\Mvc\Controller;
use Titon\Mvc\View;
use Titon\View\Helper\BlockHelper;
use Titon\View\Helper\Html\AssetHelper;
use Titon\View\Helper\Html\HtmlHelper;
use Titon\View\View\Engine\TemplateEngine;

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

        $app = $this->getApplication();

        // Pass route params to the engine making it accessible to the view config
        $engine = new TemplateEngine($app->getRouter()->current()->getParams());

        // Initiate a new view renderer with template paths set to the current module
        $view = new View($this->getModule()->getViewPath());
        $view->setEngine($engine);

        // Add helpers that can be accessible in the views
        $view->addHelper('html', new HtmlHelper());
        $view->addHelper('asset', new AssetHelper(['webroot' => $app->getWebroot()]));
        $view->addHelper('block', new BlockHelper());

        // Set variables that are also accessible
        $view->setVariables([
            'env' => $app->get('env')->current()->getKey()
        ]);

        $this->setView($view);
    }

}
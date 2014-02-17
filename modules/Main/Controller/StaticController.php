<?php
/**
 * @copyright   2010-2014, The Titon Project
 * @license     http://opensource.org/licenses/bsd-license.php
 * @link        http://titon.io
 */

namespace Main\Controller;

use Titon\G11n\Utility\Inflector;

/**
 * The static controller will handle all static pages.
 *
 * @package Main\Controller
 */
class StaticController extends MainController {

    /**
     * Grab any path after /static/ in the URL and use that as the template to render.
     */
    public function index() {
        $path = $this->getConfig('path') ?: 'index';

        // Set a page title and render the view using the path
        return $this->getView()
            ->setVariable('pageTitle', Inflector::normalCase(str_replace('/', ' ', $path)))
            ->run('static/' . $path);
    }

}
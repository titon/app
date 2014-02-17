<?php
/**
 * @copyright   2010-2014, The Titon Project
 * @license     http://opensource.org/licenses/bsd-license.php
 * @link        http://titon.io
 */

namespace Main\Controller;

/**
 * Handles the root index of the application.
 *
 * @package Main\Controller
 */
class IndexController extends MainController {

    /**
     * Index action.
     */
    public function index() {
        $this->getView()->setVariable('pageTitle', 'Titon Framework');
    }

}
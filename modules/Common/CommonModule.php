<?php
/**
 * @copyright   2010-2013, The Titon Project
 * @license     http://opensource.org/licenses/bsd-license.php
 * @link        http://titon.io
 */

namespace Common;

use Titon\Mvc\Application;
use Titon\Mvc\Module\AbstractModule;

/**
 * A module that represents common application functionality like the index or static pages.
 *
 * @package Common
 */
class CommonModule extends AbstractModule {

    /**
     * Whitelist the controllers that should be URL accessible.
     */
    public function initialize() {
        parent::initialize();

        $this->setControllers([
            'index' => 'Common\Controller\IndexController', // /
            'static' => 'Common\Controller\StaticController' // /static/
        ]);
    }

    /**
     * Bootstrap the module by setting routes or modifying configuration.
     */
    public function bootstrap(Application $app) {
        parent::bootstrap($app);
    }

}
<?php
/**
 * @copyright   2010-2014, The Titon Project
 * @license     http://opensource.org/licenses/bsd-license.php
 * @link        http://titon.io
 */

namespace Main;

use Titon\Mvc\Application;
use Titon\Mvc\Module\AbstractModule;

/**
 * A module that represents shared application functionality between all modules.
 *
 * @package Main
 */
class MainModule extends AbstractModule {

    /**
     * Whitelist the controllers that should be URL accessible.
     */
    public function initialize() {
        parent::initialize();

        $this->setControllers([
            'index' => 'Main\Controller\IndexController', // /
            'static' => 'Main\Controller\StaticController' // /static/
        ]);
    }

    /**
     * Bootstrap the module by setting routes or modifying configuration.
     */
    public function bootstrap(Application $app) {
        parent::bootstrap($app);
    }

}
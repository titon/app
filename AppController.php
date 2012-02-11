<?php
/**
 * Titon: A PHP 5.4 Modular Framework
 *
 * @copyright	Copyright 2010, Titon
 * @link		http://github.com/titon
 * @license		http://opensource.org/licenses/bsd-license.php (The BSD License)
 */

namespace app;

use \titon\Titon;
use \titon\libs\controllers\ControllerAbstract;

/**
 * AppController acts as a gateway between the client controller and the system controller.
 * This allows the client controllers to inheriet base functionality, 
 * as well as share functionality between other controllers.
 *
 * @package	app
 * @uses	titon\Titon
 */
class AppController extends ControllerAbstract {

	/**
	 * Define global helpers and objects.
	 * 
	 * @access public
	 * @return type 
	 */
	public function initialize() {
		parent::initialize();
		
		/*$this->attachObject('session', function($self) {
			$storage = new \titon\libs\storage\cache\FileSystemStorage(array('prefix' => 'session.'));
			$adapter = new \titon\libs\adapters\session\CacheAdapter($storage);
			$session = new \titon\state\Session();
			$session->setAdapter($adapter);
			
			return $session;
		});
		
		$this->view->addHelper('html', function($self) {
			return Titon::registry()->factory('titon\libs\helpers\html\HtmlHelper');
		});
		
		$this->view->addHelper('form', function($self) {
			return Titon::registry()->factory('titon\libs\helpers\html\FormHelper');
		});
		
		$this->view->addHelper('asset', function($self) {
			return Titon::registry()->factory('titon\libs\helpers\html\AssetHelper');
		});
		
		$this->view->addHelper('breadcrumb', function($self) {
			return Titon::registry()->factory('titon\libs\helpers\html\BreadcrumbHelper');
		});*/
	}
	
}

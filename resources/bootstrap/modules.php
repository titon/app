<?php
/**
 * @copyright	Copyright 2010-2013, The Titon Project
 * @license		http://opensource.org/licenses/bsd-license.php
 * @link		http://titon.io
 */

use Titon\Mvc\Application;

$app = Application::getInstance();
$app->addModule(new Common\CommonModule('common', MODULES_DIR . 'Common'));

<?php
/**
 * @copyright	Copyright 2010-2013, The Titon Project
 * @license		http://opensource.org/licenses/bsd-license.php
 * @link		http://titon.io
 */

use Titon\Environment\Environment;
use Titon\Environment\Host;

// Development
Environment::addHost(new Host('dev', ['localhost', '127.0.0.', '::1']))
	->setBootstrap(RESOURCES_DIR . 'environments/dev.php');

// Production
Environment::addHost(new Host('prod', 'titon.io', Environment::PRODUCTION))
	->setBootstrap(RESOURCES_DIR . 'environments/prod.php');

// Fallback as production
Environment::setFallback('prod');

// Initialize
Environment::initialize();
<?php
/**
 * @copyright   2010-2013, The Titon Project
 * @license     http://opensource.org/licenses/bsd-license.php
 * @link        http://titon.io
 */

use Titon\Common\Registry;
use Titon\Environment\Environment;
use Titon\Environment\Host;

/** @type \Titon\Environment\Environment $env */
$env = Registry::factory('Titon\Environment\Environment');

// Development
$env->addHost(new Host('dev', ['localhost', '127.0.0.1', '::1']))
    ->setBootstrap(RESOURCES_DIR . 'environments/dev.php');

// Production
$env->addHost(new Host('prod', 'titon.io', Environment::PRODUCTION))
    ->setBootstrap(RESOURCES_DIR . 'environments/prod.php');

// Fallback as production
$env->setFallback('prod');

// Initialize
$env->initialize();

// Store in the app
$app->set('env', $env);
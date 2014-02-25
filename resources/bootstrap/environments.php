<?php
/**
 * @copyright   2010-2014, The Titon Project
 * @license     http://opensource.org/licenses/bsd-license.php
 * @link        http://titon.io
 */

use Titon\Environment\Environment;
use Titon\Environment\Host;
use Titon\Mvc\Application;

$app = Application::getInstance();

/**
 * --------------------------------------------------------------
 *  Environments
 * --------------------------------------------------------------
 *
 * Different sets of configuration can be mapped through hosts
 * and IP addresses. This allows for separate configurations for
 * development, production, and staging.
 */

/** @type \Titon\Environment\Environment $env */
$env = $app->get('env');

/**
 * Map environments by IP address or host name.
 */
$env->addHost('dev', new Host(['localhost', '127.0.0.1', '::1']));
$env->addHost('prod', new Host('titon.io', Environment::PRODUCTION));

/**
 * Fallback to production if no host can be matched.
 * This should rarely change as we do not want dev
 * settings applied in a production environment.
 */
$env->setFallback('prod');

/**
 * Initialize the environment by matching to a host
 * and bootstrapping any configuration.
 */
$env->initialize();
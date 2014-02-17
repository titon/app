<?php
/**
 * @copyright   2010-2014, The Titon Project
 * @license     http://opensource.org/licenses/bsd-license.php
 * @link        http://titon.io
 */

use Titon\G11n\Locale;
use Titon\G11n\Translator\MessageTranslator;
use Titon\Io\Reader\PhpReader;
use Titon\Mvc\Application;

/**
 * --------------------------------------------------------------
 *  Globalization
 * --------------------------------------------------------------
 *
 * Localization (l10n) and internationalization (i18n) can be
 * achieved through the globalization (g11n) layer. Mapping
 * locales provide pre-defined validation, inflection, and
 * formatting rules, as well as internal translation messages.
 */

$app = Application::getInstance();

/** @type \Titon\G11n\G11n $g11n */
$g11n = $app->get('g11n');

/**
 * Map all locales specific to the application. Parent locales
 * (en -> en_US) will automatically be added when a child is.
 */
$g11n->addLocale(new Locale('en_US'));

/**
 * Define the type of Translator to use for message lookup.
 * By default, let's use a MessageTranslator that reads PHP files.
 */
$g11n->setTranslator(new MessageTranslator())
    ->setReader(new PhpReader())
    ->setStorage($app->get('cache')->getStorage('g11n'));

/**
 * The language to fallback to if none can be detected in the
 * URL or within cookies.
 */
$g11n->setFallback('en');

/**
 * Initialize and match locales based on HTTP headers.
 */
$g11n->initialize();
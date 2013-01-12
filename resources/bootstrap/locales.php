<?php
/**
 * @copyright	Copyright 2010-2013, The Titon Project
 * @license		http://opensource.org/licenses/bsd-license.php
 * @link		http://titon.io
 */

use Titon\G11n\G11n;
use Titon\G11n\Locale;
use Titon\G11n\Translator\MessageTranslator;
use Titon\Io\Reader\PhpReader;
use Titon\Cache\Storage\MemoryStorage;

// English (US)
G11n::addLocale(new Locale('en_US'));

// Set a default translator
G11n::setTranslator(new MessageTranslator())
	->setReader(new PhpReader())
	->setStorage(new MemoryStorage());

// Fallback as english
G11n::setFallback('en');

// Initialize
G11n::initialize();
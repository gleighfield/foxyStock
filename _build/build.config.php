<?php
/**
 * Define the MODX path constants necessary for installation
 *
 * @package foxyStock
 * @subpackage build
 */
define('MODX_BASE_PATH', dirname(dirname(dirname(dirname(__FILE__)))) . '/www/');
define('MODX_CORE_PATH', MODX_BASE_PATH . 'core/');
define('MODX_MANAGER_PATH', MODX_BASE_PATH . 'manager/');
define('MODX_CONNECTORS_PATH', MODX_BASE_PATH . 'connectors/');
define('MODX_ASSETS_PATH', MODX_BASE_PATH . 'assets/');
<?php
/**
 * Autoloader
 *
 * @package MSCFL Net Worth Tracker
 * @author Selene <hello@mysocalledfinanciallife.co>
 * @copyright Copyright (c) 2015, Selene (https://mysocalledfinanciallife.co)
 * @license GPLv2
 * @link https://mysocalledfinanciallife.co/plugins/net-worth-tracker
 * @version 1.0.0
 */

/**
 * Require the custom.php file if present.
 */
$custom = stream_resolve_include_path('custom.php');
if (false !== $custom) {
    require_once $custom;
}

spl_autoload_extensions('.php');

/**
 * The Autoloader function
 *
 * @param string $class The class name
 *
 * @return void
 * @access public
 */
spl_autoload_register(function ($class){
    $class = explode('\\', $class);

    // Only autoload files in the MySoCalledFinancialLife namespace
    if ($class[0] != 'MySoCalledFinancialLife') {
        return;
    }

    $class = implode(DIRECTORY_SEPARATOR, $class);
    $class = $class.'.php';
    $file = stream_resolve_include_path($class);
    if (false !== $file) {
        include_once $file;
    }
});

<?php
/*
Plugin Name: My So-Called Financial Life Net Worth Tracker
Plugin URI: http://mysocalledfinanciallife.co/plugins/net-worth-tracker
Description: Track your net worth and display on your site (if you like).
Version: 1.0
Author: Selene at My So-Called Financial Life
Author URI: http://mysocalledfinanciallife.co
License: GPL 2+
*/

require_once 'autoload.php';

$settings = new MySoCalledFinancialLife\Admin\Settings;
$menu_item = $settings->addMenuItem();
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

// Initialize objects
$plugin = new MySoCalledFinancialLife\WP\Plugin;
$page = new MySoCalledFinancialLife\WP\Page;
$tracker = new MySoCalledFinancialLife\NetWorthTracker;

// Set the Page properties
$page->setMenuTitle('Net Worth Tracker');
$page->setPageTitle('My So-Called Financial Life Net Worth Tracker');
$page->setCapability('manage_options');
$page->setParentMenu('tools');
$page->setSlug('mscfl-net-worth-tracker');
$page->setTemplate(dirname(__FILE__).'/templates/net-worth-tracker.php');

// Add actions
$plugin->addAction('admin_menu', array($page, 'init'));
$plugin->addAction('wp_ajax_getNetWorth', array($tracker, 'getNetWorth'));

$plugin->onActivation(__FILE__, 'mscflNwtActivate');
$plugin->onDeactivation();

$plugin->runActions();


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

$page = new MySoCalledFinancialLife\WP\Page;
$page->setMenuTitle('Net Worth Tracker');
$page->setPageTitle('My So-Called Financial Life Net Worth Tracker');
$page->setCapability('manage_options');
$page->setParentMenu('tools');
$page->setSlug('mscfl-net-worth-tracker');
$page->setTemplate(WP_PLUGIN_DIR.'/mscfl-net-worth-tracker/templates/net-worth-tracker.php');

$plugin = new MySoCalledFinancialLife\WP\Plugin;
$plugin->addAction('admin_menu', $page);

function activate() {
    // Create the tables needed
    global $wpdb;
    $charset = $wpdb->get_charset_collate();
    $accounts = $wpdb->prefix.'mscflnwt_accounts';
    $history = $wpdb->prefix.'mscflnwt_history';

    $accounts_sql = "CREATE TABLE IF NOT EXISTS $accounts (
        account_id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
        created_date INT(11) UNSIGNED,
        name VARCHAR(255),
        description VARCHAR(512),
        initial_balance FLOAT(10,2),
        UNIQUE KEY account_id (account_id)
    ) $charset;";

    $history_sql = "CREATE TABLE IF NOT EXISTS $history (
        history_id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
        date INT(11) UNSIGNED,
        account_id INT(11),
        description VARCHAR(1024),
        balance FLOAT(10,2),
        UNIQUE KEY history_id (history_id)
    ) $charset;";

    require_once ABSPATH.'wp-admin/includes/upgrade.php';
    dbDelta($accounts_sql);
    dbDelta($history_sql);
}
$plugin->onActivation(__FILE__, 'activate');
$plugin->onDeactivation();


$plugin->runActions();


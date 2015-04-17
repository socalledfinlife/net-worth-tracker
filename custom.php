<?php
/**
 * The custom.php file stores functions for this specific plugin.
 */

/**
 * Create database tables when the plugin is activated
 *
 * @return void
 */
function mscflNwtActivate() {
    // Create the tables needed
    global $wpdb;
    $charset = $wpdb->get_charset_collate();
    $accounts = $wpdb->prefix.'mscflnwt_accounts';
    $history = $wpdb->prefix.'mscflnwt_history';

    $accounts_sql = "CREATE TABLE IF NOT EXISTS $accounts (
        account_id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
        user_id INT(11) UNSIGNED,
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

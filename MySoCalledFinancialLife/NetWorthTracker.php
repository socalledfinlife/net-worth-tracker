<?php
/**
 * Net Worth Tracker
 *
 * @package MSCFL Net Worth Tracker
 * @author Selene <hello@mysocalledfinanciallife.co>
 * @copyright Copyright (c) 2015, Selene (https://mysocalledfinanciallife.co)
 * @license GPLv2
 * @link https://mysocalledfinanciallife.co/plugins/net-worth-tracker
 * @version 1.0.0
 */

namespace MySoCalledFinancialLife;

use DateTime;
use Exception;

class NetWorthTracker
{
    public function __construct()
    {
        // Add Menu to 'Tools' menu
        add_action('admin_menu', array($this, 'addMenuItem'));
    }

    public function addMenuItem()
    {
        add_submenu_page(
            'tools.php',
            'My So-Called Financial Life Net Worth Tracker',
            'Net Worth Tracker',
            'manage_options',
            'mscfl-net-worth-tracker.php',
            array($this, 'renderOptionsPage')
        );
    }
}
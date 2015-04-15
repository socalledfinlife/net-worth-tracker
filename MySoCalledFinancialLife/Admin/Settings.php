<?php
/**
 * Settings
 *
 * Manages creating administration screens and various settings
 *
 * @package MSCFL
 * @author Selene <hello@mysocalledfinanciallife.co>
 * @copyright Copyright (c) 2015, Selene (https://mysocalledfinanciallife.co)
 * @license GPLv2
 * @link https://mysocalledfinanciallife.co/
 * @version 1.0.0
 */

namespace MySoCalledFinancialLife\Admin;

use DateTime;
use Exception;

class Settings
{
    public function __construct()
    {
        // Add Menu to 'Tools' menu
        // add_action('admin_menu', array($this, 'addMenuItem'));
    }

    public function addMenuItem(
        $page_title,
        $menu_title
    ) {

    }

    public function OldaddMenuItem()
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
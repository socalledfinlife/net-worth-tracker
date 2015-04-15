<?php
/**
 * Page
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

class Page
{
    private $capability;
    private $menu_title;
    private $page_title;
    private $parent_menu;

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
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

namespace MySoCalledFinancialLife\WP;

use DateTime;
use Exception;

class Page
{
    private $capability;
    private $menu_title;
    private $page_title;
    private $parent_menu;
    private $slug;
    private $style_name;
    private $stylesheet_file;
    private $template;
    private $wp_page;

    public function init()
    {
        if (null !== $this->parent_menu) {
            $this->wp_page = add_submenu_page(
                $this->parent_menu,
                $this->page_title,
                $this->menu_title,
                $this->capability,
                $this->slug,
                array($this, 'renderPage')
            );
        }
    }

    public function renderPage()
    {
        if (!current_user_can($this->capability)) {
            wp_die(__('You do not have sufficient permissions to access this page.'));
        }
        if (null !== $this->template) {
            include_once $this->template;
        } else {
            die('No template found for '.$this->page_title);
        }
    }

    public function renderStyles()
    {
        wp_enqueue_style($this->style_name, $this->stylesheet_file);
    }

    public function setCapability($capability)
    {
        $this->capability = $capability;
    }

    public function setMenuTitle($menu_title)
    {
        $this->menu_title = $menu_title;
    }

    public function setPageTitle($page_title)
    {
        $this->page_title = $page_title;
    }

    public function setParentMenu($parent_menu)
    {
        $parent_menu = strtolower($parent_menu);
        if (!preg_match('/.php/', $parent_menu)) {
            $parent_menu = $parent_menu.'.php';
        }
        $this->parent_menu = $parent_menu;
    }

    public function setSlug($slug)
    {
        $slug = strtolower($slug);
        if (!preg_match('/.php/', $slug)) {
            $slug = $slug.'.php';
        }
        $this->slug = $slug;
    }

    public function setStyle($style_name, $location)
    {
        $this->style_name = $style_name;
        $this->stylesheet_file = $location;
    }

    public function setTemplate($file)
    {
        $template = stream_resolve_include_path($file);
        if (false !== $template) {
            $this->template = $template;
        }
    }

    public function addMenuItem()
    {
        add_action('admin_menu', array($this, 'renderMenuItem'));
    }
}
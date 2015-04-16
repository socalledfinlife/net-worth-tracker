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

namespace MySoCalledFinancialLife\WP;

use DateTime;
use Exception;

class Plugin
{
    private $actions = array();

    public function addAction($hook, $object)
    {
        $this->actions[] = array(
            'hook' => $hook,
            'object' => $object
        );
    }

    public function onActivation($file, $callback)
    {
        register_activation_hook($file, $callback);
    }

    public function onDeactivation()
    {

    }

    public function runActions()
    {
        foreach ($this->actions as $action) {
            add_action($action['hook'], array($action['object'], 'init'));
        }
    }
}
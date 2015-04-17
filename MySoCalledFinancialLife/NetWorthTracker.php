<?php
/**
 * Net Worth Tracker
 *
 * Manages calculations and display of net worth
 *
 * @package MSCFL
 * @author Selene <hello@mysocalledfinanciallife.co>
 * @copyright Copyright (c) 2015, Selene (https://mysocalledfinanciallife.co)
 * @license GPLv2
 * @link https://mysocalledfinanciallife.co/
 * @version 1.0.0
 */

namespace MySoCalledFinancialLife;

use DateTime;
use Exception;

class NetWorthTracker
{
    public function getNetWorth()
    {
        $user = wp_get_current_user();
        $this->returnStatus(array('status' => 'success'));
    }

    public function returnStatus($array)
    {
        header('HTTP/1.1 200 OK');
        header('Content-Type: application/json');
        echo json_encode($array);
        exit;
    }
}

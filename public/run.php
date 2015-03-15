<?php

include_once('../pi.php');

$return;

switch ($_GET['cmd']) {
    case 'temps':
        $return = Pi::getTemps();
        break;

    case 'cpu':
        $return = Pi::getCPUUsage();
        break;

    case 'hostname':
        $return = Pi::getHostname();
        break;

    case 'ip':
        $return = Pi::getIPAddress();
        break;

    case 'uptime':
        $return = Pi::getUptime();
        break;

    default:
        $return = 'Invalid command';
        break;
}

echo json_encode($return);

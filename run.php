<?php

include_once('pi.php');

$return;

switch ($_GET['cmd']) {
    case 'temps':
        $return = Pi::getTemps();
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

    case 'shutdown':
        Pi::shutdown();
        break;

    case 'reboot':
        Pi::reboot();
        break;

    default:
        $return = 'Invalid command';
        break;
}

echo json_encode($return);

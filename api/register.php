<?php
// allow the config
define('__CONFIG__', true);
// require the config
require_once '../inc/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // always return JSON format
    header('Content-Type: application/json');
    $return = [];

    $return['redirect'] = 'php-login-registration/dashboard.php';

    echo json_encode($return, JSON_PRETTY_PRINT);

} else {
    header('Location: ../index.php');
    exit();
}

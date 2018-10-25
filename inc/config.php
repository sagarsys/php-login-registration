<?php
// if no const __CONFIG__ is defined, do not load this file
if (!defined('__CONFIG__')) {
    exit('You do not have any configurations');
}

// config

/**
 * Debug Mode
 * Uncomment to enable
 */
error_reporting(-1);
ini_set('display_errors', 'On');

/** DB CONNECTION
// NOTE: For security purposes, this file is usually found
// outside of the publicly accessible folder on the server
 **/
include_once 'classes/DB.php';
$con = DB::getConnection();

/**
 * Filter to sanitize USER input before insertion into the DB
 */
include_once 'classes/Filter.php';
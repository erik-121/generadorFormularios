<?php

/**
 * Configuration for database connection
 *
 */

$host       = "172.20.8.81:3306";
$username   = "usuarionuevo";
$password   = "Valencia2017";
$dbname     = "wf_ayuntamiento"; // will use later
$dsn        = "mysql:host=$host;dbname=$dbname"; // will use later
$options    = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"
              );
?>
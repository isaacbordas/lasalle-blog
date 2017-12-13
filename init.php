<?php
require "vendor/autoload.php";
require "config.php";
require "db.pdo.php";

if (debug === 1) {
    error_reporting(E_ALL | E_STRICT);
    ini_set("display_errors", 1);
    echo "Debug mode: ON";
}

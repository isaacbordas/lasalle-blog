<?php
include_once ('config.php');
include_once ('vendor/autoload.php');

$loader = new Twig_Loader_Filesystem('templates');
$twig = new Twig_Environment($loader, array(
    'debug' => true));
$twig->addExtension(new Twig_Extension_Debug());

if (debug === 1) {
    error_reporting(E_ALL | E_STRICT);
    ini_set("display_errors", 1);
}

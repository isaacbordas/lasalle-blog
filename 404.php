<?php

require "init.php";

$template = $twig->loadTemplate('404.html.twg');
echo $template->render(array('page_title' => 'Error 404: Página no encontrada'));

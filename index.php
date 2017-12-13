<?php

require "init.php";

use Model\Article;

$article = new Article();
$all = $article->getAll();

$loader = new Twig_Loader_Filesystem('templates');
$twig = new Twig_Environment($loader);
$template = $twig->loadTemplate('index.html.twg');
echo $template->render(array('articles' => $all, 'page_title' => 'Inicio: Listado de artículos'));

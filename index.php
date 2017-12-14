<?php

require "init.php";

use Model\Article;

$article = new Article();
$all = $article->getAll();

$template = $twig->loadTemplate('index.html.twg');
echo $template->render(array('articles' => $all, 'page_title' => 'Inicio: Listado de artículos'));

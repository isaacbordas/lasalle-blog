<?php

require "init.php";

use Model\Articles;

$isAdmin = (!empty($_GET['admin']) ? $_GET['admin'] : null);
$success = (!empty($_GET['success']) ? $_GET['success'] : null);

$article = new Articles();
$all = $article->getAll();

$template = $twig->loadTemplate('index.html.twg');
echo $template->render(array('articles' => $all, 'page_title' => 'Inicio: Listado de artículos', 'isAdmin' => $isAdmin, 'success' => $success));

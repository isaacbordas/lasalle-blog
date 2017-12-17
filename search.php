<?php

require "init.php";

use Model\Articles;

if (empty($_GET['searchby']) || empty($_GET['keyword'])) {
    header('Location: index.php?error=3');
    die();
}

$keyword = filter_input(INPUT_GET, 'keyword', FILTER_SANITIZE_STRING);
$searchParams = array(
    'searchby' => $_GET['searchby'],
    'keyword' => $keyword
);

$article = new Articles();
$searchArticle = $article->search($searchParams);

var_dump($searchArticle);
die();
/*
$tag = explode(',', $searchArticle[0]->tags);
$tags = array_map('trim', $tag);*/

$template = $twig->loadTemplate('searchArticle.html.twg');
echo $template->render(array('articles' => $searchArticle, 'page_title' => 'Search article'));

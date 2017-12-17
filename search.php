<?php

require "init.php";

use Model\Articles;

if (empty($_GET['searchby']) || empty($_GET['keyword']) {
    header('Location: index.php?error=3');
    die();
}

$keyword = filter_input(INPUT_GET, 'keyword', FILTER_SANITIZE_STRING);

$article = new Articles();
$searchArticle = $article->search($articleId);

$tag = explode(',', $oneArticle[0]->tags);
$tags = array_map('trim', $tag);

$template = $twig->loadTemplate('viewArticle.html.twg');
echo $template->render(array('articles' => $oneArticle, 'page_title' => $oneArticle[0]->title, 'etiquetas' => $tags));

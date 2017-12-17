<?php

require "init.php";

use Model\Articles;

$articleId = filter_input(INPUT_GET, 'articleid', FILTER_SANITIZE_NUMBER_FLOAT);
$articleId = (!empty($articleId) ? $articleId : null);

$article = new Articles();
$oneArticle = $article->getById($articleId);
var_dump($oneArticle);

$p_tag = $oneArticle->tags;
$tag = explode(',', $p_tag);
$tags = array_map('trim', $tag);

if (empty($oneArticle)) {
    header('Location: 404.php');
    die();
}

$template = $twig->loadTemplate('viewArticle.html.twg');
echo $template->render(array('article' => $oneArticle, 'page_title' => $oneArticle->getTitle(), 'etiquetas' => $tags));

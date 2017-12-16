<?php

require "init.php";

use Model\Articles;

$articleId = filter_input(INPUT_GET, 'articleid', FILTER_SANITIZE_NUMBER_FLOAT);
$articleId = (!empty($articleId) ? $articleId : null);

$article = new Articles();
$oneArticle = $article->getById($articleId);

$template = $twig->loadTemplate('viewArticle.html.twg');
echo $template->render(array('articles' => $oneArticle, 'page_title' => $oneArticle[0]->title));

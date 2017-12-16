<?php

require "init.php";

use Model\Articles;

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{

    $article = new Articles();
    $article->id = $_POST['articleId'];
    $article->title = $_POST['title'];
    $article->content = $_POST['content'];
    $article->author = $_POST['author'];
    $article->tags = $_POST['tags'];
    $result = $article->editArticle();

    if (!empty($result)) {
        header('Location: index.php?admin=1&success=1');
        die();
    } else {
        header('Location: editArticle.php?articleid=' . $article->id . '&error=1');
        die();
    }

}

$articleId = filter_input(INPUT_GET, 'articleid', FILTER_SANITIZE_NUMBER_FLOAT);
$articleId = (!empty($articleId) ? $articleId : null);

$article = new Articles();
$oneArticle = $article->getById($articleId);

$template = $twig->loadTemplate('editArticle.html.twg');
echo $template->render(array('articles' => $oneArticle, 'page_title' => 'Edit article: ' . $oneArticle[0]->title));

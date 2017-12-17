<?php

require "init.php";

use Model\Articles;

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{

    $id = filter_input(INPUT_POST, 'articleId', FILTER_VALIDATE_INT);
    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
    $content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_STRING);
    $tags = filter_input(INPUT_POST, 'tags', FILTER_SANITIZE_STRING);
    $author = filter_input(INPUT_POST, 'author', FILTER_VALIDATE_EMAIL);

    if (empty($title) || empty($content) || empty($author) || empty($tags)) {
        header('Location: editArticle.php?articleid=' . $id . '&error=1');
        die();
    }

    $article = new Articles();
    $article->id = $id;
    $article->title = $title;
    $article->content = $content;
    $article->author = $author;
    $article->tags = $tags;
    $article->created_at = time();
    $result = $article->editArticle();

    if (!empty($result)) {
        header('Location: index.php?admin=1&success=1');
        die();
    } else {
        header('Location: editArticle.php?articleid=' . $article->id . '&error=2');
        die();
    }

}

$articleId = filter_input(INPUT_GET, 'articleid', FILTER_SANITIZE_NUMBER_FLOAT);
$articleId = (!empty($articleId) ? $articleId : null);

$article = new Articles();
$oneArticle = $article->getById($articleId);

var_dump($oneArticle);

$tags = $oneArticle->getTag();

var_dump($tags);

if (empty($oneArticle)) {
    header('Location: 404.php');
    die();
}

$error = (!empty($_GET['error']) ? $_GET['error'] : null);

$template = $twig->loadTemplate('editArticle.html.twg');
echo $template->render(array('article' => $oneArticle, 'page_title' => 'Editar artículo: ' . $oneArticle->getTitle(), 'error' => $error));

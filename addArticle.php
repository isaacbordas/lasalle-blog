<?php

require "init.php";

use Model\Articles;

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{

    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
    $content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_STRING);
    $tags = filter_input(INPUT_POST, 'tags', FILTER_SANITIZE_STRING);
    $author = filter_input(INPUT_POST, 'author', FILTER_VALIDATE_EMAIL);

    if (empty($title) || empty($content) || empty($author) || empty($tags)) {
        header('Location: addArticle.php?error=1');
        die();
    }

    $article = new Articles();
    $article->title = $title;
    $article->content = $content;
    $article->author = $author;
    $article->tags = $tags;
    $article->created_at = time();
    $result = $article->addArticle();

    if (!empty($result)) {
        header('Location: index.php?admin=1&success=1');
        die();
    } else {
        header('Location: addArticle.php?error=2');
        die();
    }

}

$error = (!empty($_GET['error']) ? $_GET['error'] : null);

$template = $twig->loadTemplate('addArticle.html.twg');
echo $template->render(array('page_title' => 'Añadir artículo', 'error' => $error));

<?php

require "init.php";

use Model\Article;

$article = new Article();
$all = $article->getAll();
var_dump($all);

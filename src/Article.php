<?php
namespace Model;

class Article {

    protected $article = '';

    public function __construct()
    {
        $article = $this->article;
    }

    public function getAll()
    {
        $db = new Db();
        $db->query('SELECT * FROM articles');
        $row = $db->resultset();
        if ($db->rowCount() > 0){
            return $row[0];
        }else{
            return false;
        }
    }

}

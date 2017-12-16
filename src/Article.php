<?php
namespace Model;

class Article {

    private $id;
    private $title;
    private $author;
    private $content;
    private $tags;
    private $created_at;

    public function __construct(){}

    public function getAll()
    {
        $db = new Db();
        $db->query('SELECT * FROM articles');
        $row = $db->resultset(__CLASS__);

        if ($db->rowCount() > 0){
            return $row;
        }else{
            return false;
        }
    }

    public function getTitle()
    {
         return $this->title;
    }

    public function getId()
    {
         return $this->id;
    }

}

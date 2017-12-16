<?php

namespace Model;

class Articles extends Article
{

    public function getAll()
    {
        $db = new Db();
        $db->query('SELECT id, title, author, content, tags, created_at FROM articles');
        $row = $db->resultset(__CLASS__);

        if ($db->rowCount() > 0){
            return $row;
        }else{
            return false;
        }
    }

    public function getById($id)
    {
        $db = new Db();
        $db->query('SELECT id, title, author, content, tags, created_at FROM articles WHERE id = :articleId');
        $params = array(
                    array('var' => ':articleId', 'value' => $id, 'type' => \PDO::PARAM_INT)
                );
        $db->bind($params);

        $row = $db->resultset(__CLASS__);

        if ($db->rowCount() > 0){
            return $row;
        }else{
            return false;
        }
    }

    public function addArticle()
    {
        $db = new Db();
        $db->query('INSERT INTO articles (title, author, content, tags, created_at) VALUES (:title, :author, :content, :tags, :created_at)');
        $params = array(
            array('var' => ':title', 'value' => $this->title, 'type' => \PDO::PARAM_STR),
            array('var' => ':author', 'value' => $this->author, 'type' => \PDO::PARAM_STR),
            array('var' => ':content', 'value' => $this->content, 'type' => \PDO::PARAM_STR),
            array('var' => ':tags', 'value' => $this->tags, 'type' => \PDO::PARAM_STR),
            array('var' => ':created_at', 'value' => $this->created_at, 'type' => \PDO::PARAM_INT)
        );
        $db->bind($params);
        $db->execute();

        if ($db->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }

    public function editArticle()
    {
        $db = new Db();
        $db->query('UPDATE articles SET title = :title, author = :author, content = :content, tags = :tags WHERE id = :articleId');
        $params = array(
            array('var' => ':articleId', 'value' => $this->id, 'type' => \PDO::PARAM_INT),
            array('var' => ':title', 'value' => $this->title, 'type' => \PDO::PARAM_STR),
            array('var' => ':author', 'value' => $this->author, 'type' => \PDO::PARAM_STR),
            array('var' => ':content', 'value' => $this->content, 'type' => \PDO::PARAM_STR),
            array('var' => ':tags', 'value' => $this->tags, 'type' => \PDO::PARAM_STR)
        );
        $db->bind($params);
        $db->execute();

        if ($db->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }

}

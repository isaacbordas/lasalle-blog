<?php

namespace Model;

class Articles extends Article
{

    public function getAll()
    {
        $db = new Db();
        $db->query('SELECT id, title, content FROM articles ORDER BY created_at DESC');
        $db->execute();

        $result = array();
        $c = 0;

        while ($row = $db->single_fetch())
        {
            $article = new Article();
            $article->setId($row['id']);
            $article->setTitle($row['title']);
            $article->setContent($row['content']);
            $result[$c] = $article;
            $c++;
        }

        if ($db->rowCount() > 0){
            return $result;
        }else{
            return false;
        }
    }

    public function getById($id)
    {
        $db = new Db();
        $db->query('SELECT id, title, author, content, tags, created_at FROM articles WHERE id = :articleId');
        $vars = array(
                    array('var' => ':articleId', 'value' => $id, 'type' => \PDO::PARAM_INT)
                );
        $db->bind($vars);

        $db->execute();
        $row = $db->single_fetch();

        $article = new Article();
        $article->setId($row['id']);
        $article->setTitle($row['title']);
        $article->setAuthor($row['author']);
        $article->setContent($row['content']);
        $article->setTags($row['tags']);
        $article->setCreatedAt($row['created_at']);

        if ($db->rowCount() > 0){
            return $article;
        }else{
            return false;
        }
    }

    public function addArticle()
    {
        $db = new Db();
        $db->query('INSERT INTO articles (title, author, content, tags, created_at) VALUES (:title, :author, :content, :tags, :created_at)');
        $vars = array(
            array('var' => ':title', 'value' => $this->title, 'type' => \PDO::PARAM_STR),
            array('var' => ':author', 'value' => $this->author, 'type' => \PDO::PARAM_STR),
            array('var' => ':content', 'value' => $this->content, 'type' => \PDO::PARAM_STR),
            array('var' => ':tags', 'value' => $this->tags, 'type' => \PDO::PARAM_STR),
            array('var' => ':created_at', 'value' => $this->created_at, 'type' => \PDO::PARAM_INT)
        );
        $db->bind($vars);
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
        $vars = array(
            array('var' => ':articleId', 'value' => $this->id, 'type' => \PDO::PARAM_INT),
            array('var' => ':title', 'value' => $this->title, 'type' => \PDO::PARAM_STR),
            array('var' => ':author', 'value' => $this->author, 'type' => \PDO::PARAM_STR),
            array('var' => ':content', 'value' => $this->content, 'type' => \PDO::PARAM_STR),
            array('var' => ':tags', 'value' => $this->tags, 'type' => \PDO::PARAM_STR)
        );

        $db->bind($vars);
        $db->execute();

        if ($db->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }

    public function search($params)
    {
        $db = new Db();

        if ($params['searchby'] == "author") {
            $sql = 'SELECT id, title, content FROM articles WHERE author = :keyword ORDER BY created_at DESC';
            $vars = array(
                        array('var' => ':keyword', 'value' => $params['keyword'], 'type' => \PDO::PARAM_STR)
                    );
        }
        if ($params['searchby'] == "tag") {
            $sql = 'SELECT id, title, content FROM articles WHERE tags LIKE :keyword ORDER BY created_at DESC';
            $vars = array(
                        array('var' => ':keyword', 'value' => '%'.$params["keyword"].'%', 'type' => \PDO::PARAM_STR)
                    );
        }
        $db->query($sql);
        $db->bind($vars);
        $db->execute();

        $result = array();
        $c = 0;

        while ($row = $db->single_fetch())
        {
            $article = new Article();
            $article->setId($row['id']);
            $article->setTitle($row['title']);
            $article->setContent($row['content']);
            $result[$c] = $article;
            $c++;
        }

        if ($db->rowCount() > 0){
            return $result;
        }else{
            return false;
        }
    }

}

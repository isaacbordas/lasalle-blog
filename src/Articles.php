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

}

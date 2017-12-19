<?php

namespace Model;

class Db{
    private $host = db_host;
    private $user = db_user;
    private $pass = db_pass;
    private $dbname = db_database;
    private $dbh;
    private $error;
    private $stmt;

    public function __construct()
    {

        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname . ';charset=utf8';
        $options = array(
            \PDO::ATTR_PERSISTENT    => true,
            \PDO::ATTR_ERRMODE       => \PDO::ERRMODE_EXCEPTION
        );

        try{
            $this->dbh = new \PDO($dsn, $this->user, $this->pass, $options);
        }

        catch(PDOException $e){
            $this->error = $e->getMessage();
        }
    }

    public function query($query)
    {
        $this->stmt = $this->dbh->prepare($query);
    }

    public function bind($params)
    {
        if (!empty($params)) {
            foreach ($params as $value) {
                $this->stmt->bindValue($value['var'], $value['value'], $value['type']);
            }
        }
    }

    public function execute()
    {
        return $this->stmt->execute();
    }

    public function single_fetch()
    {
        return $this->stmt->fetch();
    }

    public function rowCount()
    {
        return $this->stmt->rowCount();
    }

    public function lastInsertId()
    {
        return $this->dbh->lastInsertId();
    }

}

<?php
namespace Model;

class Article {

    private $id;
    private $title;
    private $author;
    private $content;
    private $tags;
    private $created_at;

    public function getId()
    {
         return $this->id;
    }

    public function getTitle()
    {
         return $this->title;
    }

    public function getContent()
    {
         return $this->content;
    }

    public function getTags()
    {
         return $this->tags;
    }

    public function getCreatedAt()
    {
         return $this->created_at;
    }

}

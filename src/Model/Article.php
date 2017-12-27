<?php
namespace Model;

use Tag;

class Article {

    private $id;
    private $title;
    private $author;
    private $content;
    private $tag;
    private $created_at;

    public function getId()
    {
         return $this->id;
    }

    public function setId($id)
    {
         $this->id = $id;
    }

    public function getTitle()
    {
         return $this->title;
    }

    public function setTitle($title)
    {
         $this->title = $title;
    }

    public function getAuthor()
    {
         return $this->author;
    }

    public function setAuthor($author)
    {
         $this->author = $author;
    }

    public function getContent()
    {
         return $this->content;
    }

    public function setContent($content)
    {
         $this->content = $content;
    }

    public function getTag()
    {
        return $this->tag;
    }

    public function setTags($tags)
    {
        $tagObj = new \Model\Tag;
        $tagM = explode(',', $tags);
        $tags = array_map('trim', $tagM);
        foreach ($tags as $tag) {
            $tagObj->setTag($tags);
        }
        $this->tag = $tagObj;
    }

    public function getCreatedAt()
    {
         return $this->created_at;
    }

    public function setCreatedAt($created_at)
    {
         $this->created_at = $created_at;
    }

}

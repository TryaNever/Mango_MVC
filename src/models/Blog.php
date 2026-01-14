<?php
namespace App\Models;

class Blog
{
    private $id;
    private $author;
    private $title;
    private $content;
    private $comments = [];

    public function getId() { return $this->id; }
    public function getAuthor() { return $this->author; }
    public function getTitle() { return $this->title; }
    public function getContent() { return $this->content; }
    public function getComments() { return $this->comments; }

    public function setId($id) { $this->id = $id; }
    public function setAuthor($author) { $this->author = $author; }
    public function setTitle($title) { $this->title = $title; }
    public function setContent($content) { $this->content = $content; }
    public function setComments($comments) { $this->comments = $comments; }
}

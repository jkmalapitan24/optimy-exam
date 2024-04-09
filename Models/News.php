<?php

namespace Models;

use Config\Db;

class News extends Helper
{
    private Db $database;

    public function __construct(Db $database)
    {
        $this->database = $database;
    }

    public function getAllNews(): array
    {
        return $this->database->select('SELECT * FROM news');
    }

    protected $id, $title, $body, $createdAt;

    
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    public function getTitle()
    {
        return $this->title;
    }
}

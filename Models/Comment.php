<?php

namespace Models;

use Config\Db;

class Comment extends Helper
{
    private Db $database;

    public function __construct(Db $database)
    {
        $this->database = $database;
    }

    public function getAllComments(): array
    {
        return $this->database->select('SELECT * FROM comment');
    }

    protected $id, $body, $createdAt, $newsId;


    public function getNewsId()
    {
        return $this->newsId;
    }

    public function setNewsId($newsId)
    {
        $this->newsId = $newsId;

        return $this;
    }
}

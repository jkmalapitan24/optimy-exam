<?php

namespace Controllers;

use Models\News;
use Config\Db;

class NewsManager
{
    private News $newsModel;

    public function __construct(News $newsModel)
    {
        $this->newsModel = $newsModel;
    }

    public function listNews()
    {
        // Retrieve all news articles using the News model
        $rows = $this->newsModel->getAllNews();

        $news = [];
        $database = new Db(DB_DSN, DB_USER, DB_PASSWORD);
        foreach($rows as $row) {
            $newsArticle = new News($database);
            $newsArticle->setId($row['id'])
                        ->setTitle($row['title'])
                        ->setBody($row['body'])
                        ->setCreatedAt($row['created_at']);
            $news[] = $newsArticle;
        }

        return $news;
    }

    public function addNews($title, $body)
    {
        // Add a new news article using the News model
        // Example: $this->newsModel->addNews($title, $body);
    }

    public function deleteNews($id)
    {
        // Delete a news article using the News model
        // Example: $this->newsModel->deleteNews($id);
    }

    // Other methods related to managing news
}
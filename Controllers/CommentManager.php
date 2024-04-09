<?php

namespace Controllers;

use Models\Comment;
use Config\Db;

class CommentManager 
{
    private Comment $commentModel;

    public function __construct(Comment $commentModel)
    {
        $this->commentModel = $commentModel;
    }

    public function listComments()
    {
        $rows = $this->commentModel->getAllComments();

        $comments = [];
        $database = new Db(DB_DSN, DB_USER, DB_PASSWORD);
        foreach($rows as $row) {
            $comment = new Comment($database);
            $comment->setId($row['id'])
                    ->setBody($row['body'])
                    ->setCreatedAt($row['created_at'])
                    ->setNewsId($row['news_id']);
            $comments[] = $comment;
        }
        return $comments;
    }
}
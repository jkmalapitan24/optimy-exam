<?php

require_once __DIR__ . '/Config/Db.php';
require_once __DIR__ . '/Models/Helper.php';
require_once __DIR__ . '/Models/News.php';
require_once __DIR__ . '/Models/Comment.php';
require_once __DIR__ . '/Controllers/NewsManager.php';
require_once __DIR__ . '/Controllers/CommentManager.php';
require_once __DIR__ . '/Config/config.php';

use Config\Db;
use Controllers\NewsManager;
use Controllers\CommentManager;
use Models\News;
use Models\Comment;

// Create a database connection
$database = new Db(DB_DSN, DB_USER, DB_PASSWORD);

// Instantiate controllers and Models
$newsModel = new News($database);
$commentModel = new Comment($database);

$newsManager = new NewsManager($newsModel);
$commentManager = new CommentManager($commentModel);

// Fetching all news and Comments
$allNews = $newsManager->listNews();
$allComments = $commentManager->listComments();

// Display news and associated comments

if (empty($allNews)) {
    echo "## NO NEWS FOUND ##";
} else {
    foreach ($allNews as $news) {
        echo "############ NEWS " . $news->getTitle() . " ############\n";
        echo $news->getBody() . "\n";
        
        foreach ($allComments as $comment) {
            if ($comment->getNewsId() == $news->getId()) {
                echo "Comment " . $comment->getId() . " : " . $comment->getBody() . "\n";
            }
        }
    }
}
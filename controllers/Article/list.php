<?php

include 'models/ArticleManager.php';

$articles = new ArticleManager();

$articles->getArticles();

include 'views/Article/list.php';
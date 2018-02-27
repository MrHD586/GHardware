<?php

include 'models/ArticleManager.php';

$articles = (new ArticleManager())->getArticles();

include 'views/Article/list.php';
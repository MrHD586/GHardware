<?php
include 'models/CommandeManager.php';
session_start();
$commandeManager = new CommandeManager();
$userLogin = $_SESSION['user_name'];
$user = $commandeManager->getUserByLogin($userLogin);
$aside = $commandeManager->getCategoryName();
include 'views/aside.php';
include 'views/User/commandelist.php';
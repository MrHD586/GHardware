<?php
session_start();
include 'models/ConnexionManager.php';
$connexionManager = new ConnexionManager();
$password = $connexionManager->getLogin();
$Passwordtest = $POST_['password'];
if($password==$Passwordtest){
$_SESSION['name']==$user;
header('./controllers/site/home.php');
}else{
$_SESSION['error']=1;
}

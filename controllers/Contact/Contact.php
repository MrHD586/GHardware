<?php
################################################################################
#### Auteur : Viquerat Killian
#### Date : 04 Juin 2018
#### Page controllers/Contact/Contact.php:
#### 		  Gestions des donn�es de contact
################################################################################

include 'models/CategoryManager.php';
$categorieManager = new CategoryManager();
session_start();
//récuperation des données des category pour avoir leur nom
$aside = $categorieManager->getCategoryName();
include 'views/aside.php';
include 'views/Contact/contact.php';
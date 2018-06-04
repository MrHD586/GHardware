<?php
################################################################################
#### Auteur : Viquerat Killian
#### Date : 04 Juin 2018
#### Page controllers/Contact/Contact.php:
#### 		  Gestions des donn�es de contact
################################################################################

include 'models/CategoryManager.php';
session_start();
$aside = $searchManager->getCategoryName();
include 'views/aside.php';
include 'views/Contact/contact.php';
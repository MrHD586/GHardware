<?php
################################################################################
#### Auteur : Viquerat Killian
#### Date : 01 Juin 2018
#### Page controllers/Commande/commande.php:
#### 		  Gestion des donnée de la commande
################################################################################

include 'models/CommandeManager.php';

session_start();

$commandeManager = new CommandeManager();

$aside = $commandeManager->getCategoryName();

include 'views/aside.php';
include 'views/Commande/commande.php';
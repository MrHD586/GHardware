<?php
################################################################################
#### Auteur : Viquerat Killian
#### Date : 30 Avril 2018
#### Page controllers/Cart/SupprimerArticles.php:
#### Commande et redirection du panier au login
################################################################################
//redirection vers l'affichage des articles dans le panier
header("location:index.php?controller=User&action=creation&Paniercookie=1");

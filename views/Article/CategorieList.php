<?php
################################################################################
#### Auteur : Butticaz Yvann
#### Date : 22 Février 2018
#### Page views/Article/list.php:
####       Cette page va sert à afficher l'article que l'on consulte
################################################################################

//affichage des données récupérée
foreach($Categoriearticles as $value){
    $id = $value['idArticle'];
    echo '<a href="location:index.php?controller=Article&action=article&id='.$id.'">';
    echo'Articles: '.$value['Aname'].'';
    echo'</a>';
}


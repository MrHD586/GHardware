<?php
    ################################################################################
    #### Auteur : Viquerat Killian
    #### Date : 24 mai 2018
    #### Page controllers/Commentaire/AddCommentaire.php:
    #### 		  Gestions des données pour ajouter des commentaires
    ################################################################################
    
    include 'models/CommentManager.php';
    
    $commentaireManager = new CommentManager();
    //test pour savoir si l'utilisateur a voulu supprimer son commentaire
    if(isset($_POST['Delete'])){
        //requète pour delete toute les valeur dans la table commentaire par rapport a son id
        $deletecommentaire = $commentaireManager->deleteValueComment($_GET['id']);
        //redirection sur la page ou l'utilisateur peux voir ses commentaires
        header("location:index.php?controller=User&action=CommentaireUser");
    }else{
        //déclaration de plusieurs variable
        //récuperation du nom d'utilisateur
        $userLogin = $_SESSION['user_name'];
        //récuperation du texte
        $CTexte=$_POST['writecomment'];
        //récuperation de l'id de l'article
        $Fk_Article=$_GET['id'];
        //etat du commentaire defini a 0=En attente par défaut
        $CEtat=0;
        //Date et heure d'aujourd'hui
        $Date=Date("Y-m-d H:i:s");
        //récuperation des donnée de l'utilisateur par son login
        $user = $commentaireManager->getUserByLogin($userLogin);
        //for pour assigner les valeur récuperer a une variable
        foreach($user as $value){
            //assignation de la valeur iduser
            $Fk_User = $value['idUser'];
            
        }
        //condition pour tester si le champ du commentaire est vide
        if(empty($CTexte)){
            //si il est vide passer un paramètre dans l'url pour afficher une erreur
            header("location:index.php?controller=Article&action=articlecommentaire&error=1&id=$Fk_Article");
            
        }else{
            //si il est rempli ajout du commentaire avec son état,texte,Utilisateur,Articles,Date
            $addCommentaire = $commentaireManager->setNewComment($CEtat, $CTexte, $Fk_User, $Fk_Article, $Date);
            //redirection sur l'article ou le commentaire a été écrit
            header("location:index.php?controller=Article&action=articlecommentaire&id=$Fk_Article");
        }
    }

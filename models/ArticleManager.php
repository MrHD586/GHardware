<?php
	################################################################################
	#### Auteur : Butticaz Yvann   
	#### Date : 26 Février 2018
	#### Classe ArticleManager :
    #### 		Cette classe possède des fonctions effectuants
    ####		des requêtes souvant utilisées.
	################################################################################

	//include de la classe DbManager
	include("models/DbManager.php");
	
	
	class ArticleManager {
		
		private $dbManager;
		
		function __construct(){
			//instantiation de la classe DbManager
			 $this->dbManager = new DbManager();
		}
		
		
		// execute une requête
		public function getArticles($idarticle) {
			$sql = "SELECT * FROM t_articles WHERE idArticle='$idarticle'"; 
			$resultat = $this->dbManager->Query($sql);
			return $resultat->fetchAll();
		}
		
		// execute une requête
		public function getCategories() {
		    $sql = "SELECT Ccategorie FROM t_categories";
		    $resultat = $this->dbManager->Query($sql);
		    return $resultat->fetchAll();
		}
		
		//Crée un nouvel article
		public function setNewArticle($articleName, $articleIsActive) {
		    $sql = "INSERT INTO t_articles (AName, isActive)
                            VALUES ('$articleName', b'$articleIsActive')";
		    $this->dbManager->Query($sql);
		}
		
		//Récupère arts par nom
		public function articleExists($articleName){
		    $sql = "SELECT COUNT(*) AS articleExists FROM t_articles WHERE AName = '$articleName'";
		    $resultat = $this->dbManager->Query($sql);
		    $donnees = $resultat->fetch();
		    $resultat->closeCursor();
		    $resultOfCount = $donnees['articleExists'];
		    
		    if($resultOfCount != 0){
		        $resultat = TRUE;
		    }else{
		        $resultat = FALSE;
		    }
		    
		    return $resultat;
		}
		public function getCommentaire($idarticle) {
		    $sql = "SELECT * FROM t_commentaire WHERE Fk_Article='$idarticle' AND CEtat=3";
		    $resultat = $this->dbManager->Query($sql);
		    return $resultat->fetchAll();
		}
		public function getUserName($userLogin){
		    $sql = "SELECT * FROM t_user WHERE idUser ='$userLogin'";
		    $resultat = $this->dbManager->Query($sql);
		    return $resultat;
		}
		public function setNewCommentaire($CEtat, $CTexte, $Fk_User, $Fk_Article) {
		    $sql = "INSERT INTO t_commentaire (CEtat, CTexte, Fk_User, Fk_Article)
                    VALUES ('$CEtat', '$CTexte', 'Fk_User', 'Fk_Article')";
		    $this->dbManager->Query($sql);
		}
	}

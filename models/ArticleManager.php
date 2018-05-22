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
		
		//Récupère toutes les catègories
		public function getCategoriesName() {
		    $sql = "SELECT CCategorie FROM t_categories ORDER BY CCategorie";
		    $resultat = $this->dbManager->Query($sql);
		    return $resultat->fetchAll();
		}
		
		//Récupère toutes les catègories
		public function getCategorieAll() {
		    $sql = "SELECT * FROM t_categories ORDER BY CCategorie";
		    $resultat = $this->dbManager->Query($sql);
		    return $resultat->fetchAll();
		}
		
		//Récupère toutes les marques
		public function getBrandNameAll() {
		    $sql = "SELECT * FROM t_marque ORDER BY MMarque";
		    $resultat = $this->dbManager->Query($sql);
		    return $resultat->fetchAll();
		}
		
		//Récupère toutes les images
		public function getPicArticleAll() {
		    $sql = "SELECT * FROM t_picarticles ORDER BY PPicArticles";
		    $resultat = $this->dbManager->Query($sql);
		    return $resultat->fetchAll();
		}
		
		
		//Crée un nouvel article
		public function setNewArticle($articleName, $articleStock, $articlePrice, $articleDescription,
		                              $articleCategory, $articleBrand, $articlePicArticle, $articleIsActive) {
		    $sql = "INSERT INTO t_articles (AName, AStock, APrix, ADescription,isActive, Fk_Categories, Fk_Marque, Fk_PicArticles)
                            VALUES ('$articleName', '$articleStock', '$articlePrice', '$articleDescription',
		                             b'$articleIsActive', '$articleCategory',' $articleBrand', '$articlePicArticle')";
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
		    $sql = "SELECT * FROM t_user WHERE idUser = '$userLogin'";
		    $resultat = $this->dbManager->Query($sql);
		    return $resultat;
		}
		
		public function setNewCommentaire($CEtat, $CTexte, $Fk_User, $Fk_Article) {
		    $sql = "INSERT INTO t_commentaire (CEtat, CTexte, Fk_User, Fk_Article)
                    VALUES ('$CEtat', '$CTexte', 'Fk_User', 'Fk_Article')";
		    $this->dbManager->Query($sql);
		}
	}

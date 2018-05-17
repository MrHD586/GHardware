<?php
    ################################################################################
    #### Auteur : Butticaz Yvann
    #### Date : 27 Février 2018
    #### Classe index.php :
    #### 		Ce fichier permet grâce à des paramétres dans l'url
    ####		d'aller sur les bons fichiers.
    ################################################################################
    
    session_start();
    
    //sert à afficher les erreurs et les warning
    error_reporting(E_ERROR | E_PARSE);
	ini_set('display_errors', '1');
    
	//valeur par défaut du controller et de l'action
	$controller = "site";
	$action = "home";

	//si le param controller est set dans l'url 
	if(isset($_GET['controller'])){
		$controller = $_GET['controller'];
	}
    
	//si le param action est set dans l'url
	if(isset($_GET['action'])){
		$action = $_GET['action'];
	}
		
	//Formatage du text // aRticLe => article => Article
	$controller = ucfirst(strtolower($controller)); 
	//Formatage du text // aRticLe => article
	$action = strtolower($action);
  
//------------include des pages----------------
    //Header
	include 'views/header.php';
	
	//chemin du fichier et test s'il existe
	$filePath = "./"."controllers/$controller/$action.php";
	$fileTest = file_exists($filePath);

	//$filePathAside = "./controllers/Aside/aside.php";
	
	if(!$fileTest){
	    echo '<div class="row">
			<div class="col-xs-offset-1 col-lg-8"> 
			<h2>La page souhaitée n\'a pas été trouvée</h2>
			</div>
				</div>
			';
	}elseif ($fileTest){
	    //include $filePathAside;
		include $filePath; 
	}
	
	//Footer
	include 'views/footer.php';
?>


<?php
    ################################################################################
    #### Auteur : Butticaz Yvann
    #### Date : 27 Février 2018
    #### Classe index.php :
    #### 		Ce fichier va permettre grâce à des paramétres dans l'url
    ####		d'aller sur les bons fichiers.
    ################################################################################
    
    //sert à afficher les erreurs et les warning
	error_reporting(E_ALL);
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
?>

<!DOCTYPE>
<html>
	<head>
	</head>
	<body>
    	<?php 
    	    //Header
    		include 'views/header.php';
			include 'views/aside.php';
    		
    		//chemin du fichier et test s'il existe
    		$filePath = "./"."controllers/$controller/$action.php";
    		$fileTest = file_exists($filePath);
    		
    		if(!$fileTest){
    		    echo "<h2>la page souhaitée n'a pas été trouvée</h2>";
    		}elseif ($fileTest){
    			include $filePath; 
    		}
    		
    		//Footer
    		include 'views/footer.php';
    	?>
	</body>
</html>


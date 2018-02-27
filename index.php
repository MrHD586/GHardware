<?php
	error_reporting(E_ALL);
	ini_set('display_errors', '1');

	$controller = "site";
	$action = "home";

	if(isset($_GET['controller'])){
		$controller = $_GET['controller'];
	}

	if(isset($_GET['action'])){
		$action = $_GET['action'];
	}
		
	// extraire paramètres "controller" et "action"

	// instancier controller correspondant
	$controller = ucfirst(strtolower($controller)); // aRticLe => article => Article
	$action = strtolower($action);
?>

<!DOCTYPE>
<html>
	<head>
	</head>
	<body>
	<?php 
		include 'views/header.php';
		$filePath = "./"."controllers/$controller/$action.php";
		$fileTest = file_exists($filePath);
		
		if(!$fileTest){
			http_response_code(404); 
		}elseif ($fileTest){
			echo"yes";
			include $filePath; 
		}
		include 'views/footer.php';
	?>
	</body>
</html>


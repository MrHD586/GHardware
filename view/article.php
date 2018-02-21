<?php
	include("./partial/header.php");
	
	$sql = "SELECT * FROM t-articles"; 
	$resultat = $dbmanager->Query($sql);
	$resultat = $resultat->fetch();
	
	
	
	
	
	
	
	include("./partial/footer.php"); 
?>

<!DOCTYPE html>
<html>
	<head>
		<title>GHardware</title>
	</head>

	<body>
	</body>
</html>
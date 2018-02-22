<?php
	include("../model/DbManager.php");
	include("./partial/header.php");
	
	$sql = "SELECT * FROM t_articles"; 
	$dbManager = new DbManager();
	$resultat = $dbManager->Query($sql);

	if ($resultat->rowCount() > 0) {
		foreach ($resultat->fetchAll() as $row) { ?>
			 <tr>
    			<td><?php echo 'id '.$row["idArticle"];?></td><br/>
				<td><?php echo 'Nom '.$row["AName"];?></td><br/>
				<td><?php echo 'Stock '.$row["AStock"];?></td><br/>
				<td><?php echo 'Prix '.$row["APrix"];?></td><br/>  
				<td><?php echo 'Description '.$row["ADescription"];?></td><br/>  
				<td><?php echo 'Catégorie '.$row["Fk_Categories"];?></td><br/>  
				<td><?php echo 'Marque '.$row["Fk_Marque"];?></td><br/>  
				<td><?php echo 'Pic Article '.$row["Fk_PicArtivles"];?></td><br/>  
  			</tr>
			<br/>
		<?php }
	}
	
	
	
	
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
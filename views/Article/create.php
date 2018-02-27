<?php
	################################################################################
	#### Auteur : Butticaz Yvann   
	#### Date : 22 Février 2018
	#### Page Article :
	#### 			Cette page va sert à afficher l'article que l'on consulte
	################################################################################

	//include de la classe DbManager
	include("../../models/DbManager.php");
	
	//include du Header
	include("../partial/header.php");
	
	//requête de tous les objets de la table articles
	$sql = "SELECT * FROM t_articles"; 
	
	//instantiation de la classe DbManager
	$dbManager = new DbManager();
	
	//passage de la requête $sql dans la fonction query
	$resultat = $dbManager->Query($sql);
	
	//affichage du return de la fonction
	if ($resultat->rowCount() > 0) {
		foreach ($resultat->fetchAll() as $row) { ?>
			 <tr>
    			<td><?php echo 'ID '.$row["idArticle"];?></td>	
				<td><?php echo 'NOM '.$row["AName"];?></td>
				<td><?php echo 'STOCK '.$row["AStock"];?></td>
				<td><?php echo 'PRIX '.$row["APrix"];?></td> 
				<td><?php echo 'DESCRIPTION '.$row["ADescription"];?></td>
				<td><?php echo 'CATEGORIE '.$row["Fk_Categories"];?></td>  
				<td><?php echo 'MARQUE'.$row["Fk_Marque"];?></td>
				<td><?php echo 'PIC ARTICLE '.$row["Fk_PicArticles"];?></td> 
			</tr>
			<br/>
		<?php }
	}

	//include du footer
	include("../partial/footer.php"); 
	
?>

<!DOCTYPE html>
<html>
	<head>
		<title>GHardware</title>
	</head>

	<body>
	</body>
</html>
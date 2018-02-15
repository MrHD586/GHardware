<?php
 echo "test";
 	//connexion base de donnée
		$dbh = new PDO('mysql:host=localhost;dbname=projet151', $userdb, $passdb);
	//Connexion base de donnée persistante
		//$dbh = new PDO('mysql:host=localhost;dbname=test', $user, $pass, array(
    	//PDO::ATTR_PERSISTENT => true
		//));
	//Exemple de requete
		//foreach($dbh->query('SELECT * from t_user') as $row) {
		//        print_r($row);
		//    }
	//terminer la connexion a la base de donnée(remettre toute les variable a NULL)
		//$sth = null;
		//$dbh = null;
?>
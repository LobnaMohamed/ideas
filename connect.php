<?php
	$dsn = 'mysql:host=localhost;dbname=vacation';//data source name
	$user= 'root';
	$pass='';
	$options = array (
			PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    		PDO::ATTR_EMULATE_PREPARES => false
		);

	try{
		//new connection to db
		static $con;
	    if ($con==NULL){ 
	        $con =  new PDO($dsn, $user, $pass, $options);
			$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
	    }
		// $con = new PDO($dsn, $user, $pass, $options);
		// $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
		//QUERY
		// $q = "INSERT INTO test(name,phone)VALUES('لبنى','محمد')";
		// $con->exec($q);
		echo "success";
		//print_r($con) ;

	}
	catch(PDOexception $e){
		echo "failed" . $e->getMessage();
	}


?>
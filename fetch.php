<?php
	require 'functions.php';  


	 if(isset($_POST["empID"]))  
	 {  
		$con = connect();
		$sql= '';
		//$sql .= "SELECT * FROM empdata"
		$sql = "SELECT * FROM t_data WHERE id = '".$_POST["empID"]."'";  
		$stmt = $con->prepare($sql);
		$stmt->execute(array($_POST["empID"]));
		$result = $stmt->fetch(); //PDO::FETCH_ASSOC
		//print_r($result) ;
		echo json_encode($result); 

	 }elseif(isset($_POST["vacID"])){
		$con = connect();
		$sql= '';
		$sql = "SELECT ID,id_case,start_date,end_date,manager_id,top_manager_id,duration,topManager_agree,Manager_agree
				FROM t_transe 
				WHERE ID = '".$_POST["vacID"]."'";  
		$stmt = $con->prepare($sql);
		$stmt->execute(array($_POST["vacID"]));
		$result = $stmt->fetch(); //PDO::FETCH_ASSOC
		//print_r($result) ;
		echo json_encode($result); 
		
	 }  
	 
	 else {
	 	echo "no id is not set";
	 }
 ?>
 
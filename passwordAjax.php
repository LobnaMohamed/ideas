<?php
	include 'functions.php';
	// if(isset($_POST['code']) == true && empty($_POST['code'] ==false)){
	// 	$con = connect();
	// 	$sql= "SELECT ID,emp_name 
	// 		   FROM t_data 
	// 		   WHERE emp_code = '" . trim($_POST['code']) . "' "  ;
	// 	$stmt = $con->prepare($sql);
	// 	$stmt->execute(array($_POST['code']));
	// 	$result = $stmt->fetchAll();
	// 	if($result){
	// 		foreach($result as $row){
	// 	    	echo json_encode(array("empID"=>$row['ID'],"empName"=>$row['emp_name']));
	// 		}
	// 	}else{
	// 		echo "notfound";
	// 	}

	// }


	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])){
		login();
	}
	
	?>
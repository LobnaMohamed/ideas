<?php
	include 'functions.php';
	if(isset($_POST['code']) == true && empty($_POST['code'] ==false)){
		$con = connect();
		$sql= "SELECT t_data.ID as ID,t_data.g_management_id,emp_name,t_data.management,day_n,t_data.desc_job,
					managements.Management as g_manag 
			   FROM t_data,t_day_n,managements
			   WHERE emp_code = '" . trim($_POST['code']) . "' 
			   and t_day_n.id = t_data.day_night 
			   and t_data.g_management_id = managements.ID"  ;
		$stmt = $con->prepare($sql);
		$stmt->execute(array($_POST['code']));
		$result = $stmt->fetchAll();
		if($result){
			foreach($result as $row){
				echo json_encode(array("empID"=>$row['ID'],"empName"=>$row['emp_name'],
				"subManagemnet"=>$row['management'],"day_night"=>$row['day_n'],
				"g_manag"=>$row['g_management_id'],"g_manag_name"=>$row['g_manag']
				,"job"=>$row['desc_job']));
			}
		}else{
			echo "notfound";
		}
	}
	
	?>
<?php

	if (isset($_POST['Submit'])){	
	include_once 'connectionPDO.php';
	
	function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = addslashes($data);  
   $data = htmlspecialchars($data);
   return $data;
}
	$pNumber = $_POST['patientNumber'];
	$pAge = test_input($_POST['page']);
	$pSex = $_POST['gend'];
	$fullName = strtoupper($_POST['lname'].", ".$_POST['fname']." " .$_POST['mname']);
	
			 $sql = "INSERT INTO labpatientlist(patientno,patientName,age,sex) 		 
		VALUES('$pNumber','$fullName','$pAge','$pSex')"; 
		$qry = $con->prepare($sql);
        $qry->execute();
       $id = $con->lastInsertId(); 
 
	}
										
	?>



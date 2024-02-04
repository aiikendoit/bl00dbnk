<?php

	include_once 'connectionPDO.php';

	$ID = $_POST['ID'];
	$Date = $_POST['Date'];
	$BGRH = $_POST['BGRH'];
	$Result = $_POST['Result'];
	$Medtech = $_POST['Medtech'];
	
			 $sql = "INSERT INTO `labdailytrans`(patientno, BGRH,result,medtech,date) 		 
		VALUES('$ID','$BGRH','$Result','$Medtech','$Date')"; 
		$qry = $con->prepare($sql);
        $qry->execute();
       $id = $con->lastInsertId(); 
										
	?>
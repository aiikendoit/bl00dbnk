<?php
if (isset($_POST['Submit'])){
	include_once 'connectionPDO.php';

	$transNumber = $_POST['transactionNumber'];
	$Date = $_POST['date'];
	$BGRH = $_POST['bgrh'];
	$Result = $_POST['result'];
	$Medtech = $_POST['medtech'];
	
		$sql = "UPDATE `labdailytrans` SET BGRH = '$BGRH',result = '$Result',medtech = '$Medtech',date='$Date' WHERE transno = '$transNumber'"; 
		$qry = $con->prepare($sql);
        $qry->execute();
		}
?>
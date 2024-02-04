<?php
	include 'connectionPDO.php';

	$value = $_POST['value'];
	
	$smt5 = $con->prepare("SELECT * FROM labpatientlist WHERE patientName LIKE '$value%'");
					$smt5->execute();
					$data5 = $smt5->fetchAll();	

		foreach ($data5 as $row5) {
		$id = $row5['patientno'];
		$pName = $row5['patientName'];	
		?>
		
	<a href = "patientlistedit.php?id=<?php echo $id; ?>">
	<?php
	echo $pName.'</a>'; 
		}
/*
	$query = mysql_query("SELECT patientName FROM labpatientlist WHERE patientName LIKE '$value%'");

	while($run  = mysql_fetch_array($query)){
		$name = $run['patientName'];

		echo '<a href = #>'.$name.'</a>';
	}*/
?>
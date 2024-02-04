<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<link rel="stylesheet" href="../css/reg.css"/>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
	<link rel="stylesheet" href="../css/jquery-ui.css">
	<script type="text/javascript" src="../javascript/jquery-1.10.2.js"></script>
	<script type="text/javascript" src="../javascript/jquery-ui.js"></script>
	<link rel="stylesheet" href="/resources/demos/style.css">
</head>
<body>
<h1 class="register-title">Patient's Update Form</h1>
<div id="update-form">
<form action="patientendpage_2.php" method="POST" class="register">

<?php
require 'connectionPDO.php';

$id = $_GET['id'];

$smt1 = $con->prepare("select * from labdailytrans WHERE transno = '$id'");
					$smt1->execute();
					$data = $smt1->fetchAll();
			
		foreach ($data as $eRow) {

?>
    <input type="text" class="register-input" value = "<?php echo $id; ?>" placeholder="Transaction Number" name="transactionNumber" required>
    <input type="text" class="register-input" value = "<?php echo $eRow['date']; ?>" placeholder="DATE" id = "datepicker" name="date" required>
    <input type="text" class="register-input" value = "<?php echo $eRow['BGRH']; ?>" placeholder="BGRH" name="bgrh" required>
    <input type="text" class="register-input" value = "<?php echo $eRow['result']; ?>" placeholder="RESULT" name="result" required>
    <input type="text" class="register-input" value = "<?php echo $eRow['medtech']; ?>" placeholder="MEDTECH" name="medtech" required>
  </br>
    <input type="Submit" value="Update Patient's Transaction" class="register-button" name = "Submit">
	<?php
	}
	?>
 	
</form>			
</div>
<script>
$(function() {
    $( "#datepicker" ).datepicker({
      buttonImage: "images/calendar.gif",
      buttonImageOnly: true,
      buttonText: "Select date"
    });
  });
</script>
</body>
</html>
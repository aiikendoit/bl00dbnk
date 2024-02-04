<html>
<head>
		<meta name="viewport" content="width=device-width">
		<link rel="stylesheet" type="text/css" href="../date/datepickr.css"/>
		<link rel="stylesheet" type="text/css" href="../css/responsive.css" media="screen and (max-width: 500px)"/>
</head>
<body>
<form action="bloodbank.php" method="POST" >
			PATIENT NAME:
			Lastname:
			<input type = "Text" size="45" name="Name"> <br><br>
			Firstname:
			<input type = "Text" size="45" name="Name"> <br><br>
			MI
			<input type = "Text" size="45" name="Name"> <br><br>
			Sex
			<input type = "Text" size="45" name="Name"> <br><br>
			Age
			<input type = "Text" size="45" name="Name"> <br><br>
			Address
			<input type = "Text" size="60" name="Name"> <br><br>
			Date:
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input id="datepickr1" size="7" name = "date1"> </br><br>
						
			Venue:
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type = "text" size="45" name="venue"> </br><br>
			
			Conducted by: <input type = "text"><br><br>
			
			<input type = "Submit" name = "Submit">
			
			<script type="text/javascript" src="../date/datepickr.min.js"></script>
			<script type="text/javascript">
				new datepickr('datepickr1', {
					'dateFormat': 'Y/m/d'
				});
				</script>		
</form>			
</body>
</html>
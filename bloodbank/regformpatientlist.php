<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<link rel="stylesheet" href="../css/reg.css"/>
</head>
<body>
<h1 class="register-title">Patient's Registration Form</h1>
<form action="patientendpage.php" method="POST" class="register">

    <input type="text" class="register-input" placeholder="Patient's ID Number" name="patientNumber" required>
    <input type="text" class="register-input" placeholder="Last Name" name="lname" required>
    <input type="text" class="register-input" placeholder="First Name" name="fname" required>
    <input type="text" class="register-input" placeholder="Middle Name" name="mname" required>
    <input type="text" class="register-input" placeholder="Age" name="page" required>
  </br>
    <div class="register-switch">
      <input type="radio" name="gend" value="Female" id="sex_f" class="register-switch-input" checked>
      <label for="sex_f" class="register-switch-label">Female</label>
      <input type="radio" name="gend" value="Male" id="sex_m" class="register-switch-input">
      <label for="sex_m" class="register-switch-label">Male</label>
    </div>
    <input type="Submit" value="Register Patient" class="register-button" name = "Submit">
 	
</form>			

</body>
</html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="text/javascript" src="../javascript/jquery-1.11.3.js"></script>
<script src = '../javascript/patientlist.js'></script>

<style type="text/css">
	body{ 
		font-family:Tahoma, Geneva, sans-serif;
		font-size:18px;
	}
	.content{
		width:900px;
		margin:0 auto;
	}
	#searchid
	{
		width:500px;
		border:solid 1px #000;
		padding:10px;
		font-size:14px;
	}
	#result
	{
		position:absolute;
		width:500px;
		padding:10px;
		display:none;
		margin-top:-1px;
		border-top:0px;
		overflow:hidden;
		border:1px #CCC solid;
		background-color: white;
	}
	.show
	{
		padding:10px; 
		border-bottom:1px #999 dashed;
		font-size:15px; 
		height:450px;
		width:450px;
	}
	.show:hover
	{
		background:#4c66a4;
		color:#FFF;
		cursor:pointer;
	}
	
	a{
	background: #4aaae7;
	color: #fff;
	text-decoration: none;
	padding: 5px;
	display: block;
}

a:hover{
	background: #fff;
	color: #4aaee7;
}

button{
	padding: 10px;
	border: 0px;
	font-family: tahoma;
	font-size: 12px;
	color: #fff;
	background: #4aaae7;
}
</style>
</head>
<body background="Blood.jpg">

	<h1><font color = red> Blood Bank Patient List </font></h1>

<div class="content">
</br></br></br>
<input type="text" class="search" id="searchid" placeholder="Search for patient" />&nbsp; <button name = "regBtn" value="Register" onclick="openRegister()">Register</button><br /><br />
<font color = "Black"> Ex:Felio, Lloyd Ismael</font>
<div id="result">
</div>
</div>

<script>
	function openRegister(){
	window.open("http://192.168.0.55/Bloodbank/bloodbank/regformpatientlist.php");
	window.close(this);
	}
</script>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<a href = "http://192.168.0.55/Bloodbank/bloodbankindex.php"><font size = "3">HOME</font></a>


</body>
</html>

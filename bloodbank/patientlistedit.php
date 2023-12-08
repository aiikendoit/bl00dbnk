<html>
<head>
<basefont face="Verdana">
</head>

<body>

<?php
require 'connectionPDO.php';
?>
<p>&nbsp;<p>

	<head>
		<title>Form</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
		<link rel="stylesheet" href="../css/jquery-ui.css">
		<script type="text/javascript" src="../javascript/jquery-1.10.2.js"></script>
		<script type="text/javascript" src="../javascript/jquery-ui.js"></script>
		<link rel="stylesheet" href="/resources/demos/style.css">
  <style>
    body { font-size: 62.5%; }
    label, input { display:block; }
    input.text { margin-bottom:12px; width:95%; padding: .4em; }
    fieldset { padding:0; border:0; margin-top:25px; }
    h1 { font-size: 1.2em; margin: .6em 0; }
    div#users-contain { width: 850px; margin: 20px 0; }
	div#users-contain {overflow-y:scroll; height:300px;}
    div#users-contain table { margin: 1em 0; border-collapse: collapse; width: 100%; }
    div#users-contain table td, div#users-contain table th { border: 1px solid #eee; padding: .6em 10px; text-align: left; }
    .ui-dialog .ui-state-error { padding: .3em; }
    .validateTips { border: 1px solid transparent; padding: 0.3em; }
  </style>
	</head>
	
<body background="edit.jpg">	

<table width="100%" cellspacing="0" cellpadding="5">
<tr>
    <th bgcolor="Navy"><font size="-1" color="White">
    <b><font size = "4" >Adventist Medical Center - Bacolod</font></b></font>
    </th>
	</tr>
	<tr>
    <th bgcolor="White"><font size="-1" color="Red">
    <b><font align = "center" size = "6" >BLOOD BANK</font></b></font>
    </th>
	</tr>
</table>

<?php
$id = $_GET['id'];	
$query = "SELECT patientname FROM labpatientlist WHERE patientno = '$id'";
        foreach ($con->query($query) as $row) {
?>
	<font size = "12"><?php echo $row['patientname']?></font>
<?php
}
?>

<br><br><br><br>


<h2><a href = "http://192.168.0.55/Bloodbank/bloodbank/patientlist.php">Go back to Home</a></h2>

<div id="dialog-form" title="Add New Transaction">
  <p class="validateTips">All form fields are required.</p>
 
  <form>
    <fieldset>
	<span>
      <label for="date">Date</label>
      <input id="datepicker" size="7" name = "date1" value = <?php echo date('m/d/Y');?> class="text ui-widget-content ui-corner-all">
	  </span>
      <label for="bgrh">BGRH</label>
      <input type="text" name="bgrh" id="bgrh" value="" class="text ui-widget-content ui-corner-all">
      <label for="result">Result</label>
      <input type="text" name="result" id="result" value="" class="text ui-widget-content ui-corner-all">
	  <label for="medtech">Medtech</label>
      <input type="text" name="medtech" id="medtech" value="" class="text ui-widget-content ui-corner-all">
    </fieldset>
		
  </form>
</div>

<div id="users-contain" class="ui-widget">
  <h1>Patient Details</h1>
 <table id="users" class="ui-widget ui-widget-content">
    <thead>
<?php
				require 'connectionPDO.php';
				$id = $_GET['id'];	
				$query = "SELECT * FROM labdailytrans WHERE patientno = '$id'";
			?>

	<tr class="ui-widget-header ">
		<th width = 10>No.</th>
        <th width = 90>Date</th>
        <th width = 100>BGRH</th>
        <th width = 250>Result</th>
		<th width = 300>MedTech</th>
		<th width = 50></th>
      </tr>
	<?php
		foreach ($con->query($query) as $row) {
	?>
	</thead>
    <tbody>
	<tr>
		<td><?php echo $row['transno']; ?></td>
        <td><?php echo $row['date']; ?></td>
        <td><?php echo $row['BGRH']; ?></td>
        <td><?php echo $row['result']; ?></td>
		<td><?php echo $row['medtech']; ?></td>
		<td><a href = "http://192.168.0.55/Bloodbank/bloodbank/updateformpatientlist_2.php?id=<?php echo $row['transno']; ?>">edit</a></td>
      </tr>
    </tbody>
			<?php
					}
			?>
	
</table> 
</div>
<button id="create-user">Create Transaction</button>
		
<script>

  $(function() {
    $( "#datepicker" ).datepicker({
      buttonImage: "images/calendar.gif",
      buttonImageOnly: true,
      buttonText: "Select date"
    });
  });

	
  $(function() {
    var dialog, editDialog, transactionDialog, form, editForm, transactionForm, num, et,
      date = $( "#datepicker" ),
      bgrh = $( "#bgrh" ),
      result = $( "#result" ),
	  medtech = $( "#medtech" ),
      allFields = $( [] ).add( date ).add( bgrh ).add( result ).add( medtech ),
      tips = $( ".validateTips" );
 
    function updateTips( t ) {
      tips
        .text( t )
        .addClass( "ui-state-highlight" );
      setTimeout(function() {
        tips.removeClass( "ui-state-highlight", 1500 );
      }, 500 );
    }
 
    function addUser() {
	var i = <?php echo $id?>;
	var d = date.val();
	var b = bgrh.val();
	var r = result.val();
	var m = medtech.val();

      allFields.removeClass( "ui-state-error" );
       
	$.post('insert.php', {ID: i, Date: d, BGRH: b, Result: r, Medtech: m});
	        dialog.dialog( "close" );
				  	  location.reload();
    }
 
    dialog = $( "#dialog-form" ).dialog({
      autoOpen: false,
      height: 350,
      width: 350,
      modal: true,
      buttons: {
        "Save Transaction": addUser,
        Cancel: function() {
          dialog.dialog( "close" );
        }
      },
      close: function() {
        form[ 0 ].reset();
        allFields.removeClass( "ui-state-error" );
      }
    });
 
    form = dialog.find( "form" ).on( "submit", function( event ) {
      event.preventDefault();
      addUser();
    });
 
    $( "#create-user" ).button().on( "click", function() {
      dialog.dialog( "open" );
    });
	
	});
  </script>
</body>
</html>